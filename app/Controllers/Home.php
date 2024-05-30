<?php

namespace App\Controllers;

use App\Models\ClassModel;
use App\Models\UserModel;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Ramsey\Uuid\Uuid;

use function PHPUnit\Framework\returnSelf;

class Home extends BaseController
{
    protected $model;
    protected $classModel;
    public function __construct()
    {
        $this->model = new UserModel();
        $this->classModel = new ClassModel();
    }

    public function index(): string
    {
        $data['title'] = "E-Voting | Home";
        return view("template/index", $data);
    }

    public function login()
    {
        $data['title'] = "E-Voting | Login";
        return view("auth/login", $data);
    }

    public function authenticate()
    {
        $data = [
            'email' => $this->request->getVar('email'),
            'password' => md5($this->request->getVar('password')),
        ];
        $user = $this->model->where('email', $data['email'])->first();
        if ($user) {
            if ($user['password'] == $data['password']) {
                if (empty($user['verified_at'])) {
                    return redirect()->back()->with('error', 'Email belum diverifikasi. Silahkan periksa email Anda untuk verifikasi.');
                }

                session()->set('name', $user['name']);
                session()->set('is_login', true);
                session()->set('id', $user['id']);
                session()->set('is_admin', $user['is_admin']);

                if ($user['is_admin'] == 1) {
                    return redirect()->to(base_url('/dashboard'));
                } else {
                    return redirect()->to(base_url('/'))->with('success', 'Login berhasil');
                }
            } else {
                return redirect()->back()->with('error', 'Email atau password salah');
            }
        } else {
            return redirect()->back()->with('error', 'Email atau password salah');
        }
    }


    public function register()
    {
        $data['title'] = "E-Voting | Register";
        $data['classes'] = $this->classModel->findAll();
        return view("auth/register", $data);
    }

    public function registerAction()
    {
        $data = [
            'id' => Uuid::uuid4()->toString(),
            'email' => $this->request->getVar('email'),
            'name' => $this->request->getVar('nama'),
            'class_id' => $this->request->getVar('class_id'),
            'password' => md5($this->request->getVar('password')),
            "is_admin" => 0,
            "vote_token" => null,
        ];
        $isExist = $this->model->where('email', $data['email'])->first();

        if (!$isExist) {
            $newUser = $this->model->insert($data);
            if ($this->sendVerificationEmail($data['email'], $newUser)) {
                return redirect()->to(base_url('/login'))->with('success', 'Akun berhasil dibuat, silahkan verifikasi email');
            } else {
                return redirect()->back()->with('error', 'Akun berhasil dibuat tapi gagal mengirim email verifikasi. Silahkan coba lagi.');
            }
        } else {
            return redirect()->back()->with('error', 'Email sudah terdaftar');
        }
    }

    public function verify()
    {
        $id = $this->request->getVar('id');
        $user = $this->model->where('id', $id)->first();

        if ($user) {
            $this->model->update($user['id'], ['verified_at' => date('Y-m-d H:i:s')]);
            return redirect()->to(base_url('/login'))->with('success', 'Email berhasil diverifikasi, silahkan login');
        } else {
            return redirect()->to(base_url('/login'))->with('error', 'Token tidak valid atau sudah kadaluarsa');
        }
    }

    public function verifyToken()
    {

        $token = $this->request->getVar('token');

        $isValid = $this->model->where('vote_token', $token)->first();

        if ($isValid) {
            session()->set('valid_token', true);
            return redirect()->to(base_url('/'))->with('success', 'Token valid, silahkan melakukan vote!');
        } else {
            return redirect()->back()->with('error', 'Token tidak valid');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }

    public function getToken()
    {
        $user = $this->model->where('name', session()->get('name'))->first();
        $token = $this->generateToken();
        $tokenSaved = $this->model->update($user['id'], ['vote_token' => $token]);
        $emailSent = $this->sendTokenEmail($user['email'], $token);

        if ($tokenSaved && $emailSent) {
            return redirect()->to(base_url('/'))->with('success', 'Token has been sent to your email.');
        } else {
            return redirect()->back()->with('error', 'Failed to send token email.');
        }
    }
    function generateToken($length = 32)
    {
        return bin2hex(random_bytes($length));
    }

    public function sendTokenEmail($to, $token)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'leafthe78@gmail.com';
            $mail->Password   = 'cvuznzxfmnsgjmwa';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            $mail->setFrom('leafthe78@gmail.com', 'Evoting App');
            $mail->addAddress($to);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Voting Access Token';
            $mail->Body    = "Ini adalah token anda untuk melakukan voting: <strong>$token</strong>";

            $mail->send();
            log_message('info', "Email has been sent to $to");
            return true;
        } catch (Exception $e) {
            log_message('error', "Email could not be sent. Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }
    public function sendVerificationEmail($email, $id)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'leafthe78@gmail.com';
            $mail->Password   = 'cvuznzxfmnsgjmwa';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            $mail->setFrom('leafthe78@gmail.com', 'Evoting App');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Email Verification';
            $mail->Body = 'Silahkan klik tombol di bawah ini untuk melakukan verifikasi email anda: <a href="' . base_url('/verify?id=' . $id) . '">Verify Email</a>';

            $mail->send();
            log_message('info', "Email has been sent to $email");
            return true;
        } catch (Exception $e) {
            log_message('error', 'Mailer Error: ' . $mail->ErrorInfo);
            return false;
        }
    }
}

<?php

namespace App\Database\Seeds;

use App\Models\ClassModel;
use App\Models\UserModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    public function run()
    {
        $classModel = new ClassModel();
        $classes = $classModel->findAll();

        $userModel = new UserModel();

        foreach ($classes as $class) {
            $classId = $class['id'];

            for ($i = 1; $i <= 20; $i++) {
                $data = [
                    'id' => Uuid::uuid4()->toString(),
                    'class_id' => $classId,
                    'email' => 'user' . $i . '_class' . $classId . '@example.com',
                    'name' => 'User ' . $i,
                    'password' => md5('12345678'),
                    'is_admin' => 0,
                    'is_vote' => 0,
                    'vote_token' => null,
                    'verified_at' => Time::now()
                ];

                $userModel->insert($data);
            }
        }
    }
}

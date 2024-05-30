<?php

namespace App\Database\Seeds;

use App\Models\GroupModel;
use App\Models\UserModel;
use App\Models\VoteModel;
use CodeIgniter\Database\Seeder;
use Ramsey\Uuid\Uuid;

class VoteSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();
        $users = $userModel->where('is_admin', '0')->findAll();

        $groupModel = new GroupModel();
        $groups = $groupModel->findAll();

        $voteModel = new VoteModel();

        foreach ($users as $user) {
            $existingVote = $voteModel->where('user_id', $user['id'])->first();

            if (!$existingVote) {
                $randomGroup = $groups[array_rand($groups)];

                $voteModel->insert([
                    'id' => Uuid::uuid4()->toString(),
                    'user_id' => $user['id'],
                    'group_id' => $randomGroup['id'],
                ]);
            }
        }
    }
}

<?php

use App\Models\RoleUser;
use App\Repositories\UserRepository;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Users Table
     *
     * @var string
     */
    private $table = 'users';

    /**
     * Run the database seeds.
     *
     * @param UserRepository $userRepository
     *
     * @return void
     */
    public function run(UserRepository $userRepository)
    {
        array_map(function ($array) use ($userRepository) {

            $role = $array['role_id'];
            unset($array['role_id']);

            $user = $userRepository->create($array, true);

            RoleUser::create([
                'role_id' => $role,
                'user_id' => $user->id
            ]);
        }, config('extra.users'));
    }
}

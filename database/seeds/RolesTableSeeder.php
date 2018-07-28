<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Roles List
     *
     * @var array
     */
    private $roles = ['Manager', 'User'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        array_map(function ($role) {
            Role::create(['name' => $role]);
        }, $this->roles);
    }
}

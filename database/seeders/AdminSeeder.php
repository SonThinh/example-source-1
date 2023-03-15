<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'login_id'      => 'admin',
            'password'      => 'a6TVxQZK9DQc',
            'name'          => 'Admin',
        ]);

        $admin->assignRole([RoleEnum::ADMIN]);

        $operate = Admin::create([
            'login_id'      => 'operator',
            'password'      => 'lxzVop4vkQo',
            'name'          => 'Operator',
        ]);

        $operate->assignRole([RoleEnum::OPERATOR]);
    }
}

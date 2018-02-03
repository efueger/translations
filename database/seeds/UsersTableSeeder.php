<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addAdmin();


    }

//    private function addUser()
//    {
//        $adminPassword = strtoupper(str_random(6));
//        $adminEmail = 'admin@admin.com';
//        User::create(
//            [
//                'name' => 'admin',
//                'email' => 'admin@admin.com',
//                'password' => bcrypt($adminPassword),
//                'role_id' => \Bu4ak\Roles\Enum\RoleType::ADMIN,
//            ]
//        );
//        $this->command->line("IsAdmin's data for login:");
//        $this->command->line("-email:<comment>$adminEmail</comment>");
//        $this->command->line("-password:<comment>$adminPassword</comment>");
//    }

    private function addAdmin()
    {
        $adminPassword = strtoupper(str_random(6));
        $adminEmail = 'admin@admin.com';
        User::create(
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt($adminPassword),
                'role_id' => \Bu4ak\Roles\Enum\RoleType::ADMIN,
            ]
        );
        $this->command->line("IsAdmin's data for login:");
        $this->command->line("-email:<comment>$adminEmail</comment>");
        $this->command->line("-password:<comment>$adminPassword</comment>");
    }
}

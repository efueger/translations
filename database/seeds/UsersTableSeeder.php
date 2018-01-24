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
        //add admin
        $adminPassword = strtoupper(str_random(6));
        $adminEmail = 'admin@admin.com';
        User::create(
            [
                'name'=>'admin',
                'email'=>'admin@admin.com',
                'password'=>bcrypt($adminPassword),
            ]
        );
        $this->command->getOutput()->writeln("Admin's data for login:");
        $this->command->getOutput()->writeln("-email:<comment>$adminEmail</comment>");
        $this->command->getOutput()->writeln("-password:<comment>$adminPassword</comment>");

    }
}

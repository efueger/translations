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
        $this->addClient();
    }

    private function addClient()
    {
        $password = strtoupper(str_random(6));
        $email = 'client1@client.com';
        User::create(
            [
                'name' => 'client',
                'email' => $email,
                'password' => bcrypt($password),
                'role_id' => \Bu4ak\Roles\Enum\RoleType::USER,
            ]
        );
        $this->command->line("Client's data for login:");
        $this->command->line("-email:<comment>$email</comment>");
        $this->command->line("-password:<comment>$password</comment>" . PHP_EOL);
    }

    private function addAdmin()
    {
        $password = strtoupper(str_random(6));
        $email = 'admin@admin.com';
        User::create(
            [
                'name' => 'admin',
                'email' => $email,
                'password' => bcrypt($password),
                'role_id' => \Bu4ak\Roles\Enum\RoleType::ADMIN,
            ]
        );
        $this->command->line("Admin's data for login:");
        $this->command->line("-email:<comment>$email</comment>");
        $this->command->line("-password:<comment>$password</comment>" . PHP_EOL);
    }
}

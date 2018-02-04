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
        $this->addClient();
    }

    private function addClient()
    {
        $password = strtoupper(str_random(6));
        $email = strtolower(str_random(5)) . '@client.com';
        User::create(
            [
                'name' => 'client',
                'email' => $email,
                'password' => bcrypt($password),
                'role_id' => \Bu4ak\Roles\Enum\RoleType::USER,
            ]
        );

        $this->printData("Client's data for login:", $email, $password);
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
        $this->printData("Admin's data for login:", $email, $password);
    }

    private function printData(string $message, string $email, string $password)
    {
        $this->command->line($message);
        $this->command->line("-email:<comment>$email</comment>");
        $this->command->line("-password:<comment>$password</comment>" . PHP_EOL);
    }
}

<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class CreateVaultAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:account';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates an account so one can login into Vault';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('What\'s your name?');

        $email = $this->ask('What\'s your e-mail address? hint: example@example.com');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->line('Username must be an email address');
            die();
        }

        $pass = $this->secret('And your password?');

        if (strlen($pass) < 6) {
            $this->line('Password is too short!');
            die();
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($pass)
        ]);

        if ($user) {
            $this->line('The user has been added to the system.');
        } else {
            $this->line('Storing user failed.');
        }
    }
}

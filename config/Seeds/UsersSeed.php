<?php

declare(strict_types=1);

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Chronos\Chronos;
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 4; $i++) {
            $user = "u{$i}";
            $password = (new DefaultPasswordHasher())->hash($user);
            $data[] = [
                'email' => "{$user}@example.com",
                'password' => $password,
                'auth_token' => $user,
                'active' => true,
                'created' => Chronos::now()
            ];
        }


        $table = $this->table('users');

        $table->truncate();

        $table->insert($data)->save();
    }
}

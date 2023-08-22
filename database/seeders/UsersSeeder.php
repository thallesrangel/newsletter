<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'LetterJa',
                'email' => 'letterja@email.com',
                'password' => '$argon2id$v=19$m=65536,t=4,p=1$NE5MLzZWNFdsVUFibGVoVA$mDCLGRHX2gq4+N3FM5Q2MALxJ6JCfrGI0ZV9WCT+HsI',
            ],
        ]);
    }
}

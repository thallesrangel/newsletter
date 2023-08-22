<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page')->insert([
            [
                'title' => 'Notícias de Agro para quem não tem tempo de ler notícias.',
                'subtitle' => 'Junte-se à comunidade agora',
                'placeholder_email' => 'Seu e-mail principal',
                'button_name' => 'Increver-se (Grátis)',
            ],
        ]);
    }
}

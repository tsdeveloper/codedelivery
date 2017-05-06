<?php

use Illuminate\Database\Seeder;
use AgendaWeb\Models\User;
use AgendaWeb\Models\Participante;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create()->each(function($p){
          $p->participante()->save(factory(Participante::class)->make());    
        });
    }
}

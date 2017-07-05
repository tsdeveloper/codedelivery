<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Models\Role;
use Faker\Factory;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fake = new Factory();

      $role = new Role();
      $role->name = 'Admin';
      $role->description = 'Acesso total ao sistema';
      $role->save();

       $role = new Role();
      $role->name = 'Delivery';
      $role->description = 'Acesso restrito';
      $role->save();
      
    }
}

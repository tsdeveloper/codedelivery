<?php
use Illuminate\Database\Seeder;
use CodeDelivery\Models\Client;
use CodeDelivery\Models\User;
use CodeDelivery\Models\Role;
use Faker\Factory;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user_user = Role::where('name', 'user')->first();
        $user_client = Role::where('name', 'client')->first();
        $user_admin = Role::where('name', 'admin')->first();
        $user_delivery = Role::where('name', 'delivery')->first();

//        $generator = factory(User::class, 1)->create([
//            'name' => 'User',
//            'email' => 'user@codedelivery.com',
//            'password' => bcrypt('user@123')
//        ])->each(function ($u){
//            $u->client()->save(factory(Client::class)->make());
//            $u->roles()->attach(Role::where('name', 'user')->first());
//        });

        //
        factory(User::class, 10)->create()->each(function ($u) {
            $u->client()->save(factory(Client::class)->make());
            $u->roles()->attach(Role::where('name', 'client')->first());
        });

        $fake = new Factory();



        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@codedelivery.com';
        $user->password = bcrypt('admin@123');
        $user->save();
        $user->roles()->attach($user_admin);


        $user = new User();
        $user->name = 'User';
        $user->email = 'user@codedelivery.com';
        $user->password = bcrypt('user@123');
        $user->save();
        $user->roles()->attach($user_client);


        $user = new User();
        $user->name = 'Delivery1';
        $user->email = 'delivery1@codedelivery.com';
        $user->password = bcrypt('delivery1@123');
        $user->save();
        $user->roles()->attach($user_delivery);

        $user = new User();
        $user->name = 'Delivery2';
        $user->email = 'delivery2@codedelivery.com';
        $user->password = bcrypt('delivery2@123');
        $user->save();
        $user->roles()->attach($user_delivery);
    }
}

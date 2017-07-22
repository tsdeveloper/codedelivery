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

        $role_user = Role::where('name', 'user')->first();
        $role_client = Role::where('name', 'client')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_delivery = Role::where('name', 'delivery')->first();


        $client = new User();
        $client->name = 'Client';
        $client->email = 'client@codedelivery.com';
        $client->password = bcrypt('client@123');
        $client->save();
        $client->client()->save(factory(Client::class)->make());
        $client->roles()->attach($role_client);

//        factory(User::class)->create(function ($client) {
//            $client->name = 'Client';
//            $client->email = 'client@codedelivery.com';
//            $client->password = bcrypt('client@123');
//            $client->client()->save(factory(Client::class)->make());
//            $client->roles()->attach(Role::where('name', 'client')->first());
//        });

        factory(User::class, 11)->create()->each(function ($u) {
            $u->client()->save(factory(Client::class)->make());
            $u->roles()->attach(Role::where('name', 'client')->first());
        });

//        $fake = new Factory();
//
//        $user = new User();
//        $user->name = 'User';
//        $user->email = 'user@codedelivery.com';
//        $user->password = bcrypt('user@123');
//        $user->save();
//        $user->roles()->attach($user_client);

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@codedelivery.com';
        $user->password = bcrypt('admin@123');
        $user->save();
        $user->roles()->attach($role_admin);





        $user = new User();
        $user->name = 'Delivery1';
        $user->email = 'delivery1@codedelivery.com';
        $user->password = bcrypt('delivery1@123');
        $user->save();
        $user->roles()->attach($role_delivery);

        $user = new User();
        $user->name = 'Delivery2';
        $user->email = 'delivery2@codedelivery.com';
        $user->password = bcrypt('delivery2@123');
        $user->save();
        $user->roles()->attach($role_delivery);
    }
}

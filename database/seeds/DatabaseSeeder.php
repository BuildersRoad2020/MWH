<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User();
        $user->password = Hash::make('Support123!');
        $user->email = 'support@engagis.com';
        $user->name = 'Support Admin';
        $user->role = '1';
        $user->save();

        $this->call([
        AddressesSeeder::class,
         ]);

        $this->call([
        FormSeeder::class,
         ]);
    }
}

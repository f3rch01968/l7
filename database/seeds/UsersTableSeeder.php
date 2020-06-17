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
        User::create([
            'name'=>'Fercho',
            'username'=>'f3rcho68',
            'email'=>'fdo_tizoc@hotmail.com',
            'password'=>bcrypt('Agnu5d3i')
        ]);

        factory(User::class, 10)->create();
    }
}

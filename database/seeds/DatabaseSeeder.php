<?php

use App\Micropost;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Example User",
            "email" => "example@railstutorial.org",
            "password" => bcrypt("foobar"),
            "admin" => true
        ]);

        factory(User::class, 99)->create();

        User::take(6)->get()->each(function ($u) {
            $u->microposts()->saveMany(Factory(Micropost::class, 50)->make(["user_id" => $u["id"]]));
        });
    }
}

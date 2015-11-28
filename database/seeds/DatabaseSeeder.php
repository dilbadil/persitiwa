<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(ProvinsiSeeder::class);
        $this->call(StatusSeeder::class);

        Model::reguard();
    }
}

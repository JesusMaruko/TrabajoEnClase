<?php

namespace Database\Seeders;
use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $client->name = "jesus enrique";
        $client->phone_number = "612-103-3649";
        $client->email = "chuy.dominguez@gmail.com";
        $client->save();

        $client = new Client();
        $client->name = "Angel Duarte";
        $client->phone_number = "612-100-2122";
        $client->email = "angel.duarte@gmail.com";
        $client->save();
    }
}

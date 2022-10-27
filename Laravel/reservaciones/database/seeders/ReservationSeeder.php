<?php

namespace Database\Seeders;
use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservation = new Reservation();
        $reservation->client_name = "jesus enrique";
        $reservation->id_room = "227B";
        $reservation->type = "suite";
        $reservation->floor = "18";
        $reservation->date_reserv = "26-10-2022 21:26:00";
        $reservation->date_end = "28-10-2022 21:26:00";
        $reservation->save();

        $reservation = new Reservation();
        $reservation->client_name = "angel duarte";
        $reservation->id_room = "228B";
        $reservation->type = "suite";
        $reservation->floor = "18";
        $reservation->date_reserv = "26-10-2022 22:00:00";
        $reservation->date_end = "29-10-2022 22:00:00";
        $reservation->save();
    }
}

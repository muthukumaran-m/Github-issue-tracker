<?php

namespace Database\Seeders;

use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::insert(
            [
                [
                    "code" => "open",
                    "title" => "Open",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    "code" => "closed",
                    "title" => "Closed",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
               
            ]
        );
    }
}

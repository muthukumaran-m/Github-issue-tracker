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
                    "title" => "Close as completed.",
                    "description" => "Done, Closed, Fixed, Resolved",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    "code" => "not_planned",
                    "title" => "Close as not planned.",
                    "description" => "Won't fix, can't repro, duplicate, stale",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    "code" => "deleted",
                    "title" => "Close as not planned.",
                    "description" => "This can't be undone.",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ]
            ]
        );
    }
}

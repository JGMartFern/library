<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Book;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        Book::factory()
            ->count(7)
            ->state(new Sequence(
                [
                    'borrower' => null,
                    'start_date' => null,
                    'limit_date' => null
                ],
                [
                    'borrower' => 'Fran',
                    'start_date' => Carbon::today()->subDays(40)->toDate(),
                    'limit_date' => Carbon::today()->subDays(10)->toDate()
                ],
                [
                    'borrower' => 'Antonio',
                    'start_date' => Carbon::today()->subDays(10)->toDate(),
                    'limit_date' => Carbon::today()->addDays(20)->toDate()
                ],
            ))
            ->create();
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        Book::factory()
            ->count(8)
            ->state(new Sequence(
                [
                    'title' => 'Dune',
                    'author' => 'Frank Herbert',
                    'image_url' => 'https://m.media-amazon.com/images/I/A1u+2fY5yTL._AC_UF894,1000_QL80_.jpg',
                    'borrower' => null,
                    'start_date' => null,
                    'limit_date' => null
                ],
                [
                    'title' => 'Sandman',
                    'author' => 'Neil Gaiman',
                    'image_url' => 'https://images.librotea.com/uploads/media/2018/09/14/coleccion-vertigo-num-02-sandman-1.jpg',
                    'borrower' => null,
                    'start_date' => null,
                    'limit_date' => null
                ],
                [
                    'title' => 'El Nombre del Viento',
                    'author' => 'Patrick Rothfuss',
                    'image_url' => 'https://pictures.abebooks.com/isbn/9788401337208-es.jpg',
                    'borrower' => null,
                    'start_date' => null,
                    'limit_date' => null
                ],
                [
                    'title' => 'El Color de la Magia',
                    'author' => 'Terry Pratchett',
                    'image_url' => 'https://m.media-amazon.com/images/I/91c9RGsLWdL._AC_UF894,1000_QL80_.jpg',
                    'borrower' => null,
                    'start_date' => null,
                    'limit_date' => null
                ],
                [
                    'title' => 'El Hobbit',
                    'author' => 'J. R. R. Tolkien',
                    'image_url' => 'https://m.media-amazon.com/images/I/815JFtX7LBL._AC_UF894,1000_QL80_.jpg',
                    'borrower' => 'Antonio',
                    'start_date' => Carbon::today()->subDays(10)->toDate(),
                    'limit_date' => Carbon::today()->addDays(20)->toDate()
                ],
                [
                    'title' => 'Cumbres Borrascosas',
                    'author' => 'Emily Brontë',
                    'image_url' => 'https://m.media-amazon.com/images/I/81MPsv1q0AL._AC_UF894,1000_QL80_DpWeblab_.jpg',
                    'borrower' => 'Nuria',
                    'start_date' => Carbon::today()->subDays(8)->toDate(),
                    'limit_date' => Carbon::today()->addDays(22)->toDate()
                ],
                [
                    'title' => 'Leviatán',
                    'author' => 'Thomas Hobbes',
                    'image_url' => 'https://m.media-amazon.com/images/I/818wdevwmqL._AC_UF1000,1000_QL80_DpWeblab_.jpg',
                    'borrower' => 'Fran',
                    'start_date' => Carbon::today()->subDays(40)->toDate(),
                    'limit_date' => Carbon::today()->subDays(10)->toDate()
                ],
                [
                    'title' => 'Los Juegos del Hambre: Sinsajo',
                    'author' => 'Suzanne Collins',
                    'image_url' => 'https://m.media-amazon.com/images/I/71e4kjCsuAL._AC_UF894,1000_QL80_.jpg',
                    'borrower' => 'Ester',
                    'start_date' => Carbon::today()->subDays(47)->toDate(),
                    'limit_date' => Carbon::today()->subDays(17)->toDate()
                ]
            ))
            ->create();
    }
}
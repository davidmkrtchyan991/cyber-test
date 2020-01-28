<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Faker\Generator as Faker;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->take('10')->get();
        return view('home', compact('books'));
    }

    public function dbSeedBook(Faker $faker){
        for($j = 1; $j < 100; $j++){
            for($i = 0; $i < 100; $i++){
                $user_data[] = [
                    'name' => $faker->name,
                    'author_id' => $faker->numberBetween($min = 1, $max = 30), // or $factory->create(App\Author::class)->id
                    'category_id' => $faker->numberBetween($min = 1, $max = 10), // $factory->create(App\Category::class)->id
                    'publisher_id' => $faker->numberBetween($min = 1, $max = 10), // $factory->create(App\Publisher::class)->id
                    'release' => $faker->date(),
                    'license' => $faker->randomElement($array = array ('male', 'female')),
                    'size' => $faker->numberBetween($min = 10, $max = 20),
                    'font_size' => $faker->numberBetween($min = 9, $max = 16),
                    'wrapper' => $faker->randomElement($array = array ('hard', 'soft')),
                    'budget' => $faker->numberBetween($min = 1000, $max = 10000),
                    'avatar' => 'https://i.pravatar.cc/300?u=' . $faker->safeEmail
                ];
            }

            Book::insert($user_data);
        }
    }
}

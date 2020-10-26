<?php

namespace Database\Seeders;

use Faker\Provider\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\Int_;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => Str::random(10),
            'password' => Hash::make('password'),
            'image' => Str::random(10),
            'description' => Str::random(10),
        ]);
        DB::table('gamehub')->insert([
            'name' => Str::random(10),
            'image' => Image::imageUrl(640),
            'year' => Integer::random(),
            'company' => Str::random(10),
        ]);
    }
}

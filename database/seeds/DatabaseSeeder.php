<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_artist_type')->insert(['artist_type' => 'Select your artist type...', 'status' => 'approved']);
        DB::table('tbl_artist_type')->insert(['artist_type' => 'Musician', 'status' => 'approved']);
        DB::table('tbl_artist_type')->insert(['artist_type' => 'Painter', 'status' => 'approved']);
        DB::table('tbl_artist_type')->insert(['artist_type' => 'Dancer', 'status' => 'approved']);
        DB::table('tbl_artist_type')->insert(['artist_type' => 'Photographer', 'status' => 'approved']);
        DB::table('tbl_artist_type')->insert(['artist_type' => 'Filmmaker', 'status' => 'approved']);
        DB::table('tbl_artist_type')->insert(['artist_type' => 'Sculptor', 'status' => 'approved']);
        DB::table('tbl_artist_type')->insert(['artist_type' => 'Music Producer', 'status' => 'approved']);
        DB::table('tbl_artist_type')->insert(['artist_type' => 'YouTuber', 'status' => 'approved']);
        DB::table('tbl_artist_type')->insert(['artist_type' => 'Stranger', 'status' => 'disapporved']);
    }
}
<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Home;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
      
            DB::table('users')->insert(
                [
                    "id"=>"4",
                    "name"=>"Shunlay",
                    "email"=>"Shun@gamil.com",
                    "isAdmin"=>"1",
                    "isPremium"=>"1",
                    "password"=>Hash::make('12345678'),
                ]
                );
        }
        
    }
  

<?php

namespace Database\Seeders;
use App\Models\{ User, WalletCostsheet, WalletOrderList};
use App\Models\Wallet_Sales_Cost_Statement;

use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {


        // Users
        User::withoutEvents(function () {
            // Create 1 admin
            User::factory(1)->create([
                'last_name' => 'Admin',

                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 'admin',
            ]);
            // Create 2 managers
            User::factory()->count(10)->create([
                'role' => 'manager',
            ]);
            // Create 3 users
            User::factory()->count(10)->create();
        });


        // Create 20 orders
        WalletOrderList::factory()->count(20)->create();

        // Create 20 orders
       // Wallet_Sales_Cost_Statement::factory()->count(10)->create();
        WalletCostsheet::factory()->count(20)->create();




        DB::table('categories')->insert([
            [
                'title' => 'Fashion',
                'slug' => 'Fashion'
            ],
            [
                'title' => 'Shoe',
                'slug' => 'Shoe'
            ],

            [
                'title' => 'And Textile',
                'slug' => 'And Textile'
            ],
            [
                'title' => 'Accessory',
                'slug' => 'Accessory'
            ],
            [
                'title' => 'Home-Garden',
                'slug' => 'Home-Garden'
            ],

            [
                'title' => 'Sport',
                'slug' => 'sport'
            ],
            [
                'title' => 'Electonic',
                'slug' => 'Electronic'
            ],
            [
                'title' => 'Cosmetic',
                'slug' => 'cosmetic'
            ],
            [
                'title' => 'Hobby-Toy',
                'slug' => 'hobby-toy'
            ],
            [
                'title' => 'Mother-Baby',
                'slug' => 'Mother-Baby'
            ],
            [
                'title' => 'Supermarket',
                'slug' => 'Supermarket'
            ],

            [
                'title' => 'Book',
                'slug' => 'book'
            ],
            [
                'title' => 'Petshop',
                'slug' => 'Petshop'
            ],


            [
                'title' => 'Construction market',
                'slug' => 'Construction market'
            ],
            [
                'title' => 'Office-Stationery',
                'slug' => 'Office-Stationery'
            ],

            [
                'title' => 'Automobile-Motorcycle',
                'slug' => 'Automobile-Motorcycle'
            ],
            [
                'title' => 'Movie-Music-Entertainment',
                'slug' => 'Movie-Music-Entertainment'
            ],

            [
                'title' => 'Holiday',
                'slug' => 'Holiday'
            ],

        ]);


    }
}
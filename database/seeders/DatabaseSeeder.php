<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DeathNotice;
use App\Models\DirectoryListing;
use App\Models\PhoneType;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(DirectoryListingSeeder::class);
        $this->call(ContactInformationSeeder::class);
        $this->call(DeathNoticeSeeder::class);
        $this->call(LocalEatSeeder::class);
        $this->call(PlanningApplicationSeeder::class);
        $this->call(RestaurantSeeder::class);
        $this->call(TransportSeeder::class);
        $this->call(PhoneTypeSeeder::class);
        
    }
}

<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Company;
use App\Models\FacilityProvider;
use App\Models\PeeringCluster;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            [
                'name' => "Administrator",
                'email' => "admin@gmail.com",
                'password' => encrypt("12345678"),
            ]
        ]);
    }
}

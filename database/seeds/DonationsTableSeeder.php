<?php

use App\Donation;
use Illuminate\Database\Seeder;

class DonationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Donation::class, 10)->create();
    }
}

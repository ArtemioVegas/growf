<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryDaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_days')->insert([[
                'tarif_id' => '1',
                'day' => '1',
            ], [
                'tarif_id' => '1',
                'day' => '3',
            ], [
                'tarif_id' => '1',
                'day' => '5',
            ], [
                'tarif_id' => '2',
                'day' => '2',
            ], [
                'tarif_id' => '2',
                'day' => '3',
            ], [
                'tarif_id' => '2',
                'day' => '4',
            ], [
                'tarif_id' => '3',
                'day' => '1',
            ], [
                'tarif_id' => '3',
                'day' => '6',
            ], [
                'tarif_id' => '3',
                'day' => '7',
            ]]
        );
    }
}

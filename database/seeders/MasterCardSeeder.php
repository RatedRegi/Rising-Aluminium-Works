<?php

namespace Database\Seeders;

use App\Models\MasterCard;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MasterCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mastercard')->insert([
            'card_holder' => 'Reginald',
            'card_number' => '202520252025',
            'month' => 12,
            'year' => 2030,
            'cvv' => '101', 
            'balance' => 500000,
            'card_holder_address' => '2181/2 Mkoba 12',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}

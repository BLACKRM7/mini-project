<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::firstOrCreate(
            ['room_name' => 'Lantai 1'],
            ['location' => 'Gaming', 'status' => 'available']
        );

        Room::firstOrCreate(
            ['room_name' => 'Lantai 2'],
            ['location' => 'Office', 'status' => 'available']
        );

        Room::firstOrCreate(
            ['room_name' => 'Lantai 3'],
            ['location' => 'Design', 'status' => 'available']
        );
    }
}

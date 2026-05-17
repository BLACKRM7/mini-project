<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PC;
use App\Models\Room;

class PcsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gamingRoom = Room::firstOrCreate([
            'room_name' => 'Lantai 1',
        ], [
            'location' => 'Gaming',
            'status' => 'available',
        ]);

        $officeRoom = Room::firstOrCreate([
            'room_name' => 'Lantai 2',
        ], [
            'location' => 'Office',
            'status' => 'available',
        ]);

        $designRoom = Room::firstOrCreate([
            'room_name' => 'Lantai 3',
        ], [
            'location' => 'Design',
            'status' => 'available',
        ]);

        // Contoh data PC
        $pcs = [
            // Lantai 1 - Gaming
            [
                'room_id' => $gamingRoom->id,
                'pc_code' => 'PC-001',
                'pc_name' => 'Gaming Beast',
                'processor' => 'Intel Core i9',
                'ram' => '32GB',
                'storage' => '1TB SSD',
                'status' => 'available',
            ],
            [
                'room_id' => $gamingRoom->id,
                'pc_code' => 'PC-002',
                'pc_name' => 'FPS Destroyer',
                'processor' => 'Intel Core i7',
                'ram' => '16GB',
                'storage' => '512GB SSD',
                'status' => 'available',
            ],
            [
                'room_id' => $gamingRoom->id,
                'pc_code' => 'PC-003',
                'pc_name' => 'Racing Pro',
                'processor' => 'AMD Ryzen 7',
                'ram' => '16GB',
                'storage' => '512GB SSD',
                'status' => 'available',
            ],
            [
                'room_id' => $gamingRoom->id,
                'pc_code' => 'PC-004',
                'pc_name' => 'VR Ready',
                'processor' => 'AMD Ryzen 9',
                'ram' => '32GB',
                'storage' => '1TB SSD',
                'status' => 'available',
            ],
            [
                'room_id' => $gamingRoom->id,
                'pc_code' => 'PC-005',
                'pc_name' => 'Streaming Station',
                'processor' => 'Intel Core i7',
                'ram' => '16GB',
                'storage' => '1TB SSD',
                'status' => 'available',
            ],

            // Lantai 2 - Office
            [
                'room_id' => $officeRoom->id,
                'pc_code' => 'PC-006',
                'pc_name' => 'Office Workstation 1',
                'processor' => 'Intel Core i5',
                'ram' => '8GB',
                'storage' => '256GB SSD',
                'status' => 'available',
            ],
            [
                'room_id' => $officeRoom->id,
                'pc_code' => 'PC-007',
                'pc_name' => 'Office Workstation 2',
                'processor' => 'Intel Core i5',
                'ram' => '8GB',
                'storage' => '256GB SSD',
                'status' => 'available',
            ],
            [
                'room_id' => $officeRoom->id,
                'pc_code' => 'PC-008',
                'pc_name' => 'Accounting PC',
                'processor' => 'Intel Core i5',
                'ram' => '8GB',
                'storage' => '512GB SSD',
                'status' => 'available',
            ],
            [
                'room_id' => $officeRoom->id,
                'pc_code' => 'PC-009',
                'pc_name' => 'Admin PC',
                'processor' => 'Intel Core i5',
                'ram' => '8GB',
                'storage' => '512GB SSD',
                'status' => 'available',
            ],
            [
                'room_id' => $officeRoom->id,
                'pc_code' => 'PC-010',
                'pc_name' => 'Meeting Room PC',
                'processor' => 'Intel Core i5',
                'ram' => '8GB',
                'storage' => '256GB SSD',
                'status' => 'available',
            ],

            // Lantai 3 - Design
            [
                'room_id' => $designRoom->id,
                'pc_code' => 'PC-011',
                'pc_name' => 'Design Studio 1',
                'processor' => 'AMD Ryzen 7',
                'ram' => '16GB',
                'storage' => '1TB SSD',
                'status' => 'available',
            ],
            [
                'room_id' => $designRoom->id,
                'pc_code' => 'PC-012',
                'pc_name' => 'Design Studio 2',
                'processor' => 'AMD Ryzen 7',
                'ram' => '16GB',
                'storage' => '1TB SSD',
                'status' => 'available',
            ],
            [
                'room_id' => $designRoom->id,
                'pc_code' => 'PC-013',
                'pc_name' => 'Render Workstation',
                'processor' => 'Intel Core i9',
                'ram' => '32GB',
                'storage' => '1TB SSD',
                'status' => 'available',
            ],
            [
                'room_id' => $designRoom->id,
                'pc_code' => 'PC-014',
                'pc_name' => 'Graphic Designer',
                'processor' => 'AMD Ryzen 9',
                'ram' => '32GB',
                'storage' => '1TB SSD',
                'status' => 'available',
            ],
            [
                'room_id' => $designRoom->id,
                'pc_code' => 'PC-015',
                'pc_name' => 'Creative Hub',
                'processor' => 'AMD Ryzen 7',
                'ram' => '16GB',
                'storage' => '512GB SSD',
                'status' => 'available',
            ],
        ];

        // Insert data ke database
        foreach ($pcs as $pc) {
            PC::firstOrCreate(['pc_code' => $pc['pc_code']], $pc);
        }
    }
}

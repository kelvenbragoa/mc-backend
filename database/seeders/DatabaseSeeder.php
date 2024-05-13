<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
                // User::factory(10)->create(]);

                // User::factory()->create([
                //     'name' => 'Test User',
                //     'email' => 'test@example.com',
                // ]]);
                DB::table('operations')->insert([
                        [
                                // 'id'=>1,
                                'name' => 'Entrega', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>2,
                                'name' => 'Devolução', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                ]);
                

                DB::table('device_availabilities')->insert([
                        [
                                // 'id'=>1,
                                'name' => 'Free', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>2,
                                'name' => 'Busy', 'created_at' => now(),
                                'updated_at' => now(),
                        ],
                ]);
                DB::table('roles')->insert([
                        [
                                // 'id'=>1,
                                'name' => 'Admin', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>2,
                                'name' => 'Supervisor', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>3,
                                'name' => 'Operator', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                ]);
                DB::table('device_statuses')->insert([
                        [
                                // 'id'=>1,
                                'name' => 'Working Fine', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>2,
                                'name' => 'Damaged', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                ]);
                DB::table('provinces')->insert([
                        [
                                // 'id'=>1,
                                'name' => 'Maputo Cidade', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>2,
                                'name' => 'Maputo Provincia', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>3,
                                'name' => 'Gaza', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>4,
                                'name' => 'Inhambane', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>5,
                                'name' => 'Sofala', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>6,
                                'name' => 'Manica',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>7,
                                'name' => 'Tete',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>8,
                                'name' => 'Nampula',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>9,
                                'name' => 'Zambezia',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>10,
                                'name' => 'Cabo Delgado',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>11,
                                'name' => 'Niassa',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                ]);
                
                DB::table('users')->insert([
                        [
                                // 'id'=>1,
                                'name' => 'Admin',
                                'email' => 'admin@cornelder.co.mz',
                                'mobile' => '811234567',
                                'role_id' => 1,
                                'password' => Hash::make('password'),
                                'created_at' => now(),
                                'updated_at' => now(),
                        ]
                ]);
        }
}

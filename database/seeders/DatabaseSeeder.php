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
                
                DB::table('roles')->insert([
                        [
                                // 'id'=>1,
                                'name' => 'Administrador', 
                                'slug' => 'administrador',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>2,
                                'name' => 'Gestor', 
                                'slug'=> 'gestor',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>3,
                                'name' => 'Operador', 
                                'slug'=> 'operador',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                ]);

                DB::table('provinces')->insert([
                        [
                                // 'id'=>1,
                                'name' => 'Maputo Cidade', 
                                'slug' => 'maputo-cidade',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>2,
                                'name' => 'Maputo Provincia', 
                                'slug' =>'maputo-provincia',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>3,
                                'name' => 'Gaza', 
                                'slug' =>'gaza',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>4,
                                'name' => 'Inhambane', 
                                'slug' =>'inhambane',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>5,
                                'name' => 'Sofala', 
                                'slug' => 'sofala',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>6,
                                'name' => 'Manica',
                                'slug' => 'manica',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>7,
                                'name' => 'Tete',
                                'slug' => 'tete',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>8,
                                'name' => 'Nampula',
                                'slug' => 'nampula',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>9,
                                'name' => 'Zambezia',
                                'slug' => 'zambezia',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>10,
                                'name' => 'Cabo Delgado',
                                'slug' => 'cabo-delgado',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>11,
                                'name' => 'Niassa',
                                'slug' => 'niassa',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                ]);
                
                DB::table('users')->insert([
                        [
                                // 'id'=>1,
                                'name' => 'Admin',
                                'email' => 'admin@cm.co.mz',
                                'mobile' => '811234567',
                                'role_id' => 1,
                                'is_active' => 1,
                                'password' => Hash::make('password'),
                                'slug'=>'admin',
                                'created_at' => now(),
                                'updated_at' => now(),
                        ]
                ]);
        }
}

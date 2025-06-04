<?php

namespace Database\Seeders;

<<<<<<< HEAD
use App\Models\User;
=======
>>>>>>> 4d5adbcd7abac5b4ddd7716a201e1e65d62eee9f
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // User::factory(10)->create();

       // User::factory()->create([
          //  'nom' => 'Test User',
          //  'email' => 'test@example.com',
     //   ]);

        $this->call([
            UsersTableSeeder::class,
            OtherTablesSeeder::class,
        ]);
=======
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UsersTableSeeder::class);
>>>>>>> 4d5adbcd7abac5b4ddd7716a201e1e65d62eee9f
    }
}

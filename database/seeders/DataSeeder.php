<?php

namespace Database\Seeders;

use App\Models\Letter_type;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::Create([
            'name' => 'staff',
            'email' => 'staff@example.com',
            'password' => Hash::make('staff498'),
            'role' => 'staff'
        ]);

        User::Create([
            'name' => 'Fachrezi S.Pd',
            'email' => 'fachrezi@example.com',
            'password' => Hash::make('teacher498'),
            'role' => 'teacher'
        ]);

        User::Create([
            'name' => 'Deni T.A. S.Pd',
            'email' => 'deni@example.com',
            'password' => Hash::make('teacher498'),
            'role' => 'teacher'
        ]);

        User::Create([
            'name' => 'Dinda D.T. S.Kom',
            'email' => 'dinda@example.com',
            'password' => Hash::make('teacher498'),
            'role' => 'teacher'
        ]);

        Letter_type::Create([
            'letter_code' => "KS-2323-A",
            'letter_name' => 'Rapat Rutin'
        ]);

        Letter_type::Create([
            'letter_code' => "KS-2313-B",
            'letter_name' => 'Workshop'
        ]);
    }
}

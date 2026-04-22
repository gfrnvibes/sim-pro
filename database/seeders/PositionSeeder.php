<?php

namespace Database\Seeders;

use App\Models\HumanResource\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::insert([
            ['name' => 'Guru'],
            ['name' => 'Kepala Sekolah'],
            ['name' => 'Bendahara'],
            ['name' => 'Wali Kelas'],
            ['name' => 'Operator'],
            ['name' => 'Kesiswaan'],
            ['name' => 'Pembina Ekskul'],
            ['name' => 'Tata Usaha'],
        ]);
    }
}

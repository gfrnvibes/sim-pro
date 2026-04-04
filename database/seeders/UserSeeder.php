<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Super Admin',     'email' => 'superadmin@mail.com',  'role' => 'super_admin'],
            ['name' => 'Bendahara',       'email' => 'bendahara@mail.com',   'role' => 'bendahara'],
            ['name' => 'Kepala Sekolah',  'email' => 'kepsek@mail.com',     'role' => 'kepsek'],
            ['name' => 'Wali Kelas',      'email' => 'walikelas@mail.com',  'role' => 'wali_kelas'],
            ['name' => 'Guru',            'email' => 'guru@mail.com',       'role' => 'guru'],
            ['name' => 'Tata Usaha',      'email' => 'tu@mail.com',         'role' => 'tata_usaha'],
            ['name' => 'Operator',        'email' => 'operator@mail.com',   'role' => 'operator'],
            ['name' => 'Kesiswaan',       'email' => 'kesiswaan@mail.com',  'role' => 'kesiswaan'],
            ['name' => 'Pembina Ekskul',  'email' => 'ekskul@mail.com',     'role' => 'pembina_ekskul'],
            ['name' => 'Orang Tua',       'email' => 'parent@mail.com',     'role' => 'parent'],
            ['name' => 'Siswa',           'email' => 'siswa@mail.com',      'role' => 'siswa'],
        ];

        foreach ($users as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('password123'),
                ]
            );

            $user->assignRole($data['role']);
        }
    }
}

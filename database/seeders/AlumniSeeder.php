<?php

namespace Database\Seeders;

use App\Models\Alumni;
use Illuminate\Database\Seeder;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alumni::create([
                "user_id" => 2,
                "prodi" => 'Teknik Informatika',
                "jenjang" => 'D4',
                "jenis_kelamin" => 'Laki-laki',
                "agama" => 'Islam',
                "tahun_masuk" => '2017',
                "tahun_lulus" => '2022',
        ]);
    }
}

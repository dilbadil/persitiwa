<?php

use Illuminate\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = "
        INSERT INTO provinsi (id, nama) VALUES
            (1, 'Bangka Belitung'),
            (2, 'Bengkulu'),
            (3, 'Jambi'),
            (4, 'Kepulauan Riau'),
            (5, 'Lampung'),
            (6, 'Nanggroe Aceh Darrussalam'),
            (7, 'Riau'),
            (8, 'Sumatera Barat'),
            (9, 'Sumatera Selatan'),
            (10, 'Sumatera Utara'),
            (11, 'Banten'),
            (12, 'DI Yogyakarta'),
            (13, 'DKI Jakarta'),
            (14, 'Jawa Barat'),
            (15, 'Jawa Tengah'),
            (16, 'Jawa Timur'),
            (17, 'Kalimantan Barat'),
            (18, 'Kalimantan Tengah'),
            (19, 'Kalimantan Selatan'),
            (20, 'Kalimantan Timur'),
            (21, 'Gorontalo'),
            (22, 'Sulawesi Barat'),
            (23, 'Sulawesi Selatan'),
            (24, 'Sulawesi Tengah'),
            (25, 'Sulawesi Tenggara'),
            (26, 'Sulawesi Utara'),
            (27, 'Bali'),
            (28, 'Nusa Tenggara Barat'),
            (29, 'Nusa Tenggara Timur'),
            (30, 'Maluku'),
            (31, 'Maluku Utara'),
            (32, 'Papua Barat'),
            (33, 'Papua');
            ";
        DB::connection()->getPdo()->exec($sql);
    }
}

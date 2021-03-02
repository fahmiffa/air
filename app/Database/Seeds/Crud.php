<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Crud extends Seeder
{
    public function run()
    {

        $n = 10;
        for ($i = 1; $i < $n; $i++) {

            $da =
                [
                    'Pelanggan_ID' => rand(1, 100) + $i,
                    'Pelanggan_Nama'  => 'user' . $i,
                    'Pelanggan_Alamat' => 'Indonesia ' . $i,
                    'Pelanggan_Telp' => '028 ' . $i,
                    'Pelanggan_PIC' => 'user' . $i,
                    'Pelanggan_HP' => '0856408917' . $i,
                    'Pelanggan_crated_Date' => date('Y-m-d H:i:s'),
                    'Pelanggan_Created_By' => 'seed',
                    'Pelanggan_Modified_Date' => date('Y-m-d H:i:s'),
                    'Pelanggan_Modified_By' => 'seed',
                    'Harga_ID' => 200000 + $i
                ];


            $this->db->table('pelanggan')->insert($da);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'kode_supplier' => 'SPL-001',
                'nama_supplier' => 'PT. Mega Elektronik Utama',
                'kontak' => '021-5551234',
                'email' => 'info@megaelektronik.co.id',
                'alamat' => 'Jl. Industri Raya No. 12, Jakarta Pusat',
            ],
            [
                'kode_supplier' => 'SPL-002',
                'nama_supplier' => 'CV. Abadi Furniture',
                'kontak' => '0812-3456-7890',
                'email' => 'sales@abadifurniture.com',
                'alamat' => 'Jl. Meubelindo No. 45, Jepara',
            ],
            [
                'kode_supplier' => 'SPL-003',
                'nama_supplier' => 'PT. Alat Tulis Nusantara',
                'kontak' => '021-7778899',
                'email' => 'kontak@atknusantara.id',
                'alamat' => 'Kawasan Industri Jababeka Blok C-3, Cikarang',
            ],
            [
                'kode_supplier' => 'SPL-004',
                'nama_supplier' => 'Catering Sehat Makmur',
                'kontak' => '0857-1122-3344',
                'email' => 'admin@sehatmakmur.com',
                'alamat' => 'Jl. Kuliner No. 8, Bandung',
            ],
            [
                'kode_supplier' => 'SPL-005',
                'nama_supplier' => 'Distributor Sumber Tirta',
                'kontak' => '0821-9988-7766',
                'email' => 'sumbertirta@gmail.com',
                'alamat' => 'Jl. Air Bersih No. 101, Surabaya',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
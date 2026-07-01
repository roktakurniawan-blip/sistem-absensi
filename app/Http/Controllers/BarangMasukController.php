<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // <-- 1. Pastikan Tambahkan Import DB ini di atas

class BarangMasukController extends Controller
{
    // ... method index dan create yang sudah dibuat tetap biarkan saja

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 2. Validasi input dasar transaksi
        $request->validate([
            'no_transaksi'  => 'required|unique:barang_masuks,no_transaksi|max:50',
            'tanggal_masuk' => 'required|date',
            'supplier_id'   => 'required|exists:suppliers,id',
        ]);

        // 3. Gunakan Database Transaction untuk mengamankan data
        DB::beginTransaction();

        try {
            // Simpan data utama Transaksi Barang Masuk
            $barangMasuk = BarangMasuk::create([
                'no_transaksi'  => $request->no_transaksi,
                'tanggal_masuk' => $request->tanggal_masuk,
                'supplier_id'   => $request->supplier_id,
                'user_id'       => auth()->id(), // Mencatat user yang sedang login
            ]);

            // CATATAN TIM: Logika perulangan item barang (tabel pivot detail_barang_masuk) 
            // dan fungsi otomatisasi +Stok Barang akan disempurnakan bersama Tim Frontend 
            // saat form input dinamis JS selesai dipasang di Fase 3.

            DB::commit();

            return redirect()->route('barang-masuks.index')
                ->with('success', 'Transaksi ' . $request->no_transaksi . ' berhasil disimpan!');

        } catch (\Exception $e) {
            DB::rollBack(); // Batalkan semua jika ada error eksekusi
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan transaksi: ' . $e->getMessage());
        }
    }
}

    /**
     * Display the specified resource.
     */
    public function show(BarangMasuk $barangMasuk)
    {
        // Me-load relasi supplier dan user pencatat agar bisa ditampilkan di halaman detail
        $barangMasuk->load(['supplier', 'user']);

        return view('barang-masuk.show', compact('barangMasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangMasuk $barangMasuk)
    {
        // Tidak diwajibkan di requirement dokumen untuk edit transaksi masuk
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        // Tidak diwajibkan di requirement dokumen untuk update transaksi masuk
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangMasuk $barangMasuk)
    {
        // Tidak diwajibkan di requirement dokumen untuk delete transaksi masuk
    }
}
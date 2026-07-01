@extends('layouts.app')

@section('title', 'Detail Barang Masuk')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Nota Transaksi: {{ $barangMasuk->no_transaksi }}</h6>
            <a href="{{ route('barang-masuks.index') }}" class="btn btn-sm btn-secondary">Kembali ke Riwayat</a>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <table class="table table-borderless sm-table">
                        <tr>
                            <td width="35%"><strong>Tanggal Masuk</strong></td>
                            <td width="5%">:</td>
                            <td>{{ \Carbon\Carbon::parse($barangMasuk->tanggal_masuk)->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Pencatat (User)</strong></td>
                            <td>:</td>
                            <td>{{ $barangMasuk->user->name ?? 'Sistem' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-borderless sm-table">
                        <tr>
                            <td width="35%"><strong>Supplier</strong></td>
                            <td width="5%">:</td>
                            <td><strong>{{ $barangMasuk->supplier->nama_supplier ?? '-' }}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Kode Supplier</strong></td>
                            <td>:</td>
                            <td><span class="badge bg-secondary">{{ $barangMasuk->supplier->kode_supplier ?? '-' }}</span></td>
                        </tr>
                    </table>
                </div>
            </div>

            <hr>
            <h5>Daftar Item Masuk</h5>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Barang</th>
                            <th width="15%" class="text-end">Harga Satuan</th>
                            <th width="15%" class="text-center">Jumlah Masuk</th>
                            <th width="20%" class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Perulangan item detail menggunakan relasi pivot $barangMasuk->barangs akan di-render di sini --}}
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Detail item barang akan dimuat secara otomatis setelah relasi many-to-many disinkronkan.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
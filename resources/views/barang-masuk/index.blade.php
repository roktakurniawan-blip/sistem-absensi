@extends('layouts.app')

@section('title', 'Riwayat Barang Masuk')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Barang Masuk</h1>
        <a href="{{ route('barang-masuks.create') }}" class="btn btn-primary">
            + Tambah Transaksi Masuk
        </a>
    </div>

    @include('partials.alert')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat Transaksi Masuk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">No. Transaksi</th>
                            <th width="15%">Tanggal Masuk</th>
                            <th width="25%">Supplier</th>
                            <th width="15%">Total Item Jenis</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Data akan di-looping menggunakan @forelse pada Fase 3 --}}
                        <tr>
                            <td colspan="6" class="text-center py-4">Data transaksi barang masuk belum tersedia.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
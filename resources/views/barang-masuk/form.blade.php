@extends('layouts.app')

@section('title', 'Tambah Barang Masuk')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Form Transaksi Barang Masuk Baru</h6>
                    <a href="{{ route('barang-masuks.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('barang-masuks.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="no_transaksi" class="form-label font-weight-bold">No. Transaksi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="no_transaksi" name="no_transaksi" placeholder="Contoh: TRM-202607-001" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="tanggal_masuk" class="form-label font-weight-bold">Tanggal Masuk <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="supplier_id" class="form-label font-weight-bold">Pilih Supplier <span class="text-danger">*</span></label>
                            <select class="form-<div class="mb-4">
    <label for="supplier_id" class="form-label font-weight-bold">Pilih Supplier <span class="text-danger">*</span></label>
    <select class="form-select @error('supplier_id') is-invalid @enderror" id="supplier_id" name="supplier_id" required>
        <option value="">-- Pilih Supplier Penyuplai --</option>
        @foreach($suppliers as $supplier)
            <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                {{ $supplier->kode_supplier }} - {{ $supplier->nama_supplier }}
            </option>
        @endforeach
    </select>
    @error('supplier_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
                                <option value="">-- Pilih Supplier Penyuplai --</option>
                                {{-- Dropdown supplier di-passing dari controller di Fase 3 --}}
                            </select>
                        </div>

                        <div class="hr-line-dashed my-4"></div>

                        <h5>Daftar Item Barang</h5>
                        <p class="text-muted small">Input detail item barang beserta jumlah masuk dan harga akan diimplementasikan menggunakan baris dinamis pada Fase 3.</p>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="reset" class="btn btn-light">Reset</button>
                            <button type="submit" class="btn btn-success">Simpan Transaksi Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
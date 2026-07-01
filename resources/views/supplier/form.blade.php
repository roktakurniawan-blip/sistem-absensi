@extends('layouts.app')

@section('title', isset($supplier) ? 'Edit Supplier' : 'Tambah Supplier')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{ isset($supplier) ? 'Form Perbarui Data Supplier' : 'Form Tambah Data Supplier Baru' }}
                    </h6>
                    <a href="{{ route('suppliers.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($supplier) ? route('suppliers.update', $supplier->id) : route('suppliers.store') }}" method="POST">
                        @csrf
                        @if(isset($supplier))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="kode_supplier" class="form-label font-weight-bold">Kode Supplier <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('kode_supplier') is-invalid @enderror" id="kode_supplier" name="kode_supplier" 
                                value="{{ old('kode_supplier', $supplier->kode_supplier ?? '') }}" placeholder="Contoh: SPL-001" 
                                {{ isset($supplier) ? 'readonly' : '' }} required>
                            @error('kode_supplier')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_supplier" class="form-label font-weight-bold">Nama Supplier/Perusahaan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" id="nama_supplier" name="nama_supplier" 
                                value="{{ old('nama_supplier', $supplier->nama_supplier ?? '') }}" placeholder="Masukkan nama" required>
                            @error('nama_supplier')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kontak" class="form-label font-weight-bold">No. Telepon / HP</label>
                            <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" name="kontak" 
                                value="{{ old('kontak', $supplier->kontak ?? '') }}" placeholder="Contoh: 08123456789">
                            @error('kontak')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label font-weight-bold">Alamat Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" 
                                value="{{ old('email', $supplier->email ?? '') }}" placeholder="Contoh: supplier@bisnis.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label font-weight-bold">Alamat Lengkap</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="4" placeholder="Masukkan alamat lengkap...">{{ old('alamat', $supplier->alamat ?? '') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="reset" class="btn btn-light">Reset</button>
                            <button type="submit" class="btn btn-success">
                                {{ isset($supplier) ? 'Simpan Perubahan' : 'Daftarkan Supplier' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
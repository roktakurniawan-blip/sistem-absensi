@extends('layouts.app')

@section('title', 'Daftar Supplier')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Supplier</h1>
        <a href="{{ route('suppliers.create') }}" class="btn btn-primary">
            + Tambah Supplier
        </a>
    </div>

    <!-- Alert Flash Message -->
    @include('partials.alert')

    <!-- Card Filter & Pencarian -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('suppliers.index') }}" class="row g-3 align-items-center">
                <div class="col-12 col-md-4">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari kode atau nama supplier..." value="{{ request('search') }}">
                        <button class="btn btn-outline-primary" type="submit">Cari</button>
                    </div>
                </div>
                @if(request('search'))
                    <div class="col-12 col-md-2">
                        <a href="{{ route('suppliers.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <!-- Data Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Seluruh Supplier</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">Kode Supplier</th>
                            <th width="25%">Nama Supplier</th>
                            <th width="15%">Kontak</th>
                            <th width="15%">Email</th>
                            <th width="15%">Alamat</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($suppliers as $key => $item)
                        <tr>
                            <td>{{ $suppliers->firstItem() + $key }}</td>
                            <td><span class="badge bg-secondary">{{ $item->kode_supplier }}</span></td>
                            <td><strong>{{ $item->nama_supplier }}</strong></td>
                            <td>{{ $item->kontak ?? '-' }}</td>
                            <td>{{ $item->email ?? '-' }}</td>
                            <td>{{ $item->alamat ?? '-' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('suppliers.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('suppliers.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus supplier ini?');" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">Data supplier belum tersedia atau tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $suppliers->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
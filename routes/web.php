use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangMasukController; // Pastikan ini di-import di atas

Route::middleware(['auth'])->group(function () {
    // ... route dev lain
    
    Route::resource('suppliers', SupplierController::class);
    Route::resource('barang-masuks', BarangMasukController::class); // Tambahkan baris ini
});
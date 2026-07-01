
/**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input data sesuai spesifikasi database
        $validated = $request->validate([
            'kode_supplier' => 'required|unique:suppliers,kode_supplier|max:50',
            'nama_supplier' => 'required|max:255',
            'kontak'        => 'nullable|max:50',
            'email'         => 'nullable|email|max:100',
            'alamat'        => 'nullable',
        ]);

        Supplier::create($validated);

        // Redirect kembali ke index dengan alert sukses
        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier ' . $request->nama_supplier . ' berhasil didaftarkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        // Validasi edit (kode_supplier di-ignore agar tidak dianggap duplikat dengan dirinya sendiri)
        $validated = $request->validate([
            'kode_supplier' => 'required|max:50|unique:suppliers,kode_supplier,' . $supplier->id,
            'nama_supplier' => 'required|max:255',
            'kontak'        => 'nullable|max:50',
            'email'         => 'nullable|email|max:100',
            'alamat'        => 'nullable',
        ]);

        $supplier->update($validated);

        return redirect()->route('suppliers.index')
            ->with('success', 'Data Supplier ' . $request->nama_supplier . ' berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $nama = $supplier->nama_supplier;
        $supplier->delete();

        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier ' . $nama . ' telah berhasil dihapus dari sistem!');
    }
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMaster;
use App\Models\Laporan;

class DataMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = $request->get('role'); // ?role=siswa / guru

        // Ambil parameter pencarian
        $search = $request->get('search');
        $searchJurusan = $request->get('search_jurusan');
        $searchTahunMasuk = $request->get('search_tahun_masuk');

        $data = DataMaster::when($role, function ($query, $role) {
            return $query->where('role', $role);
        })
        ->when($search, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%'); // Filter berdasarkan nama
        })
        ->when($searchJurusan, function ($query, $searchJurusan) {
            return $query->where('jurusan', 'like', '%' . $searchJurusan . '%'); // Filter berdasarkan jurusan
        })
        ->when($searchTahunMasuk, function ($query, $searchTahunMasuk) {
            return $query->whereYear('tanggal_masuk', 'like', '%' . $searchTahunMasuk . '%'); // Filter berdasarkan tahun masuk
        })
        ->latest()
        ->paginate(10);

        return view('pages.data_master.index', compact('data', 'role', 'search', 'searchJurusan', 'searchTahunMasuk'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.data_master.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'nullable|string|max:20',
            'nisn' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki - laki,Perempuan',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jurusan' => 'nullable|string|max:100',
            'agama' => 'required|string|max:100',
            'no_telfon' => 'nullable|string|max:20',
            'nik' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'nama_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            'asal_sekolah' => 'nullable|string|max:255',
            'jumlah_saudara' => 'nullable|integer',
            'role' => 'required|in:siswa,guru',
            'tanggal_masuk' => 'nullable|date', // Tambahkan validasi tanggal masuk
            'tanggal_masuk_guru' => 'nullable|date', // Tambahkan validasi tanggal masuk guru
        ]);

        DataMaster::create($validated);

        return redirect()->route('data-master.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = DataMaster::findOrFail($id);

        return view('pages.data_master.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataMaster $dataMaster)
    {
        return view('pages.data_master.edit', compact('dataMaster'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataMaster $dataMaster)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'nis' => 'nullable|string|max:20',
        'nisn' => 'required|string|max:20',
        'jenis_kelamin' => 'required|in:Laki - laki,Perempuan',
        'tempat_lahir' => 'required|string|max:100',
        'tanggal_lahir' => 'required|date',
        'jurusan' => 'nullable|string|max:100',
        'agama' => 'required|string|max:100',
        'no_telfon' => 'nullable|string|max:20',
        'nik' => 'nullable|string|max:20',
        'alamat' => 'nullable|string',
        'nama_ayah' => 'nullable|string|max:255',
        'nama_ibu' => 'nullable|string|max:255',
        'asal_sekolah' => 'nullable|string|max:255',
        'jumlah_saudara' => 'nullable|integer',
        'role' => 'required|in:siswa,guru',
        'tanggal_masuk' => 'nullable|date', // Tambahkan validasi tanggal masuk
        'tanggal_masuk_guru' => 'nullable|date', // Tambahkan validasi tanggal masuk guru
        'nilai_akhir' => 'nullable|numeric', // Tambahkan validasi nilai akhir
    ]);

    $dataMaster->update($validated);

    return redirect()->route('data-master.index')->with('success', 'Data berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataMaster $dataMaster)
    {
        $dataMaster->delete();

        return redirect()->route('data-master.index')->with('success', 'Data berhasil dihapus.');
    }

    public function kirimKeLaporan(Request $request, $id)
    {
        $data = DataMaster::findOrFail($id);

        // Pindahkan data ke tabel laporan
        Laporan::create([
            'nama' => $data->nama,
            'nis' => $data->nis,
            'nisn' => $data->nisn,
            'jenis_kelamin' => $data->jenis_kelamin,
            'tempat_lahir' => $data->tempat_lahir,
            'tanggal_lahir' => $data->tanggal_lahir,
            'jurusan' => $data->jurusan,
            'agama' => $data->agama,
            'no_telfon' => $data->no_telfon,
            'nik' => $data->nik,
            'alamat' => $data->alamat,
            'nama_ayah' => $data->nama_ayah,
            'nama_ibu' => $data->nama_ibu,
            'asal_sekolah' => $data->asal_sekolah,
            'jumlah_saudara' => $data->jumlah_saudara,
            'role' => $data->role,
            'tanggal_masuk' => $data->tanggal_masuk,
            'tanggal_masuk_guru' => $data->tanggal_masuk_guru,
            'keterangan' => $request->keterangan,
        ]);

        // Hapus dari data master
        $data->delete();

        return redirect()->route('data-master.index')->with('success', 'Data berhasil dikirim ke laporan dan dihapus dari data master.');
    }
}

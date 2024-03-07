<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Dosen;
use Barryvdh\DomPDF\PDF;
use App\Models\IjinDosen;
use App\Models\AnggotaIjin;
use Illuminate\Http\Request;

class IjinDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ijin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = Dosen::all();
        return view('ijin.create', compact('dosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'pengusul' => 'required',
            'tglPelaksanaan' => 'required',
            'tujuan'    => 'required',
            'kegiatan'  => 'required',
            'file' => 'required'
        ]);

        $dateRangeInput = explode(' - ', $request->tglPelaksanaan);
        $startDate = Carbon::parse($dateRangeInput[0])->toDateString();
        $endDate = Carbon::parse($dateRangeInput[1])->toDateString();

        // dd($startDate);

        $data =  new IjinDosen;
        $data->pengusul = $request->pengusul;
        $data->tgl_mulai = $startDate;
        $data->tgl_selesai = $endDate;
        $data->tujuan = $request->tujuan;
        $data->kegiatan = $request->kegiatan;

        if ($request->file('file')->isValid()) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads', $filename);

            // Simpan informasi lokasi file ke dalam database
            $data->file_path = 'uploads/' . $filename;

            $data->save();

            $data->pelaksana()->createMany(array_map(function ($anggotaId) {
                return ['dosen_id' => $anggotaId, 'status' => 1];
            }, $request->anggotaTIM));
            // $data->pelaksana()->createMany(
            //     collect($request->anggotaTIM)->map(function ($anggotaId) {
            //         return ['dosen_id' => $anggotaId, 'status' => 1];
            //     })->toArray()
            // );

            return redirect()->route('ijin-dosen.index')->with('success', 'Pengajuan Ijin Kegiatan berhasil dilakukan.');
        }
        return redirect()->back()->withErrors(['msg', 'Terjadi kesalahan saat mengunggah file.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(IjinDosen $ijinDosen)
    {
        $data = AnggotaIjin::with('Dosen')->where('ijin_dosen_id', $ijinDosen->id)->get();
        // \dd($data);
        return view("ijin.show", \compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IjinDosen $ijinDosen)
    {
        $pdf = PDF::loadview($ijinDosen->file_path);
        return view('ijin.edit', \compact('ijinDosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IjinDosen $ijinDosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IjinDosen $ijinDosen)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Imports\DosenImport;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Dosen::orderBy('name', 'asc')->get();
            // return response()->json($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('dosen.show', Crypt::encryptString($row->id)) . '" class="showData btn btn-success btn-sm"><i class="far fa-fw fa-eye" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>';
                    // $btn = '<a href="javascript:void(0)" class="showData btn btn-success btn-sm" data-id="' . Crypt::encryptString($row->id) . '"><i class="far fa-fw fa-eye" data-toggle="tooltip"
                    //     data-placement="top" title="Detail"></i></a>';
                    $btn .= '&nbsp;';
                    $btn .= '<a href="' . route('dosen.edit', Crypt::encryptString($row->id)) . '" class="editData btn btn-primary btn-sm"><i class="far fa-fw fa-edit" data-toggle="tooltip"
                        data-placement="top" title="Edit"></i></a>';
                    // $btn .= '<a href="javascript:void(0)" class="editData btn btn-primary btn-sm" data-id="' . Crypt::encryptString($row->id) . '"><i class="far fa-fw fa-edit" data-toggle="tooltip"
                    //     data-placement="top" title="Edit"></i></a>';
                    $btn .= '&nbsp;';
                    $btn .= '<a href="javascript:void(0)" class="deleteData btn btn-danger btn-sm" data-id="' . Crypt::encryptString($row->id) . '"><i class="fa fa-fw fa-trash" data-toggle="tooltip"
                        data-placement="top" title="Delete"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        };
        return view('dosen.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([

            'name' => 'required',
            'nip' => 'required|numeric',
            'nidn' => 'required|numeric',
            'email' => 'required|email|regex:/.*@uny\.ac.id/',
            'noTelpon' => 'required|regex:/^([0-9\+]*)$/|min:10',
            // 'password' => 'required|min:6',
        ]);

        Dosen::create([
            'name' => $validatedData['name'],
            'nip' => $validatedData['nip'],
            'nidn' => $validatedData['nidn'],
            'email' => strtolower($validatedData['email']),
            'noTelp' => $validatedData['noTelpon'],
        ]);
        // Save the data to the database or perform other actions
        return response()->json([
            'success'   => true,
            'message'   => 'Penambahan Data Dosen Berhasil disimpan',
            'redirect_url' => route('dosen.index')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dosen = Dosen::FindOrFail(Crypt::decryptString($id));

        // dd($dosen);

        return view('dosen.show', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd($id);

        $dosen = Dosen::FindOrFail(Crypt::decryptString($id));

        // dd($dosen);

        return view('dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dosen = Dosen::FindOrFail(Crypt::decryptString($id));

        try {
            $dosen->delete();
            return response()->json([
                'success'   => true,
                'message'   => 'Data Dosen Berhasil dihapus..!',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan pada server.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function import(Request $request)
    {
        // dd($request);

        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        try {
            Excel::import(new DosenImport, $request->file('file'));
            return redirect()->back()->with('success', 'Data berhasil diimpor.');
        } catch (\Exception $e) {
            Log::error('Import data error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengimpor data. Silakan coba lagi.');
        }
    }
}

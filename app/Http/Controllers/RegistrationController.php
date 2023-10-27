<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Registration::select('no_pendaftaran', 'nama', 'alamat', 'tanggal_lahir', 'jenis_kelamin', 'agama_id', 'asal_sekolah', 'nilai_ind', 'nilai_ipa', 'nilai_mtk')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <a href="' . route('registration.show', $row->no_pendaftaran) . '" class="btn btn-primary btn-sm fa fa-eye"></a>
                    <a href="' . route('registration.edit', $row->no_pendaftaran) . '" class="edit btn btn-warning btn-sm fa fa-edit"></a> 
                    <a href="' . route('registration.destroy', $row->no_pendaftaran) . '" class="btn btn-danger btn-sm fa fa-trash"></a>';
                    return $btn;
                })
                ->addColumn('total', function ($row) {
                    $total = $row->nilai_ind + $row->nilai_ipa + $row->nilai_mtk;
                    return $total;
                })
                ->rawColumns(['action', 'total'])
                ->make(true);
        }
        return view('registration.index');
    }

    // Create
    public function create()
    {
        $registration = new Registration();
        $agamaList = Registration::listAgama(); 
        return view('registration.create', compact('registration', 'agamaList'));
    }

    // Store
    public function store(Request $request)
    {
        request()->validate(Registration::$rules);
        DB::beginTransaction();
        $total = Registration::select('*')->count();
        $num = sprintf("%'.04d\n", $total + 1);
        $tahun = date('Y');
        $no = $tahun . $num;
        try {
            DB::table('siswa')->insert([
                'no_pendaftaran' => $no,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'asal_sekolah' => $request->asal_sekolah,
                'agama_id' => $request->agama_id,
                'nilai_ind' => $request->nilai_ind,
                'nilai_ipa' => $request->nilai_ipa,
                'nilai_mtk' => $request->nilai_mtk,
            ]);
            DB::commit();
            return redirect()->route('registration.show', $no)
                ->with('success', 'Pendaftaran telah berhasil disimpan.');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->route('registration.index')
                ->with('success', 'Pendaftaran dibatalkan semua, ada kesalahan...');
        }
    }

    // Edit
    public function edit($id)
    {
        $registration = Registration::find($id);
        $agamaList = Registration::listAgama(); // Fetch the list of agama.
        return view('registration.edit', compact('registration', 'agamaList'));
    }

    // Update
    public function update(Request $request, $id)
    {
        request()->validate(Registration::$rules);
        DB::beginTransaction();
        try {
            DB::table('siswa')->where('no_pendaftaran', $id)->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'asal_sekolah' => $request->asal_sekolah,
                'agama_id' => $request->agama_id,
                'nilai_ind' => $request->nilai_ind,
                'nilai_ipa' => $request->nilai_ipa,
                'nilai_mtk' => $request->nilai_mtk,
            ]);
            DB::commit();
            return redirect()->route('registration.show', $id)
                ->with('success', 'Pendaftaran berhasil diubah');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->route('registration.index')
                ->with('success', 'Pendaftaran batal diubah, ada kesalahan');
        }
    }

    // Show
    public function show($id)
    {
        $registration = Registration::find($id);
        return view('registration.show', compact('registration'));
    }

    // Destroy
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $registration = Registration::find($id)->delete();
            DB::commit();
            return redirect()->route('registration.index')
                ->with('success', 'Pendaftaran berhasil dihapus');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->route('registration.index')
                ->with('success', 'Pendaftaran ada kesalahan hapus batal... ');
        }
    }
}
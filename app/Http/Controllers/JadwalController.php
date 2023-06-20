<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\jadwal;

class JadwalController extends Controller
{
    // Admin
    public function index()
    {
        $jadwal = jadwal::all();
        return view('viewadmin.jadwal',compact('jadwal'));
    }
    // Edit Dosen
    public function updatedosen(Request $request, $id){
        $update = jadwal::find($id);
        $update->dosen = $request->dosen;
        $update->save();

        return redirect('/jadwalBimbinganAdmin');
    }

    public function delete($id)
    {
        jadwal::destroy($id);
        return redirect('/jadwal');
    }

    public function create(Request $request){
        jadwal::create([
            'dosen' => $request->dosen,
            'nidn' => $request->nidn,
            'mahasiswa'=> $request->mahasiswa,
            'nim'=> $request->nim,
            'telegram'=> $request->telegram,
            'tglmulai'=> $request->tglmulai,
            'tglselesai'=> $request->tglselesai
        ]);
        return redirect('/jadwal');
    }

    public function updatejadwal(Request $request, $id){
        $update = jadwal::find($id);
        $update->dosen= $request->dosen;
        $update->nidn = $request->nidn;
        $update->mahasiswa = $request->mahasiswa;
        $update->nim = $request->nim;
        $update->telegram = $request->telegram;
        $update->tglmulai = $request->tglmulai;
        $update->tglselesai = $request->tglselesai;
        $update->save();

        return redirect('/jadwalku');
    }

    // Dosen
    public function indexdosen()
    {
        $dosen = Auth::user()->name;
        $jadwal = jadwal::where('dosen',$dosen)->get();
        return view('viewdosen.jadwal',compact('jadwal'));
    }

    // Telegram Dosen
    public function updatetelegram(Request $request, $id){
        $update = jadwal::find($id);
        $update->telegram = $request->telegram;
        $update->save();

        return redirect('/jadwalku');
    }

    // Mahasiswa
    public function jadwalmahasiswa()
    {
        $mahasiswa = Auth::user()->name;
        $jadwal = jadwal::where('mahasiswa',$mahasiswa)->get();
        return view('viewsiswa.jadwal',compact('jadwal'));
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Skripsi;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SkripsiController extends Controller
{
    public function index()
    {
        $skripsi = skripsi::all();
        return view('viewadmin.skripsi',compact('skripsi'));
    }


    public function delete($id)
    {
        skripsi::destroy($id);
        return redirect('/skripsi');
    }

    

    public function update(Request $request, $id){

        // Penugasan
        $file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
		$tujuan_upload = 'tugas_siswa';
        $file->move($tujuan_upload,$nama_file);

        $update = Assignment::find($id);
        $update->namadosen= $request->namadosen;
        $update->tahap = $request->tahap;
        $update->judul = $request->judul;
        $update->deskripsi = $request->deskripsi;
        $update->keluhan = $request->keluhan;
        $update->file = $nama_file;
        $update->catatan = $request->catatan;
        $update->status = $request->status;
        $update->date = $request->due;
        // $update->score = $request->score;
        $update->save();

        return redirect('/listass');
    }

    // Dosen

    public function indexdosen()
    {
        $dosen = Auth::user()->name;
        $skripsi = skripsi::where('namadosen',$dosen)->get();
        return view('viewdosen.skripsi',compact('skripsi'));
    }

    public function catatandosen(Request $request, $id){
        $update = skripsi::find($id);
        $update->catatan = $request->catatan;
        $update->status = "Sudah di Periksa";
        $update->save();

        return redirect('/skripsiacc');
    }

    // Skripsi ACC
    public function skripsiacc()
    {
        $status = "Sudah di Periksa";
        $dosen = Auth::user()->name;
        $skripsi = DB::select("SELECT * FROM `skripsi` WHERE namadosen = '$dosen' AND status = '$status' ");
        return view('viewdosen.skripsiacc',compact('skripsi'));
    }

    // Mahasiswa
    public function skripsimahasiswa()
    {
        $status = "Belum di Periksa";
        $mahasiswa = Auth::user()->name;
        $skripsi = DB::select("SELECT * FROM `skripsi` WHERE nama = '$mahasiswa' AND status = '$status' ");
        return view('viewsiswa.skripsi',compact('skripsi'));
    }

    public function skripsikuAcc()
    {
        $status = "Sudah di Periksa";
        $dosen = Auth::user()->name;
        $skripsi = DB::select("SELECT * FROM `skripsi` WHERE nama = '$dosen' AND status = '$status' ");
        return view('viewsiswa.skripsikuAcc',compact('skripsi'));
    }

    public function create( Request $request)
    {
        // Penugasan
        $file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
		$tujuan_upload = 'file_skripsi';
        $file->move($tujuan_upload,$nama_file);

        Skripsi::create([
            'namadosen'=> $request->namadosen,
            'tahap' => $request->tahap,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'keluhan' => $request->keluhan,
            'file'=> $nama_file,
            'nama' => Auth::user()->name
        ]);
        return redirect('/skripsiku');
    }


}

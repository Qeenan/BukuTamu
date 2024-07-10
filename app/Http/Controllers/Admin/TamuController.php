<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TamuController extends Controller
{
    public function index(){
        $data = User::all();

        return view('Admin.Tamu.Index', compact('data'));
    }

    public function formTambah(){
        return view('Admin.Tamu.formTambah');
    }

    public function simpanData(Request $request){
        $nama = $request->nama;
        $telepon = $request->telepon;
        $alamat = $request->alamat;
        $email = $request->email;

        $data = new User();
        $data->nama = $nama;
        $data->tlp = $telepon;
        $data->email = $email;
        $data->alamat = $alamat;
        $data->password = Hash::make('rahasia');

        $data->save();
        
        return redirect('admin/tamu')->with('status', 'Data Berhasil Disimpan');
    }

    public function formEdit($id){
        $data = User::find($id);
        return view('Admin.Tamu.formEdit', compact('data'));
    }

    public function updateTamu(Request $request){
        $id = $request->id;
        $nama = $request->nama;
        $telepon = $request->telepon;
        $alamat = $request->alamat;
        $email = $request->email;

        $data = User::find($id);
        $data->nama = $nama;
        $data->tlp = $telepon;
        $data->email = $email;
        $data->alamat = $alamat;
        $data->update();

        return redirect('admin/tamu')->with('status', 'Data Berhasil Diupdate');
    }

    public function hapusTamu(Request $request){
        $id = $request->id;
        $data = User::find($id);
        $data->delete();
        return redirect('admin/tamu')->with('status', 'Data Berhasil Dihapus');
    }
}

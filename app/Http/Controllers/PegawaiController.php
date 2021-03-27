<?php

namespace App\Http\Controllers;

use App\Models\datapegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai=datapegawai::all();
        $title="Data Pegawai";
        return view('admin.berandapegawai',compact('title','pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="INPUT PEGAWAI";
        return view('admin.inputpegawai',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
        'required'=> 'Kolom :attribute Harus Lengkap',
        'date'=>'Kolom :attribute Harus Tanggal',
        'numeric'=>'Kolom :attribute Harus Angka',
        ];
        $validasi=$request->validate([
            'NIP'=>'required|unique:datapegawais|max:255',
            'Nama'=>'required',
            'jabatan'=>'required',
            'gambar'=>'required|mimes:jpg,bmp,png|max:512'
        ],$message);
        $path = $request->file('gambar')->store('gambars');
        $validasi['user_id']=Auth::id();
        $validasi['gambar']=$path;
        datapegawai::create($validasi);
        return redirect('pegawai')->with('success','Data Berhasil Tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai=datapegawai::find($id);
        $title="Edit Pegawai";
        return view('admin.inputpegawai',compact('title','pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message=[
            'required'=> 'Kolom :attribute Harus Lengkap',
            'date'=>'Kolom :attribute Harus Tanggal',
            'numeric'=>'Kolom :attribute Harus Angka',
            ];
            $validasi=$request->validate([
                'NIP'=>'required|unique:datapegawais|max:255',
                'Nama'=>'required',
                'jabatan'=>'required'
            ],$message);
            if($request->hasFile('gambar')){
            $fileName=time().$request->file('gambar')->getClientOriginalName();
            $path = $request->file('gambar')->storeAs('gambars',$fileName);
                $validasi['gambar']=$path;
                $pegawai=datapegawai::find($id);
                Storage::delete($pegawai->gambar);
            }
            $validasi['user_id']=Auth::id();
            datapegawai::where('id',$id)->update($validasi);
            return redirect('pegawai')->with('success','Data Berhasil Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai=datapegawai::find($id);
        if($pegawai != null){
            Storage::delete($pegawai->gambar);
            $pegawai=datapegawai::find($pegawai->id);
            datapegawai::where('id',$id)->delete();
        }
        return redirect('pegawai')->with('sucess','Data berhasil terhapus');
    }
}

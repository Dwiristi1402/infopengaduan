<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class pengaduancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = pengaduan::all();
        return view('pengaduan.index')->with('pengaduan',$pengaduan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'id' => ['required', 'string'],
            'tgl_pengaduan' => ['required', 'date'],
            'nik' => ['required', 'string'],
            'isi_pengaduan'=>['required','string'],
        ]);

         try{
            $pengaduan = new Pengaduan;
            // $pengaduan->id = $request->id;
            $pengaduan->tgl_pengaduan= $request->tgl_pengaduan;
            $pengaduan->nik = $request->nik;
            $pengaduan->isi_pengaduan= $request->isi_pengaduan;
            $pengaduan->save();
        }
        catch(\Exception $e ){
            return redirect()->back()->withErrors(['Data gagal disimpan']);
    }
        return redirect('pengaduan')->with('status','Data Berhasil ditambahkan');
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
        $pengaduan =  pengaduan::find($id);
        return view('pengaduan.edit')->with('pengaduan',$pengaduan);
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
        $request->validate([
            'id' => ['required', 'string'],
            'tgl_pengaduan' => ['required', 'date'],
            'nik' => ['required', 'string'],
            'isi_pengaduan'=>['required','string'],
            'status' => ['required','string'],
        ]);

        try{
            $pengaduan = Pengaduan::find($id);
            $pengaduan->id = $request->id;
            $pengaduan->tgl_pengaduan= $request->tgl_pengaduan;
            $pengaduan->nik = $request->nik;
            $pengaduan->isi_pengaduan= $request->isi_pengaduan;
            $pengaduan->status= $request->status;
            $pengaduan->save();
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['User gagal diperbarui']);
        }
        return redirect('pengaduan')->with('status', 'User Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id)
    {
        try{
            $pengaduan = Pengaduan::findOrFail($id);
            $pengaduan->delete();
        }
        catch(\Exception $e ){
            return redirect()->back()->withErrors(['Data gagal dihapus']);
        }
        return redirect()->back()->with('status','Data Berhasil dihapus');
    }
}

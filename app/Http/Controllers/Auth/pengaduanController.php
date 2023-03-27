<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengaduan;
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
            'tgl_pengaduan' => ['required'],
            'isi_laporan' => ['required', 'string'],
            'foto.*' =>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'

       ]);
       try{
        if($request->hasFile('foto'))
        {
            $pengaduan = new pengaduan;
            $pengaduan->tgl_pengaduan = $request->input('tgl_pengaduan');
            $pengaduan->isi_laporan= $request->input('isi_laporan');
            $pengaduan->save();

            foreach($request->file('foto') as $filegambar){
                $fileasli = $filegambar->getClientOriginalName();
                $uploadgambar =$filegambar->move(public_path().'/gambar_tipe/',$fileasli);
                $gbr= new FotoTipe;
                $gbr->tipe_id = $tipe->id;
                $gbr->foto = $fileasli;
                $gbr->save();
            }
        }
    }
        catch(\Exception $e){
            return back()->with('errors','tipe kamar gagal disimpan');
        }
        return redirect('tipe')->with('success','You have successfully upload image.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
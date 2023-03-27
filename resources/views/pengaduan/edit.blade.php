@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            <form method="POST" action="{{ route('pengaduan.update', $pengaduan->id) }}">
                @csrf
                @method('PUT')
                <h3> Form Pengaduan RT 02</h3>
                <div class="form-floating mb-3">
                    <input type="text" name="id" class="form-control" id="id" placeholder="id pengaduan" value="{{$pengaduan->id }}">
                    <label for="id">id pengaduan</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" name="tgl_pengaduan" class="form-control" id="tgl_pengaduan" placeholder="tanggal" value="{{$pengaduan->tgl_pengaduan }}">
                    <label for="tgl_pengaduan">tanggal</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="nik" class="form-control" id="nik" placeholder="nik" value="{{$pengaduan->nik}}">
                    <label for="nik">nik</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="textarea"name="isi_pengaduan" class="form-control" id="isi_pengaduan" placeholder="isi pengaduan" value="{{$pengaduan->isi_pengaduan}}">
                    <label for="isi_pengaduan">isi pengaduan</label>
                  </div>
                  <div class="form-floating mb-3">
                       <select id="status" class="form-control @error('level') is-invalid @enderror" name="status" required >
                           <option value=""> Pilih status</option>
                           <option value="0">pending</option>
                           <option value="proses"> proses</option>
                           <option value="selesai"> selesai</option>
                       </select>                 
                           @error('level')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                            @enderror
                   </div>
                   
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>  
</div>
@endsection

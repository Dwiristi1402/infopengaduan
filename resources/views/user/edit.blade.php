@extends ('layouts.app')
@section('title','Halaman Tambah User')
@section('content_header')
    <h1>edit user</h1>

@section('link')
<li class="breadcrumb-item"><a href="{{route('user.index')}}">User</a></li>
<li class="breadcrumb-item active">Tambah</li>

@section('content')
<div class="card">
   <div class="card-body">
       <form method="POST" action="{{ route('user.update',$user->id) }}" >
           @csrf   
           @method('PUT') 
           <div class="row mb-3">
               <label for="username" class="col-md-4 col-form-label text-mdend">{{ __('username') }}</label>
                   <div class="col-md-6">
                        <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username">
                           @error('username')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                    </div>
                </div>
            <div class="row mb-3">
               <label for="name" class="col-md-4 col-form-label text-mdend">{{ __('name') }}</label>
                   <div class="col-md-6">
                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name">
                           @error('name')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                    </div>
                </div>
            <div class="row mb-3">
               <label for="email" class="col-md-4 col-form-label text-mdend">{{ __('Email Address') }}</label>
                   <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                           @error('email')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                    </div>
                </div>


                <div class="row mb-3">
               <label for="telpon" class="col-md-4 col-form-label text-mdend">{{ __('telpon') }}</label>
                   <div class="col-md-6">
                        <input id="telpon" type="text" class="form-control @error('telpon') is-invalid @enderror" name="telpon" value="{{ old('telpon') }}" required autocomplete="telpon">
                           @error('telpon')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                    </div>
                </div>
                
            <div class="row mb-3">
               <label for="password" class="col-md-4 col-form-label text-mdend">{{ __('Password') }}</label>
                   <div class="col-md-6">
                       <input id="password" type="password" class="formcontrol @error('password') is-invalid @enderror" name="password" required>
                           @error('password')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                   </div>
                </div>
            <div class="row mb-3">
               <label for="level" class="col-md-4 col-form-label text-mdend">{{ __('Level') }}</label>
                   <div class="col-md-6">
                       <select id="level" class="form-control @error('level') is-invalid @enderror" name="level" required >
                           <option value=""> Pilih Level User</option>
                           <option value="admin"> Admin </option>
                           <option value="petugas"> petugas </option>
                           <option value="masyarakat"> Masyarakat </option>
                       </select>
                           @error('level')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                   </div>
                </div>
                <div class="row mb-0">
               <div class="col-md-6 offset-md-4">
                   <button type="submit" class="btn btn-primary">
                      Simpan
                   </button>
           </div>
       </div>
   </form>
   </div>
</div>
@endsection
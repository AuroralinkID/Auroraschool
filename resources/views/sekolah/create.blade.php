@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a contact</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif -->
       <form method="post" action="{{ route('sekolah.store') }}">
          @csrf
          <div class="form-group">    
              <label>Nama Sekolah:</label>
              <input type="text" class="form-control" name="nama_sekolah" placeholder="Nama Sekolah"/>
          </div>

          <div class="form-group">
              <label>Alamat Sekolah:</label>
              <input type="text" class="form-control" name="alamat_sekolah"/>
          </div>

          <div class="form-group">
              <label>NIS:</label>
              <input type="text" class="form-control" name="nis"/>
          </div>
          <div class="form-group">
              <label>Telepon:</label>
              <input type="text" class="form-control" name="telepon"/>
          </div>
          <div class="form-group">
              <label>Email:</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label>Kota:</label>
              <input type="text" class="form-control" name="kota"/>
          </div>                         
          <button type="submit" class="btn btn-primary">Tambahkan</button>
      </form>
      <!-- <form method="post" action="{{ route('sekolah.store') }}">
 
                        {{ csrf_field() }}
 
                        <div class="form-group">
                            <label>Nama Sekolah</label>
                            <input type="text" name="nama_sekolah" class="form-control" placeholder="Nama sekolah">
 
                            @if($errors->has('nama'))
                                <div class="text-danger">
                                    {{ $errors->first('nama')}}
                                </div>
                            @endif
 
                        </div>
 
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat_sekolah" class="form-control" placeholder="Alamat sekolah">
 
                             @if($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat')}}
                                </div>
                            @endif
 
                        </div>
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" name="nis" class="form-control" placeholder="Alamat sekolah">
 
                             @if($errors->has('nis'))
                                <div class="text-danger">
                                    {{ $errors->first('nis')}}
                                </div>
                            @endif
 
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="telepon" name="telepon" class="form-control" placeholder="Alamat sekolah">
 
                             @if($errors->has('telepon'))
                                <div class="text-danger">
                                    {{ $errors->first('telepon')}}
                                </div>
                            @endif
 
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="email" name="email" class="form-control" placeholder="Alamat sekolah">
 
                             @if($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email')}}
                                </div>
                            @endif
 
                        </div>
                        <div class="form-group">
                            <label>Kota</label>
                            <input type="text" name="kota" class="form-control" placeholder="Alamat sekolah">
 
                             @if($errors->has('kota'))
                                <div class="text-danger">
                                    {{ $errors->first('kota')}}
                                </div>
                            @endif
 
                        </div>
 
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>
 
                    </form> -->
  </div>
</div>
</div>
@endsection
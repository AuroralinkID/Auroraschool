@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Data Sekolahan</h1>
@stop
@section('content')
<div class="row">

<div class="col-sm-12">

<div class="panel panel-default">
  <div class="panel-heading">
    <div class="panel-body">
    <button style="margin: 19px;" type="button" class="btn-sm btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="fa fa-plus"></span> Tambah Data Sekolah</button>
            <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#importExcel"><span class="fa fa-file"></span> Import</button>
            <button type="button" class="btn-sm btn-warning" data-toggle="modal" data-target="#exportExcel"><span class="fa fa-file"></span> Export</button>
            <form action="{{ url()->current() }}">
                <div class="col-md-11">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari Sekolah...">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary">
                        Cari
                    </button>
                </div>
            </form>
    </div>
  </div>
</div>

<!-- Import Excel -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
        <form method="post" action="{{ route('import') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}

                    <label>Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="file" required="required">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--End Import Excel -->

<!-- Export Excel -->
<div class="modal fade" id="exportExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
        <form method="get" action="{{ route('export') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Export Excel</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}

                    <label>Pilih Tipe Dokumen</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1"> <span style="color:green" class="fa fa-file"></span>
                          Xsl
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1"><span style="color:green" class="fa fa-file"></span>
                          Csv
                        </label>
                      </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Export</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--End Export Excel -->

<!-- Large modal  Add-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('sekolah.store') }}" style="margin: 19px;">
          @csrf
          <div class="form-group">
              <label for="first_name">Nama Sekolah:</label>
              <input type="text" class="form-control" name="nama_sekolah"/>
          </div>

          <div class="form-group">
              <label for="last_name">Alamat Sekolah:</label>
              <input type="text" class="form-control" name="alamat_sekolah"/>
          </div>

          <div class="form-group">
              <label for="email">NIS:</label>
              <input type="text" class="form-control" name="nis"/>
          </div>
          <div class="form-group">
              <label for="city">Telepon:</label>
              <input type="text" class="form-control" name="telepon"/>
          </div>
          <div class="form-group">
              <label for="country">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="job_title">Kota:</label>
              <input type="text" class="form-control" name="kota"/>
          </div>
          <button type="submit" class="btn btn-primary"></span>Tambahkan</button>
      </form>
  </div>
    </div>
  </div>
</div>
<!-- modal add -->
    <div class="col-sm-12">

  @if(session()->get('sweet_alert.alert'))
    <script>
    {{ session()->get('sweet_alert.alert') }}
      </script>
  @endif
@yield('export')
</div>
  <table class="table table-striped">
    <thead>
        <tr>
        <th width="50px"><input type="checkbox" id="master"></th>
        <th>No <span class="fa fa-filter"></span></th>
        <th>Nama <span class="fa fa-filter"></span></th>
        <th>Alamat <span class="fa fa-filter"></span></th>
        <th>NIS <span class="fa fa-filter"></span></th>
        <th>telepon <span class="fa fa-filter"></span></th>
        <th>Email <span class="fa fa-filter"></span></th>
        <th>Kota <span class="fa fa-filter"></span></th>
        <th width="150px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if($sekolahs->count())
        @foreach($sekolahs as $key => $skul)
        <tr>
            <td><input type="checkbox" class="sub_chk" data-id="{{$skul->id}}"></td>
            <td>{{$key+1}}</td>
            <td>{{$skul->nama_sekolah}} </td>
            <td>{{$skul->alamat_sekolah}}</td>
            <td>{{$skul->nis}}</td>
            <td>{{$skul->telepon}}</td>
            <td>{{$skul->email}}</td>
            <td>{{$skul->kota}}</td>
            <td width="150px">

            <a href="#" data-toggle="modal" data-target="#myDetailModal{{$skul->id}}" class="btn-sm btn-warning"><span class="fa fa-info-circle"></span></a>
            <a href="#" data-toggle="modal" data-target="#myEditModal{{$skul->id}}" class="btn-sm btn-primary"><span class="fa fa-edit"></span></a>
            <a href="#" data-toggle="modal" data-target="#myHapusModal{{$skul->id}}" class="btn-sm btn-primary"><span class="fa fa-trash"></span></a>

                <!-- Large modal  Hapus-->
                    <div  id="myHapusModal{{$skul->id}}" class="modal modal-danger fade" role="document">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Data </h4>
                                </div>
                                <div class="modal-body">
                                        <div class="text-center">
                                            Apa anda yakin !!!
                                        </div>
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div><br />
                                        @endif
                                    <form method="POST" action="{{ route('sekolah.destroy',$skul->id) }}" style="margin: 19px;">
                                            @csrf
                                            @method('DELETE')
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-primary"><span class="fa fa-close"></span> Tidak</button>
                                        <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span> Ya, Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- modal Hapus -->
                <!-- Ini awalan modal detail -->
                    <div  id="myDetailModal{{$skul->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Detail data sekolahan</h4>
                                </div>
                                <div class="modal-body">
                                <div class="text-center">
                                <center><img src="https://asset.kompas.com/crop/39x0:712x449/490x326/data/photo/2018/05/09/1489896978.jpg"></center><br><br>
                                </div>
                                <div class="row">
                                        <div class="col-lg-12">
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                <br />
                                                @endif
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><b>Nama</b></td>
                                                        <td>{{$skul->nama_sekolah}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Alamat</b></td>
                                                        <td>{{ $skul->alamat_sekolah }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>NIS</b></td>
                                                        <td>{{ $skul->nis }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Email</b></td>
                                                        <td>{{ $skul->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Telepon</b></td>
                                                        <td>{{ $skul->telepon }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Kota</b></td>
                                                        <td>{{ $skul->kota }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</button>
                                </div>
                                </div>
                            </div>
                        </div>
                <!-- Ini akhiran modal detail -->

                <!-- Ini awalan modal edit -->
                        <div  id="myEditModal{{$skul->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Edit data sekolahan</h4>
                                                    </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                        @if ($errors->any())
                                                                        <div class="alert alert-danger">
                                                                            <ul>
                                                                                @foreach ($errors->all() as $error)
                                                                                <li>{{ $error }}</li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                        @endif
                                                                        <form method="post" action="{{ route('sekolah.update', $skul->id) }}">
                                                                                @method('PATCH')
                                                                                @csrf
                                                                                <div class="form-group">

                                                                                        <label for="first_name">Nama Sekolah:</label>
                                                                                        <input type="text" class="form-control" name="nama_sekolah" value={{ $skul->nama_sekolah }} />
                                                                                </div>

                                                                                <div class="form-group">
                                                                                        <label for="last_name">Alamat Sekolah:</label>
                                                                                        <input type="text" class="form-control" name="alamat_sekolah" value={{ $skul->alamat_sekolah }} />
                                                                                </div>

                                                                                <div class="form-group">
                                                                                        <label for="email">NIS:</label>
                                                                                        <input type="text" class="form-control" name="nis" value={{ $skul->nis }} />
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label for="city">Telepon:</label>
                                                                                        <input type="text" class="form-control" name="telepon" value={{ $skul->telepon }} />
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label for="country">Email:</label>
                                                                                        <input type="text" class="form-control" name="email" value={{ $skul->email }} />
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label for="job_title">Kota:</label>
                                                                                        <input type="text" class="form-control" name="kota" value={{ $skul->kota }} />
                                                                                </div>
                                                                        </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                <!-- Ini akhiran modal edit -->
            </td>
            </tr>
        @endforeach
        @endif
    </tbody>
  </table>
  <ul class="pagination justify-content-center">
  {{ $sekolahs->links() }}
  </ul>
<div>
</div>
@stop

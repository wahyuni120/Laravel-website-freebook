@extends('index')
@section('title', 'User')

@section('isihalaman')
    <h3><center>Daftar User FREEBOOK</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUserTambah"> 
        Tambah Data User 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID User</td>
                <td align="center">Nama User</td>
                <td align="center">Alamat</td>
                <td align="center">HP</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($user as $index=>$a)
                <tr>
                    <td align="center" scope="row">{{ $index + $user->firstItem() }}</td>
                    <td>{{$a->id_user}}</td>
                    <td>{{$a->nama}}</td>
                    <td>{{$a->alamat}}</td>
                    <td>{{$a->hp}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUserEdit{{$a->id_user}}"> 
                            Edit
                        </button>
                        <div class="modal fade" id="modalUserEdit{{$a->id_user}}" tabindex="-1" role="dialog" aria-labelledby="modalUserEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalUserEditLabel">Form Edit Data User</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formuseredit" id="formuseredit" action="/user/edit/{{ $a->id_user}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                       
                                            <div class="form-group row">
                                                <label for="nama" class="col-sm-4 col-form-label">Nama User</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $a->nama}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $a->alamat}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="hp" class="col-sm-4 col-form-label">Hp</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $a->hp}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="usertambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        |
                        <a href="user/hapus/{{$a->id_user}}" onclick="return confirm('Yakin ingin Menghapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    Halaman : {{ $user->currentPage() }} <br />
    Jumlah Data : {{ $user->total() }} <br />
    Data Per Halaman : {{ $user->perPage() }} <br />

    {{ $user->links() }}

    <div class="modal fade" id="modalUserTambah" tabindex="-1" role="dialog" aria-labelledby="modalUserTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUserTambahLabel">Form Input Data User</h5>
                </div>
                <div class="modal-body">
                    <form name="formusertambah" id="formusertambah" action="/user/tambah " method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama User</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama User">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan alamat">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="hp" class="col-sm-4 col-form-label">HP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukan HP">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="usertambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
@endsection
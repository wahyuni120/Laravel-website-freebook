@extends('index')
@section('title', 'Admin')

@section('isihalaman')
    <h3><center>Daftar Admin FREEBOOK</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaladminTambah"> 
        Tambah Data Admin 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Admin</td>
                <td align="center">Nama Admin</td>
                <td align="center">HP</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($admin as $index=>$p)
                <tr>
                    <td align="center" scope="row">{{ $index + $admin->firstItem() }}</td>
                    <td>{{$p->id_admin}}</td>
                    <td>{{$p->nama_admin}}</td>
                    <td>{{$p->hp}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modaladminEdit{{$p->id_admin}}"> 
                            Edit
                        </button>

                        <div class="modal fade" id="modaladminEdit{{$p->id_admin}}" tabindex="-1" role="dialog" aria-labelledby="modaladminEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modaladminEditLabel">Form Edit Data Admin</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formadmintaedit" id="formadminedit" action="/admin/edit/{{ $p->id_admin}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_admin" class="col-sm-4 col-form-label">Nama admin</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_admin" name="nama_admin" placeholder="Masukkan Nama admin">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="hp" class="col-sm-4 col-form-label">Hp</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $p->hp}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="admintambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        |
                        <a href="admin/hapus/{{$p->id_admin}}" onclick="return confirm('Yakin Ingin menghapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    Halaman : {{ $admin->currentPage() }} <br />
    Jumlah Data : {{ $admin->total() }} <br />
    Data Per Halaman : {{ $admin->perPage() }} <br />

    {{ $admin->links() }}

    <div class="modal fade" id="modaladminTambah" tabindex="-1" role="dialog" aria-labelledby="modaladminTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaladminTambahLabel">Form Input Data Admin</h5>
                </div>
                <div class="modal-body">
                    <form name="formadmintambah" id="formadmintambah" action="/admin/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_admin" class="col-sm-4 col-form-label">Nama Admin</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_admin" name="nama_admin" placeholder="Masukan Nama admin">
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
                            <button type="submit" name="admintambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
@endsection
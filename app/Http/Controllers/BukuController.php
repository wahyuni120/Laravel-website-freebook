<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BukuModel;
class BukuController extends Controller
{
    public function bukutampil()
    {
        $databuku = BukuModel::orderby('kode_buku', 'ASC')
        ->paginate(5);

        return view('halaman/view_buku',['buku'=>$databuku]);
    }
    public function bukutambah(Request $request)
    {
        $this->validate($request, [
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required'
        ]);

        BukuModel::create([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit
        ]);

        return redirect('/buku');
    }
     public function bukuhapus($id_buku)
     {
         $databuku=BukuModel::find($id_buku);
         $databuku->delete();
 
         return redirect()->back();
     }
    public function bukuedit($id_buku, Request $request)
    {
        $this->validate($request, [
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required'
        ]);

        $id_buku = BukuModel::find($id_buku);
        $id_buku->kode_buku   = $request->kode_buku;
        $id_buku->judul      = $request->judul;
        $id_buku->pengarang  = $request->pengarang;
        $id_buku->penerbit   = $request->penerbit;
        $id_buku->save();

        return redirect()->back();
    }
} 
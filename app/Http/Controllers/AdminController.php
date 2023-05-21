<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AdminModel;

class AdminController extends Controller
{
    public function admintampil()
    {
        $dataadmin = AdminModel::orderby('id_admin', 'ASC')
        ->paginate(5);

        return view('halaman/view_admin',['admin'=>$dataadmin]);
    }

    public function admintambah(Request $request)
    {
        $this->validate($request, [
            'nama_admin' => 'required',
            'hp' => 'required'
        ]);

        AdminModel::create([
            'nama_admin' => $request->nama_admin,
            'hp' => $request->hp
        ]);

        return redirect('/admin');
    }

     public function adminhapus($id_admin)
     {
         $dataadmin=AdminModel::find($id_admin);
         $dataadmin->delete();
 
         return redirect()->back();
     }
    public function adminedit($id_admin, Request $request)
    {
        $this->validate($request, [
            'nama_admin' => 'required',
            'hp' => 'required'
        ]);

        $id_admin = AdminModel::find($id_admin);
        $id_admin->nama_admin      = $request->nama_admin;
        $id_admin->hp   = $request->hp;
        $id_admin->save();

        return redirect()->back();
    }
}
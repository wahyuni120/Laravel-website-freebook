<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserModel;
class UserController extends Controller
{
        public function usertampil()
        {
            $datauser = UserModel::orderby('id_user', 'ASC')
            ->paginate(5);
    
            return view('halaman/view_user',['user'=>$datauser]);
        }
            public function usertambah(Request $request)
        {
            $this->validate($request, [
                'nama' => 'required',
                'alamat' => 'required',
                'hp' => 'required'
            ]);
    
            UserModel::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'hp' => $request->hp
            ]);
    
            return redirect('/user');
        }
             public function userhapus($id_user)
         {
             $datauser=UserModel::find($id_user);
             $datauser->delete();
     
             return redirect()->back();
         }
    
        public function useredit($id_user, Request $request)
        {
            $this->validate($request, [
                'nama' => 'required',
                'alamat' => 'required',
                'hp' => 'required'
            ]);
    
            $id_user = UserModel::find($id_user);
            $id_user->nama     = $request->nama;
            $id_user->alamat  = $request->alamat;
            $id_user->hp   = $request->hp;
    
            $id_user->save();
    
            return redirect()->back();
        }
}

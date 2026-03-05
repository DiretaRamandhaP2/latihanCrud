<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // Untuk Menampilkan data
    public function index()
    {
        $data = User::all();
        return view('welcome', compact('data'));
    }

    // Untuk Menampilkan Form Create
    public function create()
    {
        return view('create');
    }

    // Untuk Menyimpan data baru
    public function created(Request $request)
    {

        // return json_encode($request->all());
        // cara Pertama
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // cara Kedua
        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // $user->save();

        return redirect('/');
    }

    // Untuk Menampilkan Form Edit
    public function edit($id)
    {
        $data = User::find($id);
        return view('edit', compact('data'));
    }

    // Untuk Menyimpan data yang sudah di edit
    public function edited(Request $request)
    {

        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        } else {
            $user->password = $request->password_lama;
        }

        $user->save();
        return redirect('/');
    }

    // Untuk Menghapus data
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/');
    }
}

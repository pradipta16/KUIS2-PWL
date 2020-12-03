<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use PDF;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class ManageUserController extends Controller
{
    public function __construct(){
        // $this->middleware('auth');
        $this->middleware(function($request, $next){
            if(Gate::allows('manage')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
            });
    }

    public function manageUser(){
        $user = User::all();
        return view('manageUser', ['user' => $user]);
    }

    public function add(){
        return view('addUser');
    }

    public function create(Request $request){
        if($request->file('image')){
            $image = $request->file('image')->store('images','public');
            }
           
        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => \Hash::make ($request->password),
        'roles' => $request->roles,
        'image' => $image,
    ]);
        return redirect('/manageUser'); 
    }

    public function edit($id){
        $user = User::find($id);
        return view('editUser',['user'=>$user]);
    }
    public function update($id, Request $request){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->roles = $request->roles;
        if($user->image && 
        file_exists(storage_path('app/public/' . $user->image)))
         {
         \Storage::delete('public/'.$user->image);
         }
         $image_name = $request->file('image')->store('images', 'public');
         $user->image = $image_name;
        $user->save();
        return redirect('/manageUser');
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/manageUser');
    }
    public function cetak_pdf(){
        $user = User::all();
        $pdf = PDF::loadview('user_pdf',['user'=>$user]);
        return $pdf->stream();
       }
       
}


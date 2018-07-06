<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        return view('profile', array('user' => Auth::user()));
    }

    public function update_profile(Request $request){
        try{
            $user = Auth::user();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            if($request->has('avatar') && $request->hasFile('avatar')){
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300, 300)->save(public_path('uploads/avatars/' . $filename));

                $user->avatar = $filename;
            }
            $user->save();
            return view('profile', array('user' => Auth::user(), 'statusAtualizacao' => true));
        }catch (\Exception $e){
            return view('profile', array('user' => Auth::user(), 'statusAtualizacao' => false));
        }
    }

    public function getProfile($id){
        //TODO: Capturar id e retornar perfil do usuário
    }

}

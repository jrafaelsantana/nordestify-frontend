<?php

namespace App\Http\Controllers;

use App\Music;
use App\Review;
use App\User;
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
        $usuario = User::find(Auth::id());
        $userReviews = $usuario->reviews;

        $reviews = [];
        foreach ($userReviews as $userReview){
            $musica = Music::find($userReview->music_id);
            $artista = $musica->artist;
            $musica->review = $userReview->review;
            $musica->dataReview = $userReview->updated_at;
            array_push($reviews, $musica);
        }

        return view('profile', array('user' => Auth::user(), 'reviews' => $reviews));
    }

    public function musics(){
        return view('musics', array('user' => Auth::user()));
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

    public function getResultados(){
        return view('results', array('user' => Auth::user()));
    }

}

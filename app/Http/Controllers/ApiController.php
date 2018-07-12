<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Music;
use App\Review;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function index(){
        return response()->json([
            'status' => 'funcionando'
        ]);
    }

    public function getUserInfo($id = null){
        $usuario = User::find($id);

        if($usuario != null){
            $reviews = $usuario->reviews;
            return response()->json($usuario->jsonSerialize());
        }else{
            return response()->json(['status' => 'not found']);
        }
    }

    public function getArtistsList(){
        $artistas = Artist::all();
        return response()->json($artistas->jsonSerialize());
    }

    public function getArtistInfo($id = null){
        $artista = Artist::find($id);

        if($artista != null){
            $musicas = $artista->musics;
            return response()->json($artista->jsonSerialize());
        }else{
            return response()->json(['status' => 'not found']);
        }
    }

    public function getMusicsList(){
        $musicas = Music::all();
        return response()->json($musicas->jsonSerialize());
    }

    public function getMusicInfo($id = null){
        $musica = Music::find($id);

        if($musica !=null){
            $artista = $musica->artist;
            $genero = $musica->genre;
            return response()->json($musica->jsonSerialize());
        }else{
            return response()->json(['status' => 'not found']);
        }
    }

    public function search($termo = null){
        $termoItens = str_replace('-',' ',$termo);
        $ids = Music::search($termoItens)->limit(5)->get();
        $userinfo = User::find(Auth::id());
        $reviews = $userinfo->reviews;

        $resultado = [];
        foreach ($ids as $id){
            $musica = Music::find($id->id);
            $artista = $musica->artist;
            $genero = $musica->genre;

            foreach($reviews as $review){
                if($review['music_id'] == $id->id){
                    $musica->review = $review['review'];
                }
            }

            array_push($resultado, $musica);
        }

        if(count($ids) > 0 || count($resultado) > 0){
            return response()->json($resultado);
        }else{
            return response()->json([]);
        }
    }

    public function setReview($avaliacao, $musica){
        $review = new Review;
        try{
            $user = Auth::id();
            $review->user_id = $user;
            $review->music_id = $musica;

            if($avaliacao == "like"){
                $review->review = 1;
            }else{
                $review->review = -1;
            }

            if($review->user_id != null && $review->music_id != null && $review->review != null){
                $review->save();
                return response()->json(['status' => 'avaliado com sucesso']);
            }else {
                return response()->json([]);
            }
        }catch (\Exception $e){
            return response()->json([$e]);
        }
    }

    public function getAllMusics(){
        $musicas = Music::with(['artist', 'genre'])->get();

        $userinfo = User::find(Auth::id());
        $reviews = $userinfo->reviews;

        foreach ($reviews as $review){
            foreach ($musicas as $musica){
                if($review->music_id == $musica->id){
                    $musica->review = $review->review;
                }
            }
        }

        if(count($musicas) > 0 ){
            return response()->json($musicas);
        }else{
            return response()->json([]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Music;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(){
        return response()->json([
            'status' => 'funcionando'
        ]);
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
        $resultado = [];

        foreach ($ids as $id){
            $musica = Music::find($id->id);
            $artista = $musica->artist;
            $genero = $musica->genre;

            array_push($resultado, $musica);
        }

        if(count($ids) > 0 || count($resultado) > 0){
            return response()->json($resultado);
        }else{
            return response()->json([]);
        }
    }
}

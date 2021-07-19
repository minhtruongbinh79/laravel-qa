<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class FavouritesController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }
    
    public function store(Question $question)
    {
        $question->favourites()->attach(auth()->id());

        return back();
    }

    public function destroy(Question $question)
    {
        $question->favourites()->detach(auth()->id());

        return back();
    }
}

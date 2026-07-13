<?php

namespace App\Http\Controllers;

use App\Models\Matcha;
use App\Models\SiteContent;

class MatchaController extends Controller
{
    public function index()
    {
        return view('matchas.index', [
            'hero' => SiteContent::section('matchas', 'hero'),
            'matchas' => Matcha::latest()->paginate(9),
        ]);
    }

    public function show(Matcha $matcha)
    {
        return view('matchas.show', [
            'matcha' => $matcha,
        ]);
    }
}

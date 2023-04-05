<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function rooms()
    {
        $ruangans = Ruangan::all();
        return view('pages.rooms', compact('ruangans'));
    }

    public function items()
    {
        $barangs = Barang::all();
        return view('pages.items', compact('barangs'));
    }
}

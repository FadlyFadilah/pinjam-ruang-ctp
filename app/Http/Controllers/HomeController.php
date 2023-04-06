<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function rooms()
    {
        $ruangans = Ruangan::with(['media'])->get();
        return view('pages.rooms', compact('ruangans'));
    }

    public function items()
    {
        $barangs = Barang::with(['media'])->get();
        return view('pages.items', compact('barangs'));
    }
}

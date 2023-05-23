<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TanggalLibur;

class TanggalLiburController extends Controller
{
    public function data()
    {
        $holidays = TanggalLibur::pluck('tanggal')->toArray();

        return response()->json($holidays);
    }

}
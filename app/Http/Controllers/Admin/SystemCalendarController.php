<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\PeminjamanStudioDubbing',
            'date_field' => 'booking',
            'field'      => 'nama',
            'prefix'     => 'Studio Dubbing',
            'suffix'     => 'BITC',
            'route'      => 'admin.peminjaman-studio-dubbings.show',
        ],
        [
            'model'      => '\App\Models\PeminjamanRuangKacaBitc',
            'date_field' => 'tanggal_booking',
            'field'      => 'nama',
            'prefix'     => 'Ruang Kaca',
            'suffix'     => 'BITC',
            'route'      => 'admin.peminjaman-ruang-kaca-bitcs.show',
        ],
        [
            'model'      => '\App\Models\PeminjamanCh',
            'date_field' => 'booking',
            'field'      => 'tujuan',
            'prefix'     => 'Conventional Hall',
            'suffix'     => 'CTP',
            'route'      => 'admin.peminjaman-ches.show',
        ],
        [
            'model'      => '\App\Models\Ruangctp',
            'date_field' => 'mulai',
            'field'      => 'nama_acara',
            'prefix'     => 'Gedung CTP',
            'suffix'     => 'CTP',
            'route'      => 'admin.ruangctps.show',
        ],
    ];

    public function index()
    {
        $events = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::where('status', 'Diterima')->get() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}

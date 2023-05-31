<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPeminjamanChRequest;
use App\Http\Requests\StorePeminjamanChRequest;
use App\Http\Requests\UpdatePeminjamanChRequest;
use App\Models\PeminjamanCh;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PeminjamanChController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('peminjaman_ch_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('user.peminjamanChes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('peminjaman_ch_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('user.peminjamanChes.create');
    }

    public function store(StorePeminjamanChRequest $request)
    {
        $attr = $request->all();
        $attr['ruangan_id'] = 1;
        $attr['user_id'] = auth()->id();
        $attr['status'] = 'Sedang Dalam Proses';

        $peminjamanCh = PeminjamanCh::create($attr);

        return redirect()->route('user.peminjaman-ches.sukses')->with('message', 'Segera Hubungi nomor whatsapp ini! ');
    }

    public function edit(PeminjamanCh $peminjamanCh)
    {
        abort_if(Gate::denies('peminjaman_ch_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('user.peminjamanChes.edit', compact('peminjamanCh'));
    }

    public function update(UpdatePeminjamanChRequest $request, PeminjamanCh $peminjamanCh)
    {
        $attr = $request->all();
        $attr['ruangan_id'] = 1;
        $attr['user_id'] = auth()->id();

        $peminjamanCh->update($attr);

        return redirect()->route('user.peminjaman-ches.index');
    }

    public function show(PeminjamanCh $peminjamanCh)
    {
        abort_if(Gate::denies('peminjaman_ch_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peminjamanCh->load('ruangan', 'user');

        return view('user.peminjamanChes.show', compact('peminjamanCh'));
    }

    public function destroy(PeminjamanCh $peminjamanCh)
    {
        abort_if(Gate::denies('peminjaman_ch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peminjamanCh->delete();

        return back();
    }

    public function massDestroy(MassDestroyPeminjamanChRequest $request)
    {
        $peminjamanChes = PeminjamanCh::find(request('ids'));

        foreach ($peminjamanChes as $peminjamanCh) {
            $peminjamanCh->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

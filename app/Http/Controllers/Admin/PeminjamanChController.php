<?php

namespace App\Http\Controllers\Admin;

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

        if (!auth()->user()->is_admin) {
            $peminjamanChes = PeminjamanCh::with(['ruangan', 'user'])->where('user_id', auth()->id())->get();
            return view('admin.peminjamanChes.index', compact('peminjamanChes'));
        }
        $peminjamanChes = PeminjamanCh::with(['ruangan', 'user'])->get();

        return view('admin.peminjamanChes.index', compact('peminjamanChes'));
    }

    public function ubahstatus(Request $request, PeminjamanCh $peminjamanCh)
    {
        $peminjamanCh->status = $request->input('status');

        $peminjamanCh->save();

        return redirect()->route('admin.peminjaman-ches.index');
    }

    public function create()
    {
        abort_if(Gate::denies('peminjaman_ch_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.peminjamanChes.create');
    }

    public function store(StorePeminjamanChRequest $request)
    {
        $attr = $request->all();
        $ruangan = Ruangan::where('nama_ruangan', 'like' , '%hall%')->first();
        $rid = $ruangan->id;
        $attr['ruangan_id'] = $rid;
        $attr['user_id'] = auth()->id();

        $peminjamanCh = PeminjamanCh::create($attr);

        return redirect()->route('admin.peminjaman-ches.index');
    }

    public function edit(PeminjamanCh $peminjamanCh)
    {
        abort_if(Gate::denies('peminjaman_ch_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.peminjamanChes.edit', compact('peminjamanCh'));
    }

    public function update(UpdatePeminjamanChRequest $request, PeminjamanCh $peminjamanCh)
    {
        $attr = $request->all();
        $attr['ruangan_id'] = 1;
        $attr['user_id'] = auth()->id();

        $peminjamanCh->update($attr);

        return redirect()->route('admin.peminjaman-ches.index');
    }

    public function show(PeminjamanCh $peminjamanCh)
    {
        abort_if(Gate::denies('peminjaman_ch_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peminjamanCh->load('ruangan', 'user');

        return view('admin.peminjamanChes.show', compact('peminjamanCh'));
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

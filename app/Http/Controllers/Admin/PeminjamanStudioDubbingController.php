<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPeminjamanStudioDubbingRequest;
use App\Http\Requests\StorePeminjamanStudioDubbingRequest;
use App\Http\Requests\UpdatePeminjamanStudioDubbingRequest;
use App\Models\PeminjamanStudioDubbing;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PeminjamanStudioDubbingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('peminjaman_studio_dubbing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (!auth()->user()->is_admin) {
            $peminjamanStudioDubbings = PeminjamanStudioDubbing::with(['ruangan', 'user'])->where('user_id', auth()->id())->get();
            return view('admin.peminjamanStudioDubbings.index', compact('peminjamanStudioDubbings'));
        }
        $peminjamanStudioDubbings = PeminjamanStudioDubbing::with(['ruangan', 'user'])->get();

        return view('admin.peminjamanStudioDubbings.index', compact('peminjamanStudioDubbings'));
    }

    public function ubahstatus(PeminjamanStudioDubbing $peminjamanStudioDubbing, Request $request)
    {
        $peminjamanStudioDubbing->status = $request->input('status');

        $peminjamanStudioDubbing->save();

        return redirect()->route('admin.peminjaman-studio-dubbings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('peminjaman_studio_dubbing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.peminjamanStudioDubbings.create');
    }

    public function store(StorePeminjamanStudioDubbingRequest $request)
    {
        $attr = $request->all();
        $ruangan = Ruangan::where('nama_ruangan', 'like' , '%studio d%')->first();
        $rid = $ruangan->id;
        $attr['ruangan_id'] = $rid;
        $attr['user_id'] = auth()->id();

        $peminjamanStudioDubbing = PeminjamanStudioDubbing::create($attr);

        return redirect()->route('admin.peminjaman-studio-dubbings.sukses');
    }

    public function edit(PeminjamanStudioDubbing $peminjamanStudioDubbing)
    {
        abort_if(Gate::denies('peminjaman_studio_dubbing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.peminjamanStudioDubbings.edit', compact('peminjamanStudioDubbing'));
    }

    public function update(UpdatePeminjamanStudioDubbingRequest $request, PeminjamanStudioDubbing $peminjamanStudioDubbing)
    {
        $attr = $request->all();
        $attr['ruangan_id'] = 1;
        $attr['user_id'] = auth()->id();

        $peminjamanStudioDubbing->update($attr);

        return redirect()->route('admin.peminjaman-studio-dubbings.index');
    }

    public function show(PeminjamanStudioDubbing $peminjamanStudioDubbing)
    {
        abort_if(Gate::denies('peminjaman_studio_dubbing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peminjamanStudioDubbing->load('ruangan', 'user');

        return view('admin.peminjamanStudioDubbings.show', compact('peminjamanStudioDubbing'));
    }

    public function destroy(PeminjamanStudioDubbing $peminjamanStudioDubbing)
    {
        abort_if(Gate::denies('peminjaman_studio_dubbing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peminjamanStudioDubbing->delete();

        return back();
    }

    public function massDestroy(MassDestroyPeminjamanStudioDubbingRequest $request)
    {
        $peminjamanStudioDubbings = PeminjamanStudioDubbing::find(request('ids'));

        foreach ($peminjamanStudioDubbings as $peminjamanStudioDubbing) {
            $peminjamanStudioDubbing->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
<?php

namespace App\Http\Controllers\User;

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

        return view('user.peminjamanStudioDubbings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('peminjaman_studio_dubbing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('user.peminjamanStudioDubbings.create');
    }

    public function store(StorePeminjamanStudioDubbingRequest $request)
    {
        $attr = $request->all();
        $attr['ruangan_id'] = 1;
        $attr['user_id'] = auth()->id();

        $peminjamanStudioDubbing = PeminjamanStudioDubbing::create($attr);

        return redirect()->route('user.peminjaman-studio-dubbings.sukses')->with('success', 'Permintaan Peminjaman Berhasil');
    }

    public function edit(PeminjamanStudioDubbing $peminjamanStudioDubbing)
    {
        abort_if(Gate::denies('peminjaman_studio_dubbing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('user.peminjamanStudioDubbings.edit', compact('peminjamanStudioDubbing'));
    }

    public function update(UpdatePeminjamanStudioDubbingRequest $request, PeminjamanStudioDubbing $peminjamanStudioDubbing)
    {
        $attr = $request->all();
        $attr['ruangan_id'] = 3;
        $attr['user_id'] = auth()->id();

        $peminjamanStudioDubbing->update($attr);

        return redirect()->route('user.peminjaman-studio-dubbings.index');
    }

    public function show(PeminjamanStudioDubbing $peminjamanStudioDubbing)
    {
        abort_if(Gate::denies('peminjaman_studio_dubbing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peminjamanStudioDubbing->load('ruangan', 'user');

        return view('user.peminjamanStudioDubbings.show', compact('peminjamanStudioDubbing'));
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
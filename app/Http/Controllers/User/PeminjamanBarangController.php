<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPeminjamanBarangRequest;
use App\Http\Requests\StorePeminjamanBarangRequest;
use App\Http\Requests\UpdatePeminjamanBarangRequest;
use App\Models\Barang;
use App\Models\PeminjamanBarang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PeminjamanBarangController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('peminjaman_barang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $barangs = Barang::pluck('nama_barang', 'id')->prepend(trans('global.pleaseSelect'), '');
        
        return view('user.peminjamanBarangs.index', compact('barangs'));
    }

    public function create()
    {
        abort_if(Gate::denies('peminjaman_barang_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $barangs = Barang::pluck('nama_barang', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('user.peminjamanBarangs.create', compact('barangs'));
    }

    public function store(StorePeminjamanBarangRequest $request)
    {
        
        $attr = $request->all();
        $attr['user_id'] = auth()->id();

        $peminjamanBarang = PeminjamanBarang::create($attr);

        return redirect()->route('user.peminjaman-barangs.index')->with('success', 'Permintaan Peminjaman Berhasil');;
    }

    public function edit(PeminjamanBarang $peminjamanBarang)
    {
        abort_if(Gate::denies('peminjaman_barang_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $barangs = Barang::pluck('nama_barang', 'id')->prepend(trans('global.pleaseSelect'), '');

        $peminjamanBarang->load('barang');

        return view('user.peminjamanBarangs.edit', compact('barangs', 'peminjamanBarang'));
    }

    public function update(UpdatePeminjamanBarangRequest $request, PeminjamanBarang $peminjamanBarang)
    {
        
        $attr = $request->all();
        $attr['user_id'] = auth()->id();

        $peminjamanBarang->update($attr);

        return redirect()->route('user.peminjaman-barangs.index');
    }

    public function show(PeminjamanBarang $peminjamanBarang)
    {
        abort_if(Gate::denies('peminjaman_barang_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peminjamanBarang->load('barang', 'user');

        return view('user.peminjamanBarangs.show', compact('peminjamanBarang'));
    }

    public function destroy(PeminjamanBarang $peminjamanBarang)
    {
        abort_if(Gate::denies('peminjaman_barang_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peminjamanBarang->delete();

        return back();
    }

    public function massDestroy(MassDestroyPeminjamanBarangRequest $request)
    {
        $peminjamanBarangs = PeminjamanBarang::find(request('ids'));

        foreach ($peminjamanBarangs as $peminjamanBarang) {
            $peminjamanBarang->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
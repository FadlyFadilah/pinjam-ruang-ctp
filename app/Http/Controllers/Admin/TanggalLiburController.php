<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTanggalLiburRequest;
use App\Http\Requests\StoreTanggalLiburRequest;
use App\Http\Requests\UpdateTanggalLiburRequest;
use App\Models\TanggalLibur;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TanggalLiburController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tanggal_libur_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tanggalLiburs = TanggalLibur::all();

        return view('admin.tanggalLiburs.index', compact('tanggalLiburs'));
    }

    public function data()
    {
        $holidays = TanggalLibur::pluck('tanggal')->toArray();

        return response()->json($holidays);
    }

    public function create()
    {
        abort_if(Gate::denies('tanggal_libur_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tanggalLiburs.create');
    }

    public function store(StoreTanggalLiburRequest $request)
    {
        $tanggalLibur = TanggalLibur::create($request->all());

        return redirect()->route('admin.tanggal-liburs.index');
    }

    public function edit(TanggalLibur $tanggalLibur)
    {
        abort_if(Gate::denies('tanggal_libur_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tanggalLiburs.edit', compact('tanggalLibur'));
    }

    public function update(UpdateTanggalLiburRequest $request, TanggalLibur $tanggalLibur)
    {
        $tanggalLibur->update($request->all());

        return redirect()->route('admin.tanggal-liburs.index');
    }

    public function show(TanggalLibur $tanggalLibur)
    {
        abort_if(Gate::denies('tanggal_libur_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tanggalLiburs.show', compact('tanggalLibur'));
    }

    public function destroy(TanggalLibur $tanggalLibur)
    {
        abort_if(Gate::denies('tanggal_libur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tanggalLibur->delete();

        return back();
    }

    public function massDestroy(MassDestroyTanggalLiburRequest $request)
    {
        $tanggalLiburs = TanggalLibur::find(request('ids'));

        foreach ($tanggalLiburs as $tanggalLibur) {
            $tanggalLibur->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
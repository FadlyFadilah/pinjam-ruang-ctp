<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRuanganRequest;
use App\Http\Requests\StoreRuanganRequest;
use App\Http\Requests\UpdateRuanganRequest;
use App\Models\Ruangan;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RuanganController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('ruangan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ruangans = Ruangan::with(['media'])->get();

        return view('admin.ruangans.index', compact('ruangans'));
    }

    public function create()
    {
        abort_if(Gate::denies('ruangan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ruangans.create');
    }

    public function store(StoreRuanganRequest $request)
    {
        $ruangan = Ruangan::create($request->all());

        if ($request->input('gambar', false)) {
            $ruangan->addMedia(storage_path('tmp/uploads/' . basename($request->input('gambar'))))->toMediaCollection('gambar');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $ruangan->id]);
        }

        return redirect()->route('admin.ruangans.index');
    }

    public function edit(Ruangan $ruangan)
    {
        abort_if(Gate::denies('ruangan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ruangans.edit', compact('ruangan'));
    }

    public function update(UpdateRuanganRequest $request, Ruangan $ruangan)
    {
        $ruangan->update($request->all());

        if ($request->input('gambar', false)) {
            if (! $ruangan->gambar || $request->input('gambar') !== $ruangan->gambar->file_name) {
                if ($ruangan->gambar) {
                    $ruangan->gambar->delete();
                }
                $ruangan->addMedia(storage_path('tmp/uploads/' . basename($request->input('gambar'))))->toMediaCollection('gambar');
            }
        } elseif ($ruangan->gambar) {
            $ruangan->gambar->delete();
        }

        return redirect()->route('admin.ruangans.index');
    }

    public function show(Ruangan $ruangan)
    {
        abort_if(Gate::denies('ruangan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ruangans.show', compact('ruangan'));
    }

    public function destroy(Ruangan $ruangan)
    {
        abort_if(Gate::denies('ruangan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ruangan->delete();

        return back();
    }

    public function massDestroy(MassDestroyRuanganRequest $request)
    {
        $ruangans = Ruangan::find(request('ids'));

        foreach ($ruangans as $ruangan) {
            $ruangan->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('ruangan_create') && Gate::denies('ruangan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Ruangan();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
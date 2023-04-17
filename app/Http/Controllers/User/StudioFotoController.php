<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStudioFotoRequest;
use App\Http\Requests\StoreStudioFotoRequest;
use App\Http\Requests\UpdateStudioFotoRequest;
use App\Models\StudioFoto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class StudioFotoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('studio_foto_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studioFotos = StudioFoto::with(['user', 'media'])->where('user_id', auth()->id())->get();
        return view('user.studioFotos.index', compact('studioFotos'));
    }

    public function create()
    {
        abort_if(Gate::denies('studio_foto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('user.studioFotos.create', compact('users'));
    }

    public function store(StoreStudioFotoRequest $request)
    {
        $request['user_id'] = auth()->id();
        $studioFoto = StudioFoto::create($request->all());

        if ($request->input('ktp', false)) {
            $studioFoto->addMedia(storage_path('tmp/uploads/' . basename($request->input('ktp'))))->toMediaCollection('ktp');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $studioFoto->id]);
        }

        return redirect()->route('user.studio-fotos.index');
    }

    public function edit(StudioFoto $studioFoto)
    {
        abort_if(Gate::denies('studio_foto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studioFoto->load('user');

        return view('user.studioFotos.edit', compact('studioFoto'));
    }

    public function update(UpdateStudioFotoRequest $request, StudioFoto $studioFoto)
    {
        $request['user_id'] = auth()->id();
        $studioFoto->update($request->all());

        if ($request->input('ktp', false)) {
            if (! $studioFoto->ktp || $request->input('ktp') !== $studioFoto->ktp->file_name) {
                if ($studioFoto->ktp) {
                    $studioFoto->ktp->delete();
                }
                $studioFoto->addMedia(storage_path('tmp/uploads/' . basename($request->input('ktp'))))->toMediaCollection('ktp');
            }
        } elseif ($studioFoto->ktp) {
            $studioFoto->ktp->delete();
        }

        return redirect()->route('user.studio-fotos.index');
    }

    public function show(StudioFoto $studioFoto)
    {
        abort_if(Gate::denies('studio_foto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studioFoto->load('user');

        return view('user.studioFotos.show', compact('studioFoto'));
    }

    public function destroy(StudioFoto $studioFoto)
    {
        abort_if(Gate::denies('studio_foto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studioFoto->delete();

        return back();
    }

    public function massDestroy(MassDestroyStudioFotoRequest $request)
    {
        $studioFotos = StudioFoto::find(request('ids'));

        foreach ($studioFotos as $studioFoto) {
            $studioFoto->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('studio_foto_create') && Gate::denies('studio_foto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new StudioFoto();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
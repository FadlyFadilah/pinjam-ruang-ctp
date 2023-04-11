<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPklRequest;
use App\Http\Requests\StorePklRequest;
use App\Http\Requests\UpdatePklRequest;
use App\Models\Pkl;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PklController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('pkl_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (!auth()->user()->is_admin) {
            $pkls = Pkl::with(['user', 'media'])->where('user_id', auth()->id())->get();
            return view('user.pkls.index', compact('pkls'));
        }
        $pkls = Pkl::with(['user', 'media'])->get();

        return view('user.pkls.index', compact('pkls'));
    }

    public function create()
    {
        abort_if(Gate::denies('pkl_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('user.pkls.create');
    }

    public function store(StorePklRequest $request)
    {
        $attr = $request->all();
        $attr['user_id'] = auth()->id();
        $pkl = Pkl::create($attr);

        if ($request->input('kesbang', false)) {
            $pkl->addMedia(storage_path('tmp/uploads/' . basename($request->input('kesbang'))))->toMediaCollection('kesbang');
        }

        if ($request->input('hasil', false)) {
            $pkl->addMedia(storage_path('tmp/uploads/' . basename($request->input('hasil'))))->toMediaCollection('hasil');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $pkl->id]);
        }

        return redirect()->route('user.pkls.index');
    }

    public function edit(Pkl $pkl)
    {
        abort_if(Gate::denies('pkl_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('user.pkls.edit', compact('pkl'));
    }

    public function update(UpdatePklRequest $request, Pkl $pkl)
    {
        $attr = $request->all();
        $attr['user_id'] = auth()->id();
        $pkl->update($attr);

        if ($request->input('kesbang', false)) {
            if (! $pkl->kesbang || $request->input('kesbang') !== $pkl->kesbang->file_name) {
                if ($pkl->kesbang) {
                    $pkl->kesbang->delete();
                }
                $pkl->addMedia(storage_path('tmp/uploads/' . basename($request->input('kesbang'))))->toMediaCollection('kesbang');
            }
        } elseif ($pkl->kesbang) {
            $pkl->kesbang->delete();
        }

        if ($request->input('hasil', false)) {
            if (! $pkl->hasil || $request->input('hasil') !== $pkl->hasil->file_name) {
                if ($pkl->hasil) {
                    $pkl->hasil->delete();
                }
                $pkl->addMedia(storage_path('tmp/uploads/' . basename($request->input('hasil'))))->toMediaCollection('hasil');
            }
        } elseif ($pkl->hasil) {
            $pkl->hasil->delete();
        }

        return redirect()->route('user.pkls.index');
    }

    public function show(Pkl $pkl)
    {
        abort_if(Gate::denies('pkl_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pkl->load('user');

        return view('user.pkls.show', compact('pkl'));
    }

    public function destroy(Pkl $pkl)
    {
        abort_if(Gate::denies('pkl_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pkl->delete();

        return back();
    }

    public function massDestroy(MassDestroyPklRequest $request)
    {
        $pkls = Pkl::find(request('ids'));

        foreach ($pkls as $pkl) {
            $pkl->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('pkl_create') && Gate::denies('pkl_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Pkl();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
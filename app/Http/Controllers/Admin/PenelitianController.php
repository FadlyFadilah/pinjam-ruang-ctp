<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPenelitianRequest;
use App\Http\Requests\StorePenelitianRequest;
use App\Http\Requests\UpdatePenelitianRequest;
use App\Models\Penelitian;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PenelitianController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('penelitian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (!auth()->user()->is_admin) {
            $penelitians = Penelitian::with(['user', 'media'])->where('user_id', auth()->id())->get();
            return view('admin.penelitians.index', compact('penelitians'));
        }
        $penelitians = Penelitian::with(['user', 'media'])->get();

        return view('admin.penelitians.index', compact('penelitians'));
    }

    public function create()
    {
        abort_if(Gate::denies('penelitian_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.penelitians.create');
    }

    public function store(StorePenelitianRequest $request)
    {
        $attr = $request->all();
        $attr['user_id'] = auth()->id();
        $penelitian = Penelitian::create($attr);

        if ($request->input('kesbang', false)) {
            $penelitian->addMedia(storage_path('tmp/uploads/' . basename($request->input('kesbang'))))->toMediaCollection('kesbang');
        }

        if ($request->input('hasil', false)) {
            $penelitian->addMedia(storage_path('tmp/uploads/' . basename($request->input('hasil'))))->toMediaCollection('hasil');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $penelitian->id]);
        }

        return redirect()->route('admin.penelitians.index');
    }

    public function edit(Penelitian $penelitian)
    {
        abort_if(Gate::denies('penelitian_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.penelitians.edit', compact('penelitian'));
    }

    public function update(UpdatePenelitianRequest $request, Penelitian $penelitian)
    {
        $attr = $request->all();
        $attr['user_id'] = auth()->id();
        $penelitian->update($attr);

        if ($request->input('kesbang', false)) {
            if (! $penelitian->kesbang || $request->input('kesbang') !== $penelitian->kesbang->file_name) {
                if ($penelitian->kesbang) {
                    $penelitian->kesbang->delete();
                }
                $penelitian->addMedia(storage_path('tmp/uploads/' . basename($request->input('kesbang'))))->toMediaCollection('kesbang');
            }
        } elseif ($penelitian->kesbang) {
            $penelitian->kesbang->delete();
        }

        if ($request->input('hasil', false)) {
            if (! $penelitian->hasil || $request->input('hasil') !== $penelitian->hasil->file_name) {
                if ($penelitian->hasil) {
                    $penelitian->hasil->delete();
                }
                $penelitian->addMedia(storage_path('tmp/uploads/' . basename($request->input('hasil'))))->toMediaCollection('hasil');
            }
        } elseif ($penelitian->hasil) {
            $penelitian->hasil->delete();
        }

        return redirect()->route('admin.penelitians.index');
    }

    public function show(Penelitian $penelitian)
    {
        abort_if(Gate::denies('penelitian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penelitian->load('user');

        return view('admin.penelitians.show', compact('penelitian'));
    }

    public function destroy(Penelitian $penelitian)
    {
        abort_if(Gate::denies('penelitian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penelitian->delete();

        return back();
    }

    public function massDestroy(MassDestroyPenelitianRequest $request)
    {
        $penelitians = Penelitian::find(request('ids'));

        foreach ($penelitians as $penelitian) {
            $penelitian->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('penelitian_create') && Gate::denies('penelitian_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Penelitian();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
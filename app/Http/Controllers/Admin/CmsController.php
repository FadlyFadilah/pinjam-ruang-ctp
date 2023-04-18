<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCmRequest;
use App\Http\Requests\StoreCmRequest;
use App\Http\Requests\UpdateCmRequest;
use App\Models\Cm;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CmsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('cm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cms = Cm::with(['user', 'media'])->get();

        return view('admin.cms.index', compact('cms'));
    }

    public function create()
    {
        abort_if(Gate::denies('cm_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cms.create', compact('users'));
    }

    public function store(StoreCmRequest $request)
    {
        $cm = Cm::create($request->all());

        if ($request->input('portofolio', false)) {
            $cm->addMedia(storage_path('tmp/uploads/' . basename($request->input('portofolio'))))->toMediaCollection('portofolio');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $cm->id]);
        }

        return redirect()->route('admin.cms.index');
    }

    public function edit(Cm $cm)
    {
        abort_if(Gate::denies('cm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cm->load('user');

        return view('admin.cms.edit', compact('cm', 'users'));
    }

    public function update(UpdateCmRequest $request, Cm $cm)
    {
        $cm->update($request->all());

        if ($request->input('portofolio', false)) {
            if (! $cm->portofolio || $request->input('portofolio') !== $cm->portofolio->file_name) {
                if ($cm->portofolio) {
                    $cm->portofolio->delete();
                }
                $cm->addMedia(storage_path('tmp/uploads/' . basename($request->input('portofolio'))))->toMediaCollection('portofolio');
            }
        } elseif ($cm->portofolio) {
            $cm->portofolio->delete();
        }

        return redirect()->route('admin.cms.index');
    }

    public function show(Cm $cm)
    {
        abort_if(Gate::denies('cm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cm->load('user');

        return view('admin.cms.show', compact('cm'));
    }

    public function destroy(Cm $cm)
    {
        abort_if(Gate::denies('cm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cm->delete();

        return back();
    }

    public function massDestroy(MassDestroyCmRequest $request)
    {
        $cms = Cm::find(request('ids'));

        foreach ($cms as $cm) {
            $cm->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('cm_create') && Gate::denies('cm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Cm();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyKpRequest;
use App\Http\Requests\StoreKpRequest;
use App\Http\Requests\UpdateKpRequest;
use App\Models\Kp;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class KpController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('kp_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (!auth()->user()->is_admin) {
            $kps = Kp::with(['user', 'media'])->where('user_id', auth()->id())->get();
            return view('admin.kps.index', compact('kps'));
        }
        $kps = Kp::with(['user', 'media'])->get();

        return view('admin.kps.index', compact('kps'));
    }

    public function ubahstatus(Request $request, Kp $kp)
    {
        $kp->status = $request->input('status');

        $kp->save();

        return redirect()->route('admin.kps.index');
    }

    public function create()
    {
        abort_if(Gate::denies('kp_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kps.create');
    }

    public function store(StoreKpRequest $request)
    {
        $attr = $request->all();
        $attr['user_id'] = auth()->id();
        $kp = Kp::create($attr);

        if ($request->input('kesbang', false)) {
            $kp->addMedia(storage_path('tmp/uploads/' . basename($request->input('kesbang'))))->toMediaCollection('kesbang');
        }

        if ($request->input('hasil', false)) {
            $kp->addMedia(storage_path('tmp/uploads/' . basename($request->input('hasil'))))->toMediaCollection('hasil');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $kp->id]);
        }

        return redirect()->route('admin.kps.index');
    }

    public function edit(Kp $kp)
    {
        abort_if(Gate::denies('kp_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kps.edit', compact('kp'));
    }

    public function update(UpdateKpRequest $request, Kp $kp)
    {
        $attr = $request->all();
        $attr['user_id'] = $kp->user_id;
        $kp->update($attr);

        if ($request->input('kesbang', false)) {
            if (!$kp->kesbang || $request->input('kesbang') !== $kp->kesbang->file_name) {
                if ($kp->kesbang) {
                    $kp->kesbang->delete();
                }
                $kp->addMedia(storage_path('tmp/uploads/' . basename($request->input('kesbang'))))->toMediaCollection('kesbang');
            }
        } elseif ($kp->kesbang) {
            $kp->kesbang->delete();
        }

        if ($request->input('hasil', false)) {
            if (!$kp->hasil || $request->input('hasil') !== $kp->hasil->file_name) {
                if ($kp->hasil) {
                    $kp->hasil->delete();
                }
                $kp->addMedia(storage_path('tmp/uploads/' . basename($request->input('hasil'))))->toMediaCollection('hasil');
            }
        } elseif ($kp->hasil) {
            $kp->hasil->delete();
        }

        return redirect()->route('admin.kps.index');
    }

    public function show(Kp $kp)
    {
        abort_if(Gate::denies('kp_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kp->load('user');

        return view('admin.kps.show', compact('kp'));
    }

    public function destroy(Kp $kp)
    {
        abort_if(Gate::denies('kp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kp->delete();

        return back();
    }

    public function massDestroy(MassDestroyKpRequest $request)
    {
        $kps = Kp::find(request('ids'));

        foreach ($kps as $kp) {
            $kp->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('kp_create') && Gate::denies('kp_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Kp();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

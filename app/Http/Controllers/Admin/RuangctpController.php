<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRuangctpRequest;
use App\Http\Requests\StoreRuangctpRequest;
use App\Http\Requests\UpdateRuangctpRequest;
use App\Models\Ruangan;
use App\Models\Ruangctp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RuangctpController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('ruangctp_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ruangctps = Ruangctp::with(['ruangan', 'media'])->get();

        return view('admin.ruangctps.index', compact('ruangctps'));
    }
    public function ubahstatus(Request $request, Ruangctp $ruangctps)
    {
        $ruangctps->status = $request->input('status');

        $ruangctps->save();

        return redirect()->route('admin.ruangctps.index');
    }

    public function create()
    {
        abort_if(Gate::denies('ruangctp_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ruangans = Ruangan::where('id', '>', 4 )->pluck('nama_ruangan', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.ruangctps.create', compact('ruangans'));
    }

    public function store(StoreRuangctpRequest $request)
    {
        $ruangctp = Ruangctp::create($request->all());

        if ($request->input('surat_permohonan', false)) {
            $ruangctp->addMedia(storage_path('tmp/uploads/' . basename($request->input('surat_permohonan'))))->toMediaCollection('surat_permohonan');
        }

        if ($request->input('rundown_proposal', false)) {
            $ruangctp->addMedia(storage_path('tmp/uploads/' . basename($request->input('rundown_proposal'))))->toMediaCollection('rundown_proposal');
        }

        if ($request->input('rundown_barang', false)) {
            $ruangctp->addMedia(storage_path('tmp/uploads/' . basename($request->input('rundown_barang'))))->toMediaCollection('rundown_barang');
        }

        if ($request->input('rundown_persiapan', false)) {
            $ruangctp->addMedia(storage_path('tmp/uploads/' . basename($request->input('rundown_persiapan'))))->toMediaCollection('rundown_persiapan');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $ruangctp->id]);
        }

        return redirect()->route('admin.ruangctps.index');
    }

    public function edit(Ruangctp $ruangctp)
    {
        abort_if(Gate::denies('ruangctp_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ruangans = Ruangan::where('id', '>', 4 )->pluck('nama_ruangan', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ruangctp->load('ruangan');

        return view('admin.ruangctps.edit', compact('ruangans', 'ruangctp'));
    }

    public function update(UpdateRuangctpRequest $request, Ruangctp $ruangctp)
    {
        $ruangctp->update($request->all());

        if ($request->input('surat_permohonan', false)) {
            if (! $ruangctp->surat_permohonan || $request->input('surat_permohonan') !== $ruangctp->surat_permohonan->file_name) {
                if ($ruangctp->surat_permohonan) {
                    $ruangctp->surat_permohonan->delete();
                }
                $ruangctp->addMedia(storage_path('tmp/uploads/' . basename($request->input('surat_permohonan'))))->toMediaCollection('surat_permohonan');
            }
        } elseif ($ruangctp->surat_permohonan) {
            $ruangctp->surat_permohonan->delete();
        }

        if ($request->input('rundown_proposal', false)) {
            if (! $ruangctp->rundown_proposal || $request->input('rundown_proposal') !== $ruangctp->rundown_proposal->file_name) {
                if ($ruangctp->rundown_proposal) {
                    $ruangctp->rundown_proposal->delete();
                }
                $ruangctp->addMedia(storage_path('tmp/uploads/' . basename($request->input('rundown_proposal'))))->toMediaCollection('rundown_proposal');
            }
        } elseif ($ruangctp->rundown_proposal) {
            $ruangctp->rundown_proposal->delete();
        }

        if ($request->input('rundown_barang', false)) {
            if (! $ruangctp->rundown_barang || $request->input('rundown_barang') !== $ruangctp->rundown_barang->file_name) {
                if ($ruangctp->rundown_barang) {
                    $ruangctp->rundown_barang->delete();
                }
                $ruangctp->addMedia(storage_path('tmp/uploads/' . basename($request->input('rundown_barang'))))->toMediaCollection('rundown_barang');
            }
        } elseif ($ruangctp->rundown_barang) {
            $ruangctp->rundown_barang->delete();
        }

        if ($request->input('rundown_persiapan', false)) {
            if (! $ruangctp->rundown_persiapan || $request->input('rundown_persiapan') !== $ruangctp->rundown_persiapan->file_name) {
                if ($ruangctp->rundown_persiapan) {
                    $ruangctp->rundown_persiapan->delete();
                }
                $ruangctp->addMedia(storage_path('tmp/uploads/' . basename($request->input('rundown_persiapan'))))->toMediaCollection('rundown_persiapan');
            }
        } elseif ($ruangctp->rundown_persiapan) {
            $ruangctp->rundown_persiapan->delete();
        }

        return redirect()->route('admin.ruangctps.index');
    }

    public function show(Ruangctp $ruangctp)
    {
        abort_if(Gate::denies('ruangctp_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ruangctp->load('ruangan');

        return view('admin.ruangctps.show', compact('ruangctp'));
    }

    public function destroy(Ruangctp $ruangctp)
    {
        abort_if(Gate::denies('ruangctp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ruangctp->delete();

        return back();
    }

    public function massDestroy(MassDestroyRuangctpRequest $request)
    {
        $ruangctps = Ruangctp::find(request('ids'));

        foreach ($ruangctps as $ruangctp) {
            $ruangctp->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('ruangctp_create') && Gate::denies('ruangctp_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Ruangctp();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Ruangctp extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'ruangctps';

    public const RUNDOWN_RADIO = [
        'Ya'    => 'Ya',
        'Tidak' => 'Tidak',
    ];

    public const GLADIRESIK_RADIO = [
        'Ya'    => 'Ya',
        'Tidak' => 'Tidak',
    ];

    public const SKPD_SELECT = [
        'SKPD'     => 'SKPD',
        'Non-SKPD' => 'Non-SKPD',
    ];

    public const STATUS_SELECT = [
        'Diterima'         => 'Diterima',
        'Tidak Diterima' => 'Ditolak',
    ];

    protected $dates = [
        'mulai',
        'selesai',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'surat_permohonan',
        'rundown_proposal',
        'rundown_barang',
        'rundown_persiapan',
    ];

    protected $fillable = [
        'ruangan_id',
        'skpd',
        'bidang_kegiatan',
        'nama',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kota',
        'kodepos',
        'no',
        'ktp',
        'instansi',
        'statusdiinstansi',
        'bidanginstansi',
        'alamatinstansi',
        'mulai',
        'mulaijam',
        'selesai',
        'selesaijam',
        'nama_acara',
        'jumlah_peserta',
        'narasumber',
        'outpu',
        'outcome',
        'ringkasan',
        'rundown',
        'gladiresik',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const BIDANG_KEGIATAN_SELECT = [
        'Aplikasi dan Pengembang Permainan' => 'Aplikasi dan Pengembang Permainan',
        'Arsitektur'                        => 'Arsitektur',
        'Desain Interior'                   => 'Desain Interior',
        'Desain Komunikasi Visual'          => 'Desain Komunikasi Visual',
        'Desain Produk'                     => 'Desain Produk',
        'Fashion'                           => 'Fashion',
        'Film,Animasi dan Video'            => 'Film,Animasi dan Video',
        'Fotografi'                         => 'Fotografi',
        'Kriya'                             => 'Kriya',
        'Kuliner'                           => 'Kuliner',
        'Musik'                             => 'Musik',
        'Penerbitan'                        => 'Penerbitan',
        'Periklanan'                        => 'Periklanan',
        'Seni Pertunjukan'                  => 'Seni Pertunjukan',
        'Seni Rupa'                         => 'Seni Rupa',
        'Televisi dan Radio'                => 'Televisi dan Radio',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }

    public function getMulaiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setMulaiAttribute($value)
    {
        $this->attributes['mulai'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getSelesaiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSelesaiAttribute($value)
    {
        $this->attributes['selesai'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getSuratPermohonanAttribute()
    {
        return $this->getMedia('surat_permohonan')->last();
    }

    public function getRundownProposalAttribute()
    {
        return $this->getMedia('rundown_proposal')->last();
    }

    public function getRundownBarangAttribute()
    {
        return $this->getMedia('rundown_barang')->last();
    }

    public function getRundownPersiapanAttribute()
    {
        return $this->getMedia('rundown_persiapan')->last();
    }
}
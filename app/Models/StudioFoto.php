<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StudioFoto extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'studio_fotos';

    protected $appends = [
        'ktp',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'pemohon',
        'alamat',
        'wa',
        'produk',
        'profil',
        'konten',
        'oss',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const KONTEN_SELECT = [
        'logo'                              => 'Logo',
        'label'                             => 'Label untuk Kemasan(dengan ketentuan wajib sudah memiliki logo, tagline, foto produk, copywriting)',
        'template ig story'                 => 'Template IG Story *(dengan ketentuan wajib sudah memiliki logo, tagline, foto produk, copywriting)',
        'Foto Produk'                       => 'Foto Produk',
        'Pembuatan Video Animasi Sederhana' => 'Pembuatan Video Animasi Sederhana *(dengan ketentuan wajib sudah memiliki logo, tagline, foto produk, copywriting)',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getKtpAttribute()
    {
        return $this->getMedia('ktp')->last();
    }
}
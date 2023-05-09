<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Ruangan extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'ruangans';

    protected $appends = [
        'gambar',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'Tersedia'       => 'Tersedia',
        'Tidak Tersedia' => 'Tidak Tersedia',
    ];

    protected $fillable = [
        'nama_ruangan',
        'kapasitas',
        'lokasi',
        'deskripsi',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getGambarAttribute()
    {
        $file = $this->getMedia('gambar')->last();
        if ($file) {
            $file->url       = $file->getUrl();
        }

        return $file;
    }
}
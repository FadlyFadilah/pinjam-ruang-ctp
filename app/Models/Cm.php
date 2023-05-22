<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Cm extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'cms';

    protected $appends = [
        'portofolio',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'Diterima'       => 'Di Terima',
        'Tidak Diterima' => 'Tidak Diterima',
    ];

    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'asal_sekolah',
        'jurusan',
        'ketertarikan',
        'email',
        'no',
        'sosmed',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function getPortofolioAttribute()
    {
        return $this->getMedia('portofolio')->last();
    }
}
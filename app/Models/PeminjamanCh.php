<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeminjamanCh extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'peminjaman_ches';

    public const INFOKUS_RADIO = [
        'ya'    => 'Ya',
        'tidak' => 'Tidak',
    ];

    protected $dates = [
        'booking',
        'selesai',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ruangan_id',
        'user_id',
        'ktp',
        'nama',
        'alamat',
        'no_hp',
        'email',
        'tujuan',
        'booking',
        'selesai',
        'jumlah',
        'infokus',
        'persetujuan',
        'persetujuan_2',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getBookingAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBookingAttribute($value)
    {
        $this->attributes['booking'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getSelesaiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSelesaiAttribute($value)
    {
        $this->attributes['selesai'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
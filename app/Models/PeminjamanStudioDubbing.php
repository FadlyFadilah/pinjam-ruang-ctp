<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeminjamanStudioDubbing extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'peminjaman_studio_dubbings';

    public const OPERATOR_RADIO = [
        'ya'    => 'Ya',
        'tidak' => 'Tidak',
    ];

    protected $dates = [
        'booking',
        'selesai_booking',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ruangan_id',
        'user_id',
        'nama',
        'ktp',
        'alamat',
        'no_hp',
        'email',
        'booking',
        'selesai_booking',
        'operator',
        'persetujuan',
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

    public function getSelesaiBookingAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSelesaiBookingAttribute($value)
    {
        $this->attributes['selesai_booking'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeminjamanRuangKacaBitc extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'peminjaman_ruang_kaca_bitcs';

    public const INFOKUS_RADIO = [
        'ya'    => 'Ya',
        'tidak' => 'Tidak',
    ];

    protected $dates = [
        'tanggal_booking',
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
        'tanggal_booking',
        'selesai_booking',
        'jumlah',
        'aggrement',
        'infokus',
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

    public function getTanggalBookingAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalBookingAttribute($value)
    {
        $this->attributes['tanggal_booking'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
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
<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeminjamanBarang extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'peminjaman_barangs';

    protected $dates = [
        'booking',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'barang_id',
        'user_id',
        'nama_usaha',
        'alamat',
        'name',
        'ktp',
        'booking',
        'tujuan',
        'no_hp',
        'email',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
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
}
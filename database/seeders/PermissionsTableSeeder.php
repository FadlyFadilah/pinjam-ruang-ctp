<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'ruangan_create',
            ],
            [
                'id'    => 18,
                'title' => 'ruangan_edit',
            ],
            [
                'id'    => 19,
                'title' => 'ruangan_show',
            ],
            [
                'id'    => 20,
                'title' => 'ruangan_delete',
            ],
            [
                'id'    => 21,
                'title' => 'ruangan_access',
            ],
            [
                'id'    => 22,
                'title' => 'barang_create',
            ],
            [
                'id'    => 23,
                'title' => 'barang_edit',
            ],
            [
                'id'    => 24,
                'title' => 'barang_show',
            ],
            [
                'id'    => 25,
                'title' => 'barang_delete',
            ],
            [
                'id'    => 26,
                'title' => 'barang_access',
            ],
            [
                'id'    => 27,
                'title' => 'manajemen_peminjaman_access',
            ],
            [
                'id'    => 28,
                'title' => 'peminjaman_ruangan_access',
            ],
            [
                'id'    => 29,
                'title' => 'peminjaman_studio_dubbing_create',
            ],
            [
                'id'    => 30,
                'title' => 'peminjaman_studio_dubbing_edit',
            ],
            [
                'id'    => 31,
                'title' => 'peminjaman_studio_dubbing_show',
            ],
            [
                'id'    => 32,
                'title' => 'peminjaman_studio_dubbing_delete',
            ],
            [
                'id'    => 33,
                'title' => 'peminjaman_studio_dubbing_access',
            ],
            [
                'id'    => 34,
                'title' => 'peminjaman_ruang_kaca_bitc_create',
            ],
            [
                'id'    => 35,
                'title' => 'peminjaman_ruang_kaca_bitc_edit',
            ],
            [
                'id'    => 36,
                'title' => 'peminjaman_ruang_kaca_bitc_show',
            ],
            [
                'id'    => 37,
                'title' => 'peminjaman_ruang_kaca_bitc_delete',
            ],
            [
                'id'    => 38,
                'title' => 'peminjaman_ruang_kaca_bitc_access',
            ],
            [
                'id'    => 39,
                'title' => 'peminjaman_ch_create',
            ],
            [
                'id'    => 40,
                'title' => 'peminjaman_ch_edit',
            ],
            [
                'id'    => 41,
                'title' => 'peminjaman_ch_show',
            ],
            [
                'id'    => 42,
                'title' => 'peminjaman_ch_delete',
            ],
            [
                'id'    => 43,
                'title' => 'peminjaman_ch_access',
            ],
            [
                'id'    => 44,
                'title' => 'studio_foto_create',
            ],
            [
                'id'    => 45,
                'title' => 'studio_foto_edit',
            ],
            [
                'id'    => 46,
                'title' => 'studio_foto_show',
            ],
            [
                'id'    => 47,
                'title' => 'studio_foto_delete',
            ],
            [
                'id'    => 48,
                'title' => 'studio_foto_access',
            ],
            [
                'id'    => 49,
                'title' => 'peminjaman_barang_create',
            ],
            [
                'id'    => 50,
                'title' => 'peminjaman_barang_edit',
            ],
            [
                'id'    => 51,
                'title' => 'peminjaman_barang_show',
            ],
            [
                'id'    => 52,
                'title' => 'peminjaman_barang_delete',
            ],
            [
                'id'    => 53,
                'title' => 'peminjaman_barang_access',
            ],
            [
                'id'    => 54,
                'title' => 'pendaftaran_access',
            ],
            [
                'id'    => 55,
                'title' => 'penelitian_create',
            ],
            [
                'id'    => 56,
                'title' => 'penelitian_edit',
            ],
            [
                'id'    => 57,
                'title' => 'penelitian_show',
            ],
            [
                'id'    => 58,
                'title' => 'penelitian_delete',
            ],
            [
                'id'    => 59,
                'title' => 'penelitian_access',
            ],
            [
                'id'    => 60,
                'title' => 'kp_create',
            ],
            [
                'id'    => 61,
                'title' => 'kp_edit',
            ],
            [
                'id'    => 62,
                'title' => 'kp_show',
            ],
            [
                'id'    => 63,
                'title' => 'kp_delete',
            ],
            [
                'id'    => 64,
                'title' => 'kp_access',
            ],
            [
                'id'    => 65,
                'title' => 'pkl_create',
            ],
            [
                'id'    => 66,
                'title' => 'pkl_edit',
            ],
            [
                'id'    => 67,
                'title' => 'pkl_show',
            ],
            [
                'id'    => 68,
                'title' => 'pkl_delete',
            ],
            [
                'id'    => 69,
                'title' => 'pkl_access',
            ],
            [
                'id'    => 70,
                'title' => 'cm_create',
            ],
            [
                'id'    => 71,
                'title' => 'cm_edit',
            ],
            [
                'id'    => 72,
                'title' => 'cm_show',
            ],
            [
                'id'    => 73,
                'title' => 'cm_delete',
            ],
            [
                'id'    => 74,
                'title' => 'cm_access',
            ],
            [
                'id'    => 75,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
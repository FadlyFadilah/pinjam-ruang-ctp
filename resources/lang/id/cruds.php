<?php

return [
    'userManagement' => [
        'title'          => 'Manajemen User',
        'title_singular' => 'Manajemen User',
    ],
    'permission' => [
        'title'          => 'Izin',
        'title_singular' => 'Izin',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Peranan',
        'title_singular' => 'Peranan',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Daftar Pengguna',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'ruangan' => [
        'title'          => 'Ruangan',
        'title_singular' => 'Ruangan',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'nama_ruangan'        => 'Nama Ruangan',
            'nama_ruangan_helper' => ' ',
            'kapasitas'           => 'Kapasitas',
            'kapasitas_helper'    => ' ',
            'lokasi'              => 'Lokasi',
            'lokasi_helper'       => ' ',
            'deskripsi'           => 'Deskripsi',
            'deskripsi_helper'    => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'gambar'              => 'Gambar',
            'gambar_helper'       => ' ',
            'status'              => 'Status',
            'status_helper'       => ' ',
        ],
    ],
    'barang' => [
        'title'          => 'Barang',
        'title_singular' => 'Barang',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'nama_barang'        => 'Nama Barang',
            'nama_barang_helper' => ' ',
            'kapasitas'          => 'Kapasitas',
            'kapasitas_helper'   => ' ',
            'lokasi'             => 'Lokasi',
            'lokasi_helper'      => ' ',
            'deskripsi'          => 'Deskripsi',
            'deskripsi_helper'   => ' ',
            'status'             => 'Status',
            'status_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'gambar'             => 'Gambar',
            'gambar_helper'      => ' ',
        ],
    ],
    'manajemenPeminjaman' => [
        'title'          => 'Manajemen Peminjaman',
        'title_singular' => 'Manajemen Peminjaman',
    ],
    'peminjamanRuangan' => [
        'title'          => 'Peminjaman Ruangan',
        'title_singular' => 'Peminjaman Ruangan',
    ],
    'peminjamanStudioDubbing' => [
        'title'          => 'Peminjaman Studio Dubbing',
        'title_singular' => 'Peminjaman Studio Dubbing',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'ruangan'                => 'Ruangan',
            'ruangan_helper'         => ' ',
            'user'                   => 'User',
            'user_helper'            => ' ',
            'nama'                   => 'Nama Tenant',
            'nama_helper'            => ' ',
            'ktp'                    => 'No. Ktp',
            'ktp_helper'             => ' ',
            'alamat'                 => 'Alamat',
            'alamat_helper'          => ' ',
            'no_hp'                  => 'No Hp',
            'no_hp_helper'           => ' ',
            'email'                  => 'Email',
            'email_helper'           => ' ',
            'booking'                => 'Tanggal Booking',
            'booking_helper'         => ' ',
            'selesai_booking'        => 'Selesai Booking',
            'selesai_booking_helper' => ' ',
            'persetujuan'            => 'Dengan ini saya bertanggung jawab atas kualitas dan kuantitas sarana dan prasarana pda Studio Dubbing Selama Masa Peminjaman. Dan Bersedia untuk Bertanggung Jawab apabila ada kerusakan/kehilangan',
            'persetujuan_helper'     => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'operator'               => 'Dengan Operator/tidak',
            'operator_helper'        => ' ',
        ],
    ],
    'peminjamanRuangKacaBitc' => [
        'title'          => 'Peminjaman Ruang Kaca BITC',
        'title_singular' => 'Peminjaman Ruang Kaca BITC',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'ruangan'                => 'Ruangan',
            'ruangan_helper'         => ' ',
            'user'                   => 'User',
            'user_helper'            => ' ',
            'nama'                   => 'Nama Tenant',
            'nama_helper'            => ' ',
            'ktp'                    => 'No Ktp',
            'ktp_helper'             => ' ',
            'alamat'                 => 'Alamat',
            'alamat_helper'          => ' ',
            'no_hp'                  => 'No HP',
            'no_hp_helper'           => ' ',
            'email'                  => 'Email',
            'email_helper'           => ' ',
            'tanggal_booking'        => 'Tanggal Booking',
            'tanggal_booking_helper' => ' ',
            'selesai_booking'        => 'Selesai Booking',
            'selesai_booking_helper' => ' ',
            'jumlah'                 => 'Jumlah Peserta',
            'jumlah_helper'          => ' ',
            'aggrement'              => 'Dengan ini saya bertanggung jawab atas kualitas dan kuantitas sarana dan prasarana pada Ruang Rapat Selama Masa Peminjaman. Dan Bersedia untuk Bertanggung Jawab apabila ada kerusakan/kehilangan',
            'aggrement_helper'       => ' ',
            'infokus'                => 'Dengan Infokus',
            'infokus_helper'         => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'peminjamanCh' => [
        'title'          => 'Peminjaman Conventional Hall',
        'title_singular' => 'Peminjaman Conventional Hall',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'ruangan'              => 'Ruangan',
            'ruangan_helper'       => ' ',
            'user'                 => 'User',
            'user_helper'          => ' ',
            'ktp'                  => 'No KTP',
            'ktp_helper'           => ' ',
            'alamat'               => 'Alamat',
            'alamat_helper'        => ' ',
            'no_hp'                => 'No HP',
            'no_hp_helper'         => ' ',
            'email'                => 'Email',
            'email_helper'         => ' ',
            'tujuan'               => 'Tujuan Peminjaman',
            'tujuan_helper'        => ' ',
            'booking'              => 'Tanggal Booking',
            'booking_helper'       => ' ',
            'selesai'              => 'Selesai Booking',
            'selesai_helper'       => ' ',
            'jumlah'               => 'Jumlah Peserta',
            'jumlah_helper'        => ' ',
            'infokus'              => 'Dengan Infokus',
            'infokus_helper'       => ' ',
            'persetujuan'          => 'Bersedia Membayar Retribusi Sebesar Rp. 2.000.000,- ',
            'persetujuan_helper'   => ' ',
            'persetujuan_2'        => 'Dengan ini saya bertanggung jawab atas kualitas dan kuantitas sarana dan prasarana pada Ruang Rapat Selama Masa Peminjaman. Dan Bersedia untuk Bertanggung Jawab apabila ada kerusakan/kehilangan',
            'persetujuan_2_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'nama'                 => 'Nama Peminjam',
            'nama_helper'          => ' ',
        ],
    ],
    'studioFoto' => [
        'title'          => 'Studio Foto',
        'title_singular' => 'Studio Foto',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'pemohon'           => 'Nama Pemohon',
            'pemohon_helper'    => ' ',
            'alamat'            => 'Alamat',
            'alamat_helper'     => ' ',
            'wa'                => 'No Whatsapp',
            'wa_helper'         => ' ',
            'produk'            => 'Nama Produk',
            'produk_helper'     => ' ',
            'profil'            => 'Profil Singkat Produk',
            'profil_helper'     => ' ',
            'konten'            => 'Konten Promosi yang Akan dibuat',
            'konten_helper'     => ' ',
            'ktp'               => 'Foto KTP',
            'ktp_helper'        => 'Maksimal 2  Mb',
            'oss'               => 'No Oss',
            'oss_helper'        => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'peminjamanBarang' => [
        'title'          => 'Peminjaman Barang',
        'title_singular' => 'Peminjaman Barang',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'barang'            => 'Barang',
            'barang_helper'     => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'nama_usaha'        => 'Nama Usaha',
            'nama_usaha_helper' => ' ',
            'alamat'            => 'Alamat',
            'alamat_helper'     => ' ',
            'name'              => 'Name Pemilik',
            'name_helper'       => ' ',
            'ktp'               => 'No KTP',
            'ktp_helper'        => ' ',
            'booking'           => 'Tanggal Booking',
            'booking_helper'    => ' ',
            'tujuan'            => 'Tujuan Booking',
            'tujuan_helper'     => ' ',
            'no_hp'             => 'No HP',
            'no_hp_helper'      => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'pendaftaran' => [
        'title'          => 'Pendaftaran',
        'title_singular' => 'Pendaftaran',
    ],
    'penelitian' => [
        'title'          => 'Pendaftaran Penelitian',
        'title_singular' => 'Pendaftaran Penelitian',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'nama'              => 'Nama Lengkap',
            'nama_helper'       => ' ',
            'no_hp'             => 'No HP',
            'no_hp_helper'      => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'univ'              => 'Asal Perguruan Tinggi',
            'univ_helper'       => ' ',
            'alamat'            => 'Alamat',
            'alamat_helper'     => ' ',
            'lama'              => 'Lama Penelitian',
            'lama_helper'       => ' ',
            'judul'             => 'Judul Penelitian',
            'judul_helper'      => ' ',
            'kesbang'           => 'Surat Pengantar ke Kesbang',
            'kesbang_helper'    => ' ',
            'hasil'             => 'Hasil Penelitian',
            'hasil_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'kp' => [
        'title'          => 'Pendaftaran Kerja Praktek',
        'title_singular' => 'Pendaftaran Kerja Praktek',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'nama'              => 'Nama Lengkap',
            'nama_helper'       => ' ',
            'univ'              => 'Asal Perguruan Tinggi',
            'univ_helper'       => ' ',
            'no_hp'             => 'No HP',
            'no_hp_helper'      => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'alamat'            => 'Alamat',
            'alamat_helper'     => ' ',
            'lama'              => 'Lama Kerja Praktek',
            'lama_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'kesbang'           => 'Surat Pengantar ke Kesbang',
            'kesbang_helper'    => ' ',
            'hasil'             => 'Hasil Kerja Praktek',
            'hasil_helper'      => ' ',
        ],
    ],
    'pkl' => [
        'title'          => 'Pendaftaran Pkl',
        'title_singular' => 'Pendaftaran Pkl',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'user'                => 'User',
            'user_helper'         => ' ',
            'nama'                => 'Nama Lengkap',
            'nama_helper'         => ' ',
            'asal_sekolah'        => 'Asal Sekolah',
            'asal_sekolah_helper' => ' ',
            'alamat'              => 'Alamat',
            'alamat_helper'       => ' ',
            'no_hp'               => 'No Hp',
            'no_hp_helper'        => ' ',
            'email'               => 'Email',
            'email_helper'        => ' ',
            'lama'                => 'Lama Kerja Pkl',
            'lama_helper'         => ' ',
            'kesbang'             => 'Kesbang',
            'kesbang_helper'      => ' ',
            'hasil'               => 'Hasil Karya',
            'hasil_helper'        => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'cm' => [
        'title'          => 'Cimahi Marker Space',
        'title_singular' => 'Cimahi Marker Space',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'user'                => 'User',
            'user_helper'         => ' ',
            'nama'                => 'Nama Lengkap',
            'nama_helper'         => ' ',
            'alamat'              => 'Alamat',
            'alamat_helper'       => ' ',
            'asal_sekolah'        => 'Asal Sekolah',
            'asal_sekolah_helper' => ' ',
            'jurusan'             => 'Jurusan',
            'jurusan_helper'      => ' ',
            'portofolio'          => 'Portofolio',
            'portofolio_helper'   => ' ',
            'ketertarikan'        => 'Ketertarikan',
            'ketertarikan_helper' => ' ',
            'email'               => 'Email',
            'email_helper'        => ' ',
            'no'                  => 'No HP',
            'no_helper'           => ' ',
            'sosmed'              => 'Social Media',
            'sosmed_helper'       => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'status'              => 'Status',
            'status_helper'       => ' ',
        ],
    ],
    'contentManagement' => [
        'title'          => 'Content management',
        'title_singular' => 'Content management',
    ],
    'contentCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentPage' => [
        'title'          => 'Pages',
        'title_singular' => 'Page',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'title'                 => 'Title',
            'title_helper'          => ' ',
            'category'              => 'Categories',
            'category_helper'       => ' ',
            'tag'                   => 'Tags',
            'tag_helper'            => ' ',
            'page_text'             => 'Full Text',
            'page_text_helper'      => ' ',
            'excerpt'               => 'Excerpt',
            'excerpt_helper'        => ' ',
            'featured_image'        => 'Featured Image',
            'featured_image_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated At',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted At',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'ruangctp' => [
        'title'          => 'Ruang CTP',
        'title_singular' => 'Ruang CTP',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'skpd'                     => 'Skpd',
            'skpd_helper'              => 'Pilih SKPD untuk acara pemerintah. Pilih NonSKPD untuk acara diluar pemerintah.',
            'bidang_kegiatan'          => 'Bidang Kegiatan',
            'bidang_kegiatan_helper'   => ' ',
            'nama'                     => 'Nama',
            'nama_helper'              => ' ',
            'alamat'                   => 'Alamat',
            'alamat_helper'            => ' ',
            'kelurahan'                => 'Kelurahan',
            'kelurahan_helper'         => ' ',
            'kecamatan'                => 'Kecamatan',
            'kecamatan_helper'         => ' ',
            'kota'                     => 'Kabupaten / Kota',
            'kota_helper'              => ' ',
            'kodepos'                  => 'Kode Pos',
            'kodepos_helper'           => ' ',
            'no'                       => 'No Telepon',
            'no_helper'                => ' ',
            'ktp'                      => 'No KTP',
            'ktp_helper'               => ' ',
            'instansi'                 => 'Nama Instansi',
            'instansi_helper'          => ' ',
            'statusdiinstansi'         => 'Status dalam Instansi / Pribadi',
            'statusdiinstansi_helper'  => ' ',
            'bidanginstansi'           => 'Bidang Instansi / Pribadi',
            'bidanginstansi_helper'    => ' ',
            'alamatinstansi'           => 'Alamat Instansi / Pribadi',
            'alamatinstansi_helper'    => ' ',
            'mulai'                    => 'Tanggal Mulai',
            'mulai_helper'             => ' ',
            'mulaijam'                 => 'Mulai Jam',
            'mulaijam_helper'          => ' ',
            'selesai'                  => 'Selesai Tanggal',
            'selesai_helper'           => ' ',
            'selesaijam'               => 'Selesai Jam',
            'selesaijam_helper'        => ' ',
            'nama_acara'               => 'Nama Acara / Kegiatan',
            'nama_acara_helper'        => ' ',
            'jumlah_peserta'           => 'Jumlah Peserta',
            'jumlah_peserta_helper'    => ' ',
            'narasumber'               => 'Narasumber',
            'narasumber_helper'        => ' ',
            'outpu'                    => 'Output',
            'outpu_helper'             => ' ',
            'outcome'                  => 'Outcome',
            'outcome_helper'           => ' ',
            'ringkasan'                => 'Ringkasan Kegiatan',
            'ringkasan_helper'         => ' ',
            'surat_permohonan'         => 'Unggah Surat Permohonan',
            'surat_permohonan_helper'  => '(Max 5MB)',
            'rundown'                  => 'Unggah Files Rundown',
            'rundown_helper'           => ' ',
            'rundown_proposal'         => 'Rundown Proposal',
            'rundown_proposal_helper'  => '(Max 5MB)',
            'rundown_barang'           => 'Rundown Loading Barang',
            'rundown_barang_helper'    => '(Max 5MB)',
            'rundown_persiapan'        => 'Rundown Persiapan',
            'rundown_persiapan_helper' => '(Max 5MB)',
            'gladiresik'               => 'Tanggal sudah termasuk gladiresik ?',
            'gladiresik_helper'        => ' ',
            'status'                   => 'Status',
            'status_helper'            => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'ruangan'                  => 'Ruangan',
            'ruangan_helper'           => ' ',
        ],
    ],

];

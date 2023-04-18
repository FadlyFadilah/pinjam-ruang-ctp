<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
// rooms
Route::get('/rooms', 'HomeController@rooms')->name('rooms');

// items
Route::get('/items', 'HomeController@items')->name('items');

// contact us
Route::view('/contactus', 'pages.contactus')->name('contactus');
// Route::post('/contactus', [ContactUsController::class, 'sendContactUsEmail'])->name('contactus.submit');

//about us
Route::view('/aboutus', 'pages.aboutus')->name('aboutus');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Ruangan
    Route::delete('ruangans/destroy', 'RuanganController@massDestroy')->name('ruangans.massDestroy');
    Route::post('ruangans/media', 'RuanganController@storeMedia')->name('ruangans.storeMedia');
    Route::post('ruangans/ckmedia', 'RuanganController@storeCKEditorImages')->name('ruangans.storeCKEditorImages');
    Route::resource('ruangans', 'RuanganController');

    // Barang
    Route::delete('barangs/destroy', 'BarangController@massDestroy')->name('barangs.massDestroy');
    Route::post('barangs/media', 'BarangController@storeMedia')->name('barangs.storeMedia');
    Route::post('barangs/ckmedia', 'BarangController@storeCKEditorImages')->name('barangs.storeCKEditorImages');
    Route::resource('barangs', 'BarangController');

    // Peminjaman Studio Dubbing
    Route::delete('peminjaman-studio-dubbings/destroy', 'PeminjamanStudioDubbingController@massDestroy')->name('peminjaman-studio-dubbings.massDestroy');
    Route::resource('peminjaman-studio-dubbings', 'PeminjamanStudioDubbingController');

    // Peminjaman Ruang Kaca Bitc
    Route::delete('peminjaman-ruang-kaca-bitcs/destroy', 'PeminjamanRuangKacaBitcController@massDestroy')->name('peminjaman-ruang-kaca-bitcs.massDestroy');
    Route::resource('peminjaman-ruang-kaca-bitcs', 'PeminjamanRuangKacaBitcController');

    // Peminjaman Ch
    Route::delete('peminjaman-ches/destroy', 'PeminjamanChController@massDestroy')->name('peminjaman-ches.massDestroy');
    Route::resource('peminjaman-ches', 'PeminjamanChController');

    // Studio Foto
    Route::delete('studio-fotos/destroy', 'StudioFotoController@massDestroy')->name('studio-fotos.massDestroy');
    Route::post('studio-fotos/media', 'StudioFotoController@storeMedia')->name('studio-fotos.storeMedia');
    Route::post('studio-fotos/ckmedia', 'StudioFotoController@storeCKEditorImages')->name('studio-fotos.storeCKEditorImages');
    Route::resource('studio-fotos', 'StudioFotoController');

    // Peminjaman Barang
    Route::delete('peminjaman-barangs/destroy', 'PeminjamanBarangController@massDestroy')->name('peminjaman-barangs.massDestroy');
    Route::resource('peminjaman-barangs', 'PeminjamanBarangController');

    // Penelitian
    Route::delete('penelitians/destroy', 'PenelitianController@massDestroy')->name('penelitians.massDestroy');
    Route::post('penelitians/media', 'PenelitianController@storeMedia')->name('penelitians.storeMedia');
    Route::post('penelitians/ckmedia', 'PenelitianController@storeCKEditorImages')->name('penelitians.storeCKEditorImages');
    Route::resource('penelitians', 'PenelitianController');

    // Kp
    Route::delete('kps/destroy', 'KpController@massDestroy')->name('kps.massDestroy');
    Route::post('kps/media', 'KpController@storeMedia')->name('kps.storeMedia');
    Route::post('kps/ckmedia', 'KpController@storeCKEditorImages')->name('kps.storeCKEditorImages');
    Route::resource('kps', 'KpController');

    // Pkl
    Route::delete('pkls/destroy', 'PklController@massDestroy')->name('pkls.massDestroy');
    Route::post('pkls/media', 'PklController@storeMedia')->name('pkls.storeMedia');
    Route::post('pkls/ckmedia', 'PklController@storeCKEditorImages')->name('pkls.storeCKEditorImages');
    Route::resource('pkls', 'PklController');

    // Cms
    Route::delete('cms/destroy', 'CmsController@massDestroy')->name('cms.massDestroy');
    Route::post('cms/media', 'CmsController@storeMedia')->name('cms.storeMedia');
    Route::post('cms/ckmedia', 'CmsController@storeCKEditorImages')->name('cms.storeCKEditorImages');
    Route::resource('cms', 'CmsController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('home');
    // Peminjaman Studio Dubbing
    Route::delete('peminjaman-studio-dubbings/destroy', 'PeminjamanStudioDubbingController@massDestroy')->name('peminjaman-studio-dubbings.massDestroy');
    Route::resource('peminjaman-studio-dubbings', 'PeminjamanStudioDubbingController');

    // Peminjaman Ruang Kaca Bitc
    Route::delete('peminjaman-ruang-kaca-bitcs/destroy', 'PeminjamanRuangKacaBitcController@massDestroy')->name('peminjaman-ruang-kaca-bitcs.massDestroy');
    Route::resource('peminjaman-ruang-kaca-bitcs', 'PeminjamanRuangKacaBitcController');

    // Peminjaman Ch
    Route::delete('peminjaman-ches/destroy', 'PeminjamanChController@massDestroy')->name('peminjaman-ches.massDestroy');
    Route::resource('peminjaman-ches', 'PeminjamanChController');
    
    // Studio Foto
    Route::delete('studio-fotos/destroy', 'StudioFotoController@massDestroy')->name('studio-fotos.massDestroy');
    Route::post('studio-fotos/media', 'StudioFotoController@storeMedia')->name('studio-fotos.storeMedia');
    Route::post('studio-fotos/ckmedia', 'StudioFotoController@storeCKEditorImages')->name('studio-fotos.storeCKEditorImages');
    Route::resource('studio-fotos', 'StudioFotoController');

    // Peminjaman Barang
    Route::delete('peminjaman-barangs/destroy', 'PeminjamanBarangController@massDestroy')->name('peminjaman-barangs.massDestroy');
    Route::resource('peminjaman-barangs', 'PeminjamanBarangController');

    // Penelitian
    Route::delete('penelitians/destroy', 'PenelitianController@massDestroy')->name('penelitians.massDestroy');
    Route::post('penelitians/media', 'PenelitianController@storeMedia')->name('penelitians.storeMedia');
    Route::post('penelitians/ckmedia', 'PenelitianController@storeCKEditorImages')->name('penelitians.storeCKEditorImages');
    Route::resource('penelitians', 'PenelitianController');

    // Kp
    Route::delete('kps/destroy', 'KpController@massDestroy')->name('kps.massDestroy');
    Route::post('kps/media', 'KpController@storeMedia')->name('kps.storeMedia');
    Route::post('kps/ckmedia', 'KpController@storeCKEditorImages')->name('kps.storeCKEditorImages');
    Route::resource('kps', 'KpController');

    // Pkl
    Route::delete('pkls/destroy', 'PklController@massDestroy')->name('pkls.massDestroy');
    Route::post('pkls/media', 'PklController@storeMedia')->name('pkls.storeMedia');
    Route::post('pkls/ckmedia', 'PklController@storeCKEditorImages')->name('pkls.storeCKEditorImages');
    Route::resource('pkls', 'PklController');

    // Cms
    Route::delete('cms/destroy', 'CmsController@massDestroy')->name('cms.massDestroy');
    Route::post('cms/media', 'CmsController@storeMedia')->name('cms.storeMedia');
    Route::post('cms/ckmedia', 'CmsController@storeCKEditorImages')->name('cms.storeCKEditorImages');
    Route::resource('cms', 'CmsController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});

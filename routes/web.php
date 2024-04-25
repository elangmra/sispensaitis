<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EssayController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MatapelajaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ADMIN
Route::group(['prefix' => 'admin', 'middleware' => [ 'auth','admin']], function() {
    Route::controller(AdminController::class)->group(function () {

        Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
        Route::get('/profile', 'profile')->name('admin.profile');
        Route::get('/settings', 'settings')->name('admin.settings');
        Route::post('/update_profile', 'update_profile')->name('admin.update_profile');

    });
    Route::controller(TeacherController::class)->group(function () {

        Route::get('/teachers', 'index')->name('admin.teacher.index');
        Route::get('/teachers/create', 'create')->name('teachers.create');
        Route::post('/teachers/store', 'store')->name('teachers.store');
        Route::get('/teachers/edit/{id}', 'edit')->name('teachers.edit');
        Route::put('/teachers/update/{id}', 'update')->name('teachers.update');
        Route::delete('/teachers/delete/{id}', 'destroy')->name('teachers.destroy');


    });
    Route::controller(StudentController::class)->group(function () {

        Route::get('/student', 'index')->name('admin.student.index');
        Route::get('/student/create', 'create')->name('student.create');
        Route::post('/student/store', 'store')->name('student.store');
        Route::get('/student/edit/{id}', 'edit')->name('student.edit');
        Route::put('/student/update/{id}', 'update')->name('student.update');
        Route::delete('/student/delete/{id}', 'destroy')->name('student.destroy');
    });
    Route::controller(KelasController::class)->group(function () {

        Route::get('/kelas', 'index')->name('admin.kelas.index');
        Route::get('/kelas/create', 'create')->name('kelas.create');
        Route::post('/kelas/store', 'store')->name('kelas.store');
        Route::get('/kelas/edit/{id}', 'edit')->name('kelas.edit');
        Route::post('/kelas/update/{id}', 'update')->name('kelas.update');
        Route::delete('/kelas/delete/{id}', 'destroy')->name('kelas.destroy');


    });
    Route::controller(MatapelajaranController::class)->group(function () {

        Route::get('/matapelajaran', 'index')->name('admin.matapelajaran.index');
        Route::get('/matapelajaran/create', 'create')->name('matapelajaran.create');
        Route::post('/matapelajaran/store', 'store')->name('matapelajaran.store');
        Route::get('/matapelajaran/edit/{id}', 'edit')->name('matapelajaran.edit');
        Route::put('/matapelajaran/update/{id}', 'update')->name('matapelajaran.update');
        Route::delete('/matapelajaran/delete/{id}', 'destroy')->name('matapelajaran.destroy');
    });

});

// Teacher
Route::group(['prefix' => 'teacher', 'middleware' => [ 'auth','teacher']], function() {
    Route::controller(TeacherController::class)->group(function () {

        Route::get('/', 'teacher_index')->name('teacher.index');



    });
    Route::controller(KelasController::class)->group(function () {

        Route::get('/kelas', 'kelas_teacher_index')->name('teacher.kelas.index');
        Route::get('/kelas/{id}', 'kelas_show')->name('teacher.kelas.show');
        Route::get('/kelas/{id}/murid', 'murid_show')->name('teacher.kelas.murid');
        Route::get('/kelas/{id}/tes', 'tes')->name('tes');


    });
    Route::controller(TesController::class)->group(function () {
        Route::get('/tes/{id}/create', 'create')->name('create.tes');
        Route::post('/tes/store', 'store')->name('store.tes');
        Route::get('/tes/{id}/edit', 'edit')->name('edit.tes');
        Route::put('/tes/{tes}', 'update')->name('tes.update');
        Route::delete('/tes/{tes}', 'destroy')->name('tes.destroy');
        Route::get('/tes/{id}/hasil','hasil')->name('tes.hasil');
        Route::get('/tes/hasil/details/{id}','hasil_detail')->name('tes.hasil.detail');

    });

});
// Student
Route::group(['prefix' => 'student', 'middleware' => [ 'auth','student']], function() {
    Route::controller(StudentController::class)->group(function () {

        Route::get('/', 'student_dashboard')->name('student.index');



    });
    Route::controller(MataPelajaranController::class)->group(function () {

        Route::get('/mata-pelajaran', 'index_for_student')->name('matapelajaran.index');
        Route::get('/mata-pelajaran/{id}', 'mapel_show')->name('matapelajaran.show');

    });
    Route::controller(TesController::class)->group(function () {
        Route::get('/tes/{id}/show', 'student_tes')->name('student.tes');
        Route::get('/tes/{id}/start', 'mulai_tes')->name('kerjakan.tes');


    });
    Route::controller(JawabanController::class)->group(function () {
        Route::post('/tes/scoring',  'scoring')->name('scoring');
        Route::get('/tes/{id}/show/detail',  'detail_tes')->name('student.detail.tes');
    });


});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/essay', [EssayController::class, 'index'])->name('essay.index');
Route::post('/essay/score', [EssayController::class, 'score'])->name('essay.score');



require __DIR__.'/auth.php';
Route::get('/{page}', function () {
    return view('frontend.page-not-found');
});

<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\OnlineClassController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {
    // Route::get('register', [RegisteredUserController::class, 'create'])
    //             ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store'])->name('store');

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard'); 
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
    //             ->name('password.confirm');

    // Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

    Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('/course/store', [CourseController::class, 'store'])->name('course.store');
    Route::get('/course/list', [CourseController::class, 'getList'])->name('course.list');
    Route::get('/course/details/{id}', [CourseController::class, 'details'])->name('course.details');
    Route::get('/course/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
    Route::post('/course/update/{id}', [CourseController::class, 'update'])->name('course.update');
    
    Route::get('/class/create', [OnlineClassController::class, 'create'])->name('class.create');
    Route::post('/class/store', [OnlineClassController::class, 'store'])->name('class.store');
    Route::get('/class/list', [OnlineClassController::class, 'getList'])->name('class.list');
    Route::get('/class/details/{id}', [OnlineClassController::class, 'details'])->name('class.details');
    Route::get('/class/edit/{id}', [OnlineClassController::class, 'edit'])->name('class.edit');
    Route::post('/class/update/{id}', [OnlineClassController::class, 'update'])->name('class.update');

    Route::get('/exam/create', [ExamController::class, 'create'])->name('exam.create');
    Route::post('/exam/store', [ExamController::class, 'store'])->name('exam.store');
    Route::get('/exam/list', [ExamController::class, 'getList'])->name('exam.list');
    Route::get('/exam/edit/{id}', [ExamController::class, 'edit'])->name('exam.edit');
    Route::get('/exam/details/{id}', [ExamController::class, 'details'])->name('exam.details');
    Route::post('/exam/update/{id}', [ExamController::class, 'update'])->name('exam.update');

    Route::get('/certificate/create', [CertificateController::class, 'create'])->name('certificate.create');
    Route::post('/certificate/store', [CertificateController::class, 'store'])->name('certificate.store');
    Route::get('/certificate/list', [CertificateController::class, 'getList'])->name('certificate.list');
    Route::get('/certificate/edit/{id}', [CertificateController::class, 'edit'])->name('certificate.edit');
    Route::get('/certificate/details/{id}', [CertificateController::class, 'details'])->name('certificate.details');
    Route::post('/certificate/update/{id}', [CertificateController::class, 'update'])->name('certificate.update');

    Route::get('/assignment/create', [AssignmentController::class, 'create'])->name('assignment.create');
    Route::post('/assignment/store', [AssignmentController::class, 'store'])->name('assignment.store');
    Route::get('/assignment/list', [AssignmentController::class, 'getList'])->name('assignment.list');
    Route::get('/assignment/edit/{id}', [AssignmentController::class, 'edit'])->name('assignment.edit');
    Route::get('/assignment/details/{id}', [AssignmentController::class, 'details'])->name('assignment.details');
    Route::put('/assignment/update/{id}', [AssignmentController::class, 'update'])->name('assignment.update');
    Route::delete('/assignment/delete/{id}', [AssignmentController::class, 'delete'])->name('assignment.delete');

    Route::get('/enrollment/create', [EnrollmentController::class, 'create'])->name('enrollment.create');
    Route::post('/enrollment/store', [EnrollmentController::class, 'store'])->name('enrollment.store');
    Route::get('/enrollment/list', [EnrollmentController::class, 'getList'])->name('enrollment.list');
    Route::get('/enrollment/edit/{id}', [EnrollmentController::class, 'edit'])->name('enrollment.edit');
    Route::get('/enrollment/details/{id}', [EnrollmentController::class, 'details'])->name('enrollment.details');
    Route::put('/enrollment/update/{id}', [EnrollmentController::class, 'update'])->name('enrollment.update');
    Route::delete('/enrollment/delete/{id}', [EnrollmentController::class, 'delete'])->name('enrollment.delete');

    Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/payment/list', [PaymentController::class, 'getList'])->name('payment.list');
    Route::get('/payment/edit/{id}', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::get('/payment/details/{id}', [PaymentController::class, 'details'])->name('payment.details');
    Route::put('/payment/update/{id}', [PaymentController::class, 'update'])->name('payment.update');
    Route::delete('/payment/delete/{id}', [PaymentController::class, 'delete'])->name('payment.delete');
});

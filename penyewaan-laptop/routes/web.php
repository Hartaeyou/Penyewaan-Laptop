<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Profile\profileController;
use App\Http\Controllers\Peminjamanan\loanController;
use App\Http\Controllers\dashboard\dashboardUserController;
use App\Http\Controllers\PDFcontroller;
use App\Http\Controllers\dashboard\dashboardAdminController;
use App\Http\Controllers\Peminjamanan\HistoryPeminjamanController;


// Route::middleware(['middleware' => 'adminLoggedIn'])->group(function () {
    
// });
// Route::middleware(['middleware' => 'userLoggedIn'])->group(function () {
    
// });


Route::middleware(['user', 'userLoggedIn'])->group(function () {    
    Route::get('/dashboardUser', [dashboardUserController::class, 'dashboardUser'])->name('dashboardUser');
    Route::post('/profile/{id}', [profileController::class, 'updateUser'])->name('updateUser');
    Route::get('/profile/{id}/delete', [profileController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/loan', [loanController::class, 'viewPeminjaman'])->name('loan');
    Route::post('/loan/{id}', [loanController::class, 'peminjaman'])->name('peminjaman');
    Route::get('/loan/history', [HistoryPeminjamanController::class, 'index'])->name('loan.history');
    Route::get('/returnLaptop/{id}', [loanController::class,'returnLaptop'])->name('returnLaptop');
    
});


Route::middleware(['admin' ])->group(function () {    
    Route::get('/dashboardAdmin', [dashboardAdminController::class, 'dashboardAdmin'])->name('dashboardAdmin');
    Route::get('/dashboardUnit', [dashboardAdminController::class, 'dashboardUnit'])->name('dashboardUnit');
    Route::get('/addUnit', [dashboardAdminController::class, 'viewAddUnit'])->name('viewAddUnit');
    Route::post('/addUnit', [dashboardAdminController::class, 'addUnit'])->name('addUnit');
    Route::get('/deleteUnit/{id}', [dashboardAdminController::class, 'deleteUnit'])->name('deleteUnit');
    Route::get('/viewEditUnit/{id}', [dashboardAdminController::class, 'viewEditUnit'])->name('viewEditUnit');
    Route::put('/updateUnit/{id}', [dashboardAdminController::class, 'updateUnit'])->name('updateUnit');
    Route::get('/viewLoan', [dashboardAdminController::class, 'viewLoan'])->name('viewLoan');
    Route::get('/approveLoan/{id}', [LoanController::class, 'approveLoan'])->name('approveLoan');
    Route::get('/rejectedLoan/{id}', [LoanController::class, 'rejectedLoan'])->name('rejectedLoan');
    Route::get('/viewReturnUnit/{id}', [LoanController::class, 'viewReturnUnit'])->name('viewReturnUnit');
    Route::get('/approveReturnLaptop/{id}', [LoanController::class, 'approveReturnLaptop'])->name('accReturn');
    Route::post('/penaltyFee/{loan_id}', [LoanController::class, 'calculatePenaltyFee'])->name('penaltyFee');
    Route::get('/pdf/{id}', [PDFcontroller::class, 'pdfView'])->name('pdfView');
});



// Route Admin
Route::post('/adminLogin', [AuthController::class, 'loginAdmin'])->name('adminLogin');
Route::post('/login', [AuthController::class, 'loginUser'])->name('loginUser');
Route::post('/register', [AuthController::class, 'registerUser'])->name('registerUser');


// Route User
Route::middleware(['userLoggedIn' ])->group(function () {    
    Route::get('/', [AuthController::class, 'viewLoginUser'])->name('viewLoginUser');
    Route::get('/admin', [AuthController::class, 'viewLoginAdmin'])->name('viewLoginAdmin');
    Route::get('/register', [AuthController::class, 'viewRegisterUser'])->name('viewRegisterUser');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

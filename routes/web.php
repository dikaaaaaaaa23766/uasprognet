<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GeneralArticleController;
use App\Http\Controllers\HealthFacilityController; // Ditambahkan
use App\Http\Controllers\MedicalGuideController;
use App\Http\Controllers\ProfileController;
use App\Models\GeneralArticle;
use App\Models\MedicalGuide;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- RUTE PUBLIK (Bisa diakses oleh semua pengunjung) ---

Route::get('/', function () {
    // Mengambil 4 artikel terbaru untuk ditampilkan di halaman utama
    $generalArticles = GeneralArticle::latest()->take(4)->get();

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'generalArticles' => $generalArticles,
    ]);
})->name('welcome');

Route::get('/panduan-medis', [MedicalGuideController::class, 'index'])->name('medical-guide.index');

// Rute untuk menampilkan detail "Artikel Umum" dari halaman utama (Welcome)
Route::get('/artikel/{article:slug}', [GeneralArticleController::class, 'show'])->name('general-article.show');

// Rute baru untuk halaman Fasilitas Kesehatan Terdekat
Route::get('/fasilitas-kesehatan', [HealthFacilityController::class, 'index'])->name('facilities.index');


// --- RUTE YANG MEMERLUKAN LOGIN ---

Route::middleware(['auth', 'verified'])->group(function () {
    // Rute untuk Dashboard
    Route::get('/dashboard', function () {
        $guides = MedicalGuide::with(['submenus.articles'])
                                ->orderBy('title', 'asc')
                                ->get();

        return Inertia::render('Dashboard', [
            'guides' => $guides,
        ]);
    })->name('dashboard');

    // Rute untuk menampilkan detail "Panduan Medis" dari dashboard
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('article.show');

    // Rute untuk profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Rute otentikasi dari Breeze
require __DIR__.'/auth.php';
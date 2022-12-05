<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AboutController,
    AddressController,
    CategoryController,
    ContactController,
    DashboardController,
    DonationController,
    EventController,
    PagesController,
    PermissionController,
    PostController,
    ProfileController,
    RoleController,
    SermonController,
    SettingController,
    SubscribeController,
    UserController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [PagesController::class, 'index'])->name('page.index');
Route::get('/about-us', [PagesController::class, 'aboutus'])->name('page.about');
Route::get('/sermon', [PagesController::class, 'sermon'])->name('page.sermon');
Route::get('/sermon/{slug}', [PagesController::class, 'sermonshow'])->name('page.sermonshow');
Route::get('/event', [PagesController::class, 'event'])->name('page.event');
Route::get('/event/{slug}', [PagesController::class, 'eventshow'])->name('page.eventshow');
Route::get('/blog', [PagesController::class, 'blog'])->name('page.blog');
Route::get('/blog/{slug}', [PagesController::class, 'blogshow'])->name('page.blogshow');
Route::get('/contact-us', [PagesController::class, 'contactus'])->name('page.contact');
Route::get('/giving-and-donations', [PagesController::class, 'donation'])->name('page.donation');

Route::post('subscriber', [SubscribeController::class, 'store'])->name('subscriber.store');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

Auth::routes(['register'=>false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('settings', [SettingController::class, 'index'])->name('settings');
    Route::resource('subscriber', SubscribeController::class)->only(['index', 'destroy']);
    Route::resource('contact', ContactController::class)->only(['index', 'show', 'destroy']);
    Route::resource('profile', ProfileController::class)->only('index', 'update');
    Route::resource('address', AddressController::class);
    Route::resource('donations', DonationController::class);
    Route::resource('about', AboutController::class);

    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('events', EventController::class);
    Route::resource('sermons', SermonController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

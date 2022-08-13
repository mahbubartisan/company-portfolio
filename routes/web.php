<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;
use App\Models\About;
use App\Models\Brand;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $brands = Brand::all();
    $abouts = About::latest()->first();
    $services = Service::all();

    return view ('home', compact('brands','abouts', 'services'));
});

// Route::get ('/about', function (){

//     return view ('about');

// })->name('about');


// Route::get('/contact', function () {

//     return View ('contact');

// });


Route::get('/contact', [ContactController::class, 'show'])->name('contact');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // $users = User::all();
        return view('admin.index');
    })->name('dashboard');


});


Route::get('/category/show', [CategoryController::class, 'index'])->name('categories');

Route::post('/category/add', [CategoryController::class, 'store'])->name('add.category');

Route::get('category/edit/{id}', [CategoryController::class, 'edit']);

Route::post('/category/update/{id}', [CategoryController::class, 'update']);

Route::get('category/trash/{id}', [CategoryController::class, 'softdelete']);

Route::get('category/restore/{id}', [CategoryController::class, 'restore']);

Route::get('category/delete/{id}', [CategoryController::class, 'delete']);

// Brands Route

Route::get('brands/show', [BrandController::class, 'brands'])->name('brands');

Route::post('brand/add', [BrandController::class, 'storebrand'])->name('add.brand');

Route::get('brand/edit/{id}', [BrandController::class, 'edit']);

Route::post('/brand/update/{id}', [BrandController::class, 'update']);

Route::get('brand/delete/{id}', [BrandController::class, 'delete']);

// Multiple Images

Route::get('/gallery/images', [BrandController::class, 'images'])->name('gallery.images');
Route::post('/store/multiple/images', [BrandController::class, 'storeimages'])->name('add.images');

Route::get('user/logout', [BrandController::class, 'logout'])->name('logout');

// Slider Routes

Route::get('/show/slider', [SliderController::class, 'ShowSlider'])->name('show.slider');
Route::post('/add/slider', [SliderController::class, 'CreateSlider'])->name('add.slider');
Route::get('/slider/edit/{id}', [SliderController::class, 'EditSlider']);
Route::post('/brand/update/{id}', [SliderController::class, 'UpdateSlider']);

// About Us Routes

Route::get('show/about', [AboutController::class, 'ShowAbout'])->name('about');
Route::post('add/about', [AboutController::class, 'AddAbout'])->name('add.about');
Route::get('about/edit/{id}', [AboutController::class, 'EditAbout']);
Route::post('update/about', [AboutController::class, 'UpdateAbout'])->name('add.about');
Route::get('about/delete/{id}', [AboutController::class, 'DeleteAbout']);


// Service Routes
Route::get('show/service', [ServiceController::class, 'ShowServices'])->name('service');
Route::post('add/service', [ServiceController::class, 'AddServices'])->name('add.service');
Route::get('edit/service/{id}', [ServiceController::class, 'EditServices']);
Route::post('update/service/{id}', [ServiceController::class, 'UpdateServices']);
Route::get('delet/service/{id}', [ServiceController::class, 'DeleteServices']);

// Contact Routes
Route::get('show/contact/', [ContactController::class, 'ShowContact'])->name('admin.contact');
Route::post('add/contact/', [ContactController::class, 'AddContact'])->name('add.contact');
Route::get('edit/contact/{id}', [ContactController::class, 'EditContact']);
Route::post('update/contact/{id}', [ContactController::class, 'UpdateContact']);
Route::get('delete/contact/{id}', [ContactController::class, 'DeleteContact']);

//Home Contact Routes

Route::get('/contact', [ContactController::class, 'HomeContactPage'])->name('contact');

// Change Password Routes

Route::get('change/password', [ChangePassword::class, 'ShowPassword'])->name('change.password');
Route::post('update/password', [ChangePassword::class, 'UpdatePassword'])->name('update.password');

// User Profile Routes
Route::get('user/profile', [ChangePassword::class, 'ShowProfile'])->name('user.profile');
Route::post('update/user/profile', [ChangePassword::class, 'UpdateProfile'])->name('update.user.profile');
<?php

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

Route::get('/', function () {
    return view('auth/login');
});


Route::get('/admin-panel', function (){
    return view('add-user');
});



Route::post('/add-user', function (Request $request) {
    $name = $request->input('name');

    // TODO: Add logic to execute command to add new admin on server using $name variable

    Artisan::call('command:add-user', [
        'name' => $name,
    ]);

    return redirect('/admin-panel');
})->name('add-admin');


Route::get('/recordings', function () {
    $recordingsDirectory = storage_path('app/recordings');
    $recordings = File::allFiles($recordingsDirectory);

    return view('recordings', [
        'recordings' => $recordings
    ]);
});

Route::get('/recordings/{filename}', function ($filename) {
    $recordingsDirectory = storage_path('app/recordings');
    $filePath = $recordingsDirectory . '/' . $filename;

    $headers = [
        'Content-Type' => 'video/mp4'
    ];

    return Response::file($filePath, $headers);
})->name('play-recording');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

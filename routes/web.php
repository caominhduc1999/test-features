<?php

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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Chatify
//localhost:8000/chatify

//PDF
Route::get('pdf_form', 'PdfController@pdfForm');
Route::post('pdf_download', 'PdfController@pdfDownload');

//upload image
Route::get('/upload-images', 'UploadImagesController@create');
Route::post('/images-save', 'UploadImagesController@store');
Route::post('/images-delete', 'UploadImagesController@destroy');
Route::get('/images-show', 'UploadImagesController@index');

//multi column search datatable


Route::get('datatable','UserController@index');

Route::group(['middleware' => 'HtmlMinifier'], function (){
    Route::get('users', 'UserController@index');
    Route::get('users-list', 'UserController@usersList');
});

Route::get('file-manager', 'FileManagerController@index');

Route::get('hi', function (){
   return "hi";
});

//dùng để view notification được nhận từ pusher
Route::get('/', function () {
    return view('showNotification');
});

//dùng để get view submit form
Route::get('getPusher', function (){
    return view('form_pusher');
});

//dùng để handle sự kiện submit form và push thông tin vào event pusher.
Route::get('/pusher', function(Illuminate\Http\Request $request) {
    event(new App\Events\HelloPusherEvent($request));
    return redirect('getPusher');
});

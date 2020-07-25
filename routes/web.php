<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Citizen;
use App\Complaint;
use App\Http\Controllers;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/complaint/{id}/complaint', 'ComplaintController@status');



// Route::get('/citizen/{id}/complaint',function($id){
//     $citizen = Citizen::find($id);
//     foreach( $citizen->complaints as $compliant){
//         echo $compliant;
//     }
// });

Route::get('/complaints','ComplaintController@index');


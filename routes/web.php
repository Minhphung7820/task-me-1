<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
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

Route::get('/', function (Request $request) {
    // if (User::check_number("FS")) {
    //     echo "Đây là số !";
    // } else {
    //     echo "Đây không phải là số !";
    // }
    // 
    // $data = User::getDetail("6411998b706dc1fed60bc750");
    // printf($data);
    // 
    // $user = new User();
    // $arr = $user->test();
    // echo "<pre>";
    // print_r($arr);
    // echo "</pre>";
    // echo  app("test1")->increase() . "</br>";
    // echo  app("test1")->increase() . "</br>";
    // echo  app("test1")->increase() . "</br>";
    // echo "=================================</br>";
    // echo  app("test2")->increase() . "</br>";
    // echo  app("test2")->increase() . "</br>";
    // echo  app("test2")->increase() . "</br>";
    // $ctr = new UserController();
    // echo get_class($ctr->increase());
    // return view('welcome');
    // echo _TEXT_;
});
// Route::get('/get-user', function () {
//     $data = User::getByEmail("tmpdz7820@gmail.com");
//     $data_2 = User::getDetail("6411771c706dc1fed60bc743");
//     printf($data);
//     echo "</br>";
//     printf($data_2);
// });
Route::get('/allUser',[UserController::class,'index']);

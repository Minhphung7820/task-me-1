<?php

use App\Exceptions\TransactionException;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
// rrrfgrgrgsegsgsegsg
Route::prefix("user")->group(function () {
    Route::post('/add', function (Request $request) {
        $session = DB::getMongoClient()->startSession();
        $session->startTransaction();
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'created_at' => now()
            ]);
            echo "Đã thêm !";
            $session->commitTransaction();
        } catch (TransactionException $e) {
            $e->handle($request);
            $session->abortTransaction();
        }
    });
});

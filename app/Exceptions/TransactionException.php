<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class TransactionException extends Exception
{
    public function handle(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(['success' => false, 'status' => 500, 'message' => 'Opps , Someone is taking this action !']);
        }
        return abort(500);
    }
}

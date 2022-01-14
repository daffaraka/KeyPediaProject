<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changePassword(UpdatePasswordRequest $request) {
        
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route();
    }
}

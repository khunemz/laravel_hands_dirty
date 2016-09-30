<?php

namespace App\Http\Controllers\Traits;
use App\Flyer;
use Illuminate\Http\Request;
trait AuthorizesUsers
{

    protected function unauthorized(Request $request)
    {
        if ($request->ajax()) {
            return response(['message' => 'No authorize hah'], 403);
            }
        flash('No , way');
        return redirect('/');
    }
}
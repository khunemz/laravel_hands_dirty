<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;

abstract class Controller extends BaseController
{
  protected $user;
    use DispatchesJobs, ValidatesRequests;
    function __construct()
    {
      $this->user = Auth::user();
      view()->share('signedIn', Auth::check());
      view()->share('user', $this->user);
    }
}

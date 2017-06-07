<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class EmailController extends Controller
{
  public function show($id) {

    return 'test show '.$id;
  }
}

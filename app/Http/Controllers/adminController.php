<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\admin;

class adminController extends Controller
{
  // public function create(Request $req)
  // {
  //   admin::create(['username' => 'a', 'password' => 'a']);
  //    echo "admin create 2";
  // }

  public function getFirst()
  {
    $admin = admin::first();
    dd($admin);
  }
}

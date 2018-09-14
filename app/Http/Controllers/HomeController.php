<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
  public function __construct()
  {

  }

  public function index()
  {
       $data['subTitle']="Home";
       return view('pages/home',$data);
  }

}

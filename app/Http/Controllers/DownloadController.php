<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function downloadApk(){
      return response()->download(storage_path("app/public/Kordz.zip"));
    }
}

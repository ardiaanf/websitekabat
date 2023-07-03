<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class homeController extends Controller
{
    public function index (){
    //   $pengumuman = $this->getPengumuman();

        return view('frontends.a');
    }
    // private function getPengumuman()
    // {
    //     return pengumuman::latest()->take(3)->get();
    // }
}

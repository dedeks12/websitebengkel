<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;


class HitungController extends Controller
{
    public function index()
    {
        //get upload
        //$upload = upload::latest()->paginate(5);
        //$upload = upload::where('status','Pending')::count();
        $count = Upload::where('status','Pending')->get()->count();

        //render view with upload
        return view('app', compact('count'));
    }
}
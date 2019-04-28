<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function uploadFile(){
        return view('uploadfile');
    }

    public function uploadFilePost(Request $request){
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'fuel' => 'required',
            'price' =>  'required|regex:/^\d+(\.\d{1,2})?$/',
            'fileToUpload' => 'required|file|max:1024',
        ]);

        $request->fileToUpload->store('logos');

        return back()
            ->with('success','You have successfully upload image.');

    }
}

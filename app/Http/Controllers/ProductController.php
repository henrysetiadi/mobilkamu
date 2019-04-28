<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Post;

class ProductController extends Controller
{
    //
    public function index()
    {
    	$product = Product::all();

    	return view('product',compact('product'));
    	//return view('home');
    }

    public function uploadFile(){
        return view('uploadfile');
    }

    public function uploadFilePost(Request $request){

        //validate form
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'fuel' => 'required',
            'price' =>  'required|regex:/^\d+(\.\d{1,2})?$/',
            'length' => 'required',
            'width' => 'required',
            'height' => 'required',
            'fileToUpload' => 'required|file|max:1024',
        ]);

        //get data file image
        $files = $request->file('fileToUpload');
        //get name of file image
        $imageName = $files->getClientOriginalName();

        //save to public folder
        $files->move(public_path('images'),$imageName);

        //initial product
        $product = new Product();
        $product->brand = $request['brand'];
        $product->model = $request['model'];
        $product->fuel = $request['fuel'];
        $product->price = $request['price'];
        $product->length = $request['length'];
        $product->width = $request['width'];
        $product->height = $request['height'];
        $product->fileToUpload = $imageName;

        
        //save product to db
        $product->save();

        //$request->fileToUpload->store('logos');

        /*return back()
            ->with('success','You have successfully upload image.');*/

        return redirect()->route('dashboard');

    }

    public function detail($id)
    {
        
        $product = Product::find($id);

        $post = Post::find($id);
        

        return view('product_detail',['product' => $product]);
    }

    public function create_postcomment()
    {
        return view('posts.create');
    }

    public function store_postcomment(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);
    
        Post::create($request->all());
    
        return redirect()->route('posts.index');
    }
}

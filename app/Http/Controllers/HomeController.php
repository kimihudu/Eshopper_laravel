<?php

namespace App\Http\Controllers;

use App\Brands;
use App\Categorys;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;


class HomeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    
    public function __construct() {
        return view('front.home');
        // $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $prods = Products::all();//paginate(6);
        $cats = Categorys::all();
        $brands = Brands::all();
        
        $data = array(
        "prods"  => $prods,
        "cats"   => $cats,
        "brands" => $brands);
        
        // app('debugbar')->info($data);
        return view('front.home',compact('data'));
    }
    
    public function search(Request $request) {
        $search = $request->search_data;
        if ($search == '') {
            return view('front.home');
        } else {
            $Products = Products::all()->where('name', 'like', '%' . $search . '%')->paginate(12);
            return view('front.shop', ['msg' => 'Results: ' . $search], compact('Products'));
        }
    }
    
    Public function product_details($id) {
        //insert command for views
        // if(Auth::check()){
        //     $recommends = new recommends;
        //     $recommends->uid = Auth::user()->id;
        //     $recommends->pro_id = $id;
        //     $recommends->save();
        // }
        
        
        //view product details
        $Products = Products::find($id);//Products::where('id', $id)->get();
        
        return view('front.product_details', compact('Products'));
    }
    
    public function shop(Request $request) {
        if ($request->ajax() && isset($request->start)) {
            $start = $request->start; // min price value
            $end = $request->end; // max price value
            
            $prods = Products::all()
            ->where('price', '>=', $start)->where('price', '<=', $end)->orderby('price', 'ASC')->paginate(6);
            
            response()->json($Products); //return to ajax
            return view('front.products', compact('prods'));
        }
        else if(isset($request->brand)){
            
            $brand = $request->brand; //brand
            
            $prods = Products::whereIN('cat_id', explode( ',', $brand ))->paginate(6);
            response()->json($Products); //return to ajax
            return view('front.products', compact('prods'));
            
        }
        else {
            
            $prods = Products::all(); // now we are fetching all products
            
            return view('front.shop', compact('prods'));
        }

        // $prods = Products::all();
        // return view('front.shop',compact('prods'));
    }

    function login(){

        return view('auth.login');
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
}
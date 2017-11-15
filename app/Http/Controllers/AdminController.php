<?php

namespace App\Http\Controllers;
use App\Products;
use App\Categorys;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    
    public function index() {
        
        
        return view('admin.index');
    }
    public function addpro_form(){
        
        $cat_data = Categorys::all();
        
        return view('admin.home', compact('cat_data'));
    }
    
    public function add_product(Request $request) {
        
        // dd($request);
        // app('debugbar')->info($request);
        $file = $request->file('pro_img');
        $filename = $file->getClientOriginalName();
        
        $path = 'upload/images';
        $file->move($path, $filename);
        
        $products = new Products;
        $products->name = $request->pro_name;
        // $products->id = $request->cat_id;
        $products->code = $request->pro_code;
        $products->price = $request->pro_price;
        $products->info = $request->pro_info;
        $products->price = $request->spl_price;
        $products->img = $path.'/'.$filename;
        $products->save();
        
        // dd($products);
        
        $cat_data = Categorys::all();
        
        return view('admin.home', compact('cat_data'));
        
        //  return redirect()->action('AdminController@index')->with('status', 'Product Uploaded!');
    }
    
    public function view_products() {
        
        $Products = Products::all(); // now we are fetching all products
        
        return view('admin.products', compact('Products'));
    }
    
    public function add_cat() {
        
        return view('admin.addCat');
    }
    
    // add cat
    public function catForm(Request $request) {
        //echo $request->cat_name;
        //return 'update query here';
        $pro_cat = new Categorys;
        
        $pro_cat->name = $request->cat_name;
        $pro_cat->status = '0'; // by defalt enable
        $pro_cat->save();
        
        $cats = Categorys::all()->orderby('_id', 'DESC')->get();
        
        return view('admin.categories', compact('cats'));
    }
    
    // edit form for cat
    public function CatEditForm(Request $request) {
        $catid = $request->id;
        $cats = Categorys::where('_id', $catid)->get();
        return view('admin.CatEditForm', compact('cats'));
    }
    
    //update query to edit cat
    public function editCat(Request $request) {
        
        $catid = $request->id;
        $catName = $request->cat_name;
        $status = $request->status;

        Categorys::where('_id', $catid)->update(['name' => $catName, 'status' => $status]);
        
        $cats = Categorys::all();
        
        return view('admin.categories', compact('cats'));
    }
    
    public function view_cats() {
        
        $cats = Categorys::all();
        
        return view('admin.categories', compact('cats'));
    }
    
    public function ProductEditForm($id) {
        //$pro_id = $reqeust->id;
        $Products = Products::where('_id', '=', $id)->get(); // now we are fetching all products
        return view('admin.editPproducts', compact('Products'));
    }
    
    public function editProduct(Request $request) {
        
        // dd($request);
        $proid = $request->id;
        
        $pro_name = $request->pro_name;
        $cat_name = $request->cat_name;
        $pro_code = $request->pro_code;
        $pro_price = $request->pro_price;
        $pro_info = $request->pro_info;
        $spl_price = $request->spl_price;
        if($request->new_arrival =='NULL'){
            $new_arrival = '1';
        }else {
            $new_arrival = $request->new_arrival;
        }
        
        Products::where('id', $proid)->update([
        'name' => $pro_name,
        'cat_name' => $cat_name,
        'code' => $pro_code,
        'price' => $pro_price,
        'info' => $pro_info,
        'spl_price' => $spl_price,
        'new_arrival' => $new_arrival
        
        ]);
        
        
        return redirect('/products');
        //$Products = DB::table('pro_cat')->rightJoin('products','products.cat_id', '=', 'pro_cat.id')->get(); // now we are fetching all products
        //return view('admin.products', compact('Products'));
    }
    
    public function ImageEditForm($id) {
        $Products = Products::where('_id', '=', $id)->get(); // now we are fetching all products
        // dd($Products);
        return view('admin.ImageEditForm', compact('Products'));
    }
    
    public function editProImage(Request $request) {
        
        $proid = $request->id;
        
        $file = $request->file('new_image');
        // $file = $request->file('pro_img');
        
        $filename = time() . '.' . $file->getClientOriginalName();
        
        $path = 'upload/images';
        $file->move($path, $filename);
        
        // $S_path = 'upload/images/small';
        // $M_path = 'upload/images/medium';
        // $L_path = 'upload/images/large';
        
        // $img = Image::make($file->getRealPath());
        //$img->crop(300, 150, 25, 25);
        // $img->resize(100, 100)->save($S_path . '/' . $filename);
        // $img->resize(500, 500)->save($M_path . '/' . $filename);
        // $img->resize(1000, 1000)->save($L_path . '/' . $filename);
        
        
        
        // $file->move($path, $filename);
        
        // dd($img);
        Products::where('id', $proid)->update(['img' => $path."/".$filename]);
        return redirect('/products');
        //echo 'done';
        //  $Products = Products::get(); // now we are fetching all products
        //  return view('admin.products', compact('Products'));
    }
    
    //for delete cat
    public function deleteCat($id) {
        
        //echo $id;
        // DB::table('pro_cat')->where('id', '=', $id)->delete();
        
        Categorys::destroy($id);
        $cats = Categorys::all();
        
        return view('admin.categories', compact('cats'));
    }
    
    //for delete cat
    public function deleteProd($id) {
        
        Products::destroy($id);
        // dd($id);
        return redirect('/products');
    }
    
    public function sumbitProperty(Request $request){
        
        $properties = new products_properties;
        $properties->pro_id = $request->pro_id;
        $properties->size = $request->size;
        $properties->color = $request->color;
        $properties->p_price = $request->p_price;
        $properties->save();
        
        return redirect('/admin/ProductEditForm/'.$request->pro_id);
        
    }
    
    public function editProperty(Request $request){
        $uptProts = DB::table('products_properties')
        ->where('pro_id', $request->pro_id)
        ->where('id', $request->id)
        ->update($request->except('_token'));
        if($uptProts){
            return back()->with('msg', 'updated');
        }else {
            return back()->with('msg', 'check value again');
        }
    }
    
    public function addSale(Request $request){
        $salePrice = $request->salePrice;
        $pro_id = $request->pro_id;
        Products::where('id', $pro_id)->update(['spl_price' => $salePrice]);
        echo 'added successfully';
    }
    
    public function addAlt($id){
        $proInfo = Products::where('id', $id)->get();
        return view('admin.addAlt', compact('proInfo'));
    }
    
    public function submitAlt(Request $request){
        $file = $request->file('image');
        $filename  = time() . $file->getClientOriginalName(); // name of file
        
        $path = "public/img/alt_images";
        $file->move($path,$filename); // save to our local folder
        $proId = $request->pro_id;
        $add_lat = DB::table('alt_images')
        ->insert(['proId' => $proId, 'alt_img' => $filename, 'status' =>0]);
        return back();
    }
    
}
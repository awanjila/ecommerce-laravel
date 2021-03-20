<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\Product;
use App\Models\Category;
use App\Cart;

class ProductController extends Controller
{
	public function editproduct($id){
		$categories=Category::All()->pluck('category_name', 'category_name');
		$product=Product::find($id);
		return view('admin.editproduct')->with('product', $product)->with('categories', $categories);
	}



	public function products(){
		$categories=Category::All()->pluck('category_name', 'category_name');
		$products=Product::get();
		return view('admin.products')->with('products', $products)->with('categories', $categories);
	}


	

	public function updateproduct(Request $request){

		$this->validate($request, ['product_name'=> 'required',
									'product_price'=> 'required',
									'product_image'=>'image|nullable|max:1999']);

		$product= Product::find($request->input('id'));
					$product->product_name =$request->input('product_name');
					$product->product_price =$request->input('product_price');
					$product->product_category =$request->input('product_category');

		if($request->hasFile('product_image')){
			//1 : get filename with ext
				$fileNameWithExt = $request->file('product_image')->getClientOriginalName();

    		//2 : get just file name
				$fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

    		//3 : get just extension
				$extension = $request->file('product_image')->getClientOriginalExtension();

    		//4 : file name to store


				$fileNameToStore = $fileName.'_'.time().'.'.$extension;

    		//upload image
  
				$path =$request->file('product_image')->storeAs('public/product_images', $fileNameToStore);

				$old_image =Product::find($request->input('id'));

				if($old_image!='noimage.jpg'){
					Storage::delete('public/product_image/'.$old_image->product_image);

				}
				$product->product_image =$fileNameToStore;

		}
		
		$product->update();
		return redirect('/products')->with('status', 'The '.$product->product_name.' Product has been updated successfully');
	}

	public function addproducts(){
		$categories=Category::All()->pluck('category_name', 'category_name');

		return view('admin.addproducts')->with('categories', $categories);
	}

	public function delete($id){
		$product=Product::find($id);
    	$product->delete();

    	return redirect('/products')->with('status', 'The ' .$product->product_name.' Product has been deleted successfully');


	}

	public function saveproduct(Request $request){

		$this->validate($request, ['product_name'=> 'required',
									'product_price'=> 'required',
									'product_image'=>'image|nullable|max:1999']);

	

		if($request->input('product_category')){

			if($request->hasFile('product_image')){
    		//1 : get filename with ext
				$fileNameWithExt = $request->file('product_image')->getClientOriginalName();

    		//2 : get just file name
				$fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

    		//3 : get just extension
				$extension = $request->file('product_image')->getClientOriginalExtension();

    		//4 : file name to store


				$fileNameToStore = $fileName.'_'.time().'.'.$extension;

    		//upload image
  
				$path =$request->file('product_image')->storeAs('public/product_images', $fileNameToStore);

			}

			else{  

				$fileNameToStore ='noimage.jpg';

			}

					$product=new Product();
					$product->product_name =$request->input('product_name');
					$product->product_price =$request->input('product_price');
					$product->product_category =$request->input('product_category');
					$product->product_image =$fileNameToStore;
					
					$product->status =1;
					$product->save();

					return redirect('/addproducts')->with('status', 'The '.$product->product_name.' Product has been saved successfully');

		}

		else{
			return redirect('/addproducts')->with('status1', 'You need to select a Category for your product');

		}
		

	}

	public function activateproduct($id){
		$product=Product::find($id);

		$product->status=1;

		$product->update();

		return redirect('/products')->with('status', 'The '.$product->product_name.' Product has been activated successfully');
			

	}

	public function deactivateproduct($id){

		$product=Product::find($id);

		$product->status=0;

		$product->update();

		return redirect('/products')->with('status1', 'The '.$product->product_name.' Product has been De-activated successfully');
			
			
			

	}

	public function addToCart($id){
        $product = Product::find($id);

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect::to('/shop');
   

 }
}


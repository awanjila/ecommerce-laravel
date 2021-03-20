<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public function categories(){
    	$categories =Category::get();
    	return view('admin.categories')->with('categories', $categories);
    }

    public function savecategories(Request $request){
    	$this->validate($request, ['category_name'=> 'required']);
    	$checkcat = Category::where('category_name', $request->input('category_name'))->first();

    	$category = new Category();
    	if(!$checkcat){
    		$category->category_name = $request->input('category_name');
    		$category->save();

    		return redirect('/addcategories')->with('status', 'The '.$category->category_name.' Category has been saved successfully');

    	}else{
    		return redirect('/addcategories')->with('status1', 'The '.$request->input('category_name').' Category already exists');

    	}
    }

    public function addcategories(){
    	return view('admin.addcategories');
    }


    public function edit($id){

    	$category =Category::find($id);

    	return view('admin.editcategory')->with('category', $category);


    }
    public function delete($id){
    	$category=Category::find($id);
    	$category->delete();

    	return redirect('/categories')->with('status', 'The ' .$category->category_name.' Category has been deleted successfully');






   
    	
    }
}

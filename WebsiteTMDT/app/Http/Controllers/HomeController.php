<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Article;
use App\Models\Category;

class HomeController extends FrontendController
{
	public function __construct(){
		parent::__construct();
	}

    public function index()
    {
    	$productHot = Product::where([
    		'pro_hot' => Product::HOT_ON,
    		'pro_active' => Product::STATUS_PUBLIC
    	])->limit(5)->get();

    	$articleNews = Article::orderBy('id','DESC')->limit(6)->get();

        $categoriesHomes = Category::with('products')
            ->where('c_home',Category::STATUS_HOME)
            ->limit(3)
            ->get();

    	$viewData = [
    		'productHot' => $productHot,
    		'articleNews' => $articleNews,
            'categoriesHomes' => $categoriesHomes
    	];

        return view('home.index',$viewData);
    }

    public function renderProductView(Request $request){
        if($request->ajax()){
            $listID = $request->id;

            $productView = Product::whereIn('id',$listID)->get();
            $html = view('components.product_view',compact('productView'))->render();
            return response()->json(['data' => $html]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends FrontendController
{
    //
    public function __construct()
    {
        parent::__construct();
    }

    public function productDetail(Request $request,$id)
    {
    	$url = $request->segment(2);
    	$url = preg_split('/(-)/i', $url);

    	if($id = array_pop($url))
        {
    		$product = Product::find($id);

            $cateProduct = Category::find($product->pro_category_id);

            $ratings = Rating::with('user:id,name')
                ->where('ra_product_id',$id)
                ->orderBy('id',"DESC")
                ->paginate(10);

            $ratingDashboard = Rating::groupBy('ra_number')
                ->where('ra_product_id',$id)
                ->select(DB::raw('count(ra_number) as total'),DB::raw('sum(ra_number) as sum'))
                ->addSelect('ra_number')
                ->get()->toArray();

            $arrayRatings = [];

            if(!empty($ratingDashboard))
            {
                for($i=1; $i<=5; $i++)
                {
                    $arrayRatings[$i] = [
                        "total" => 0,
                        "sum" => 0,
                        "ra_number" => 0
                    ];

                    foreach ($ratingDashboard as $item) {
                        if($item['ra_number'] == $i)
                        {
                            $arrayRatings[$i] = $item;
                            continue;
                        }
                    }
                }
            }

    		$viewData = [
    			'product' => $product,
                'cateProduct' => $cateProduct,
                'ratings' => $ratings,
                'arrayRatings' => $arrayRatings
    		];

    		return view('product.detail',$viewData);
    	}
    	return redirect('/');
    }
}

<?php

namespace App\Http\Controllers\API_Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    private $jwt_key;
    public function __construct(){
        $this->jwt_key = "YYKPRvHTWOJ2DJaEPkXWiuGbAQpPmQ9x";
    }

    public function get_product_detail(Request $request)
    {
        $stat = true;
        try {
            $jwt = $request->token;
            $user_id = null;

            if ($jwt) {
                $decoded = JWT::decode($jwt, $this->jwt_key, array('HS256'));
                $user_id = $decoded->data->user_id;
            }
        }
        catch(Exception $e) {
            $stat = false;
        }
            
            $product_id = $request->product_id;
            $product = DB::table('view_product')->where('product_id',$product_id)->first();
            if ($product == null)
            {
                return response()->json(['status'=>false, 'message'=>"Product Doesn't exist"],200);
            }
            else {
                if ($product->product_active_status == "1") {
                    $store_id = $product->store_id;
                    

                    //
                    $product->rating = $product->average_rating;
                    // $product->sold = 0;
                    //
                    
                   

                   
                    
                    $product->price = $price;

                    $bag_count = DB::table('cart')
                                ->where("user_id" , $user_id)
                                ->where("product_id" , $product_id)
                                ->count();

                  
                    $store = DB::table('view_store_active')
                            ->where("store_id" , $store_id)
                            ->first();

                  
                    if ($stat) {
                        $count = DB::table('wishlist')
                                ->select('*')
                                ->where("user_id" , $user_id)
                                ->where("product_id" , $product_id)
                                ->count();
                        if ($count > 0) {
                            $wishlist_status = true;
                        }
                    }

                    return response()->json(['status'=>true, 'product_info'=>$product, 'store_info'=>$store, 'wishlist_status'=>$wishlist_status],200);
                }
                else {
                    return response()->json(['status'=>false, 'message'=>"Product NonActive"],200);
                }
            }
        
        
    }
}

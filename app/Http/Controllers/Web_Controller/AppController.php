<?php

namespace App\Http\Controllers\Web_Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
use \Firebase\JWT\JWT;
use \Exception;
use \stdClass;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\User;

class AppController extends Controller
{
    private $jwt_key;
    private $login_info;
    private $base_url = 'http://localhost/Project/api/';
    public function __construct(Request $request){
        $this->jwt_key = "YYKPRvHTWOJ2DJaEPkXWiuGbAQpPmQ9x";
    }

    private function get_login_info($jwt) {
        $login_status = true;
        $user_info = new stdClass();
        // $user_store_info = new stdClass();
        // $user_cart_info = new stdClass();
        // $notification = new stdClass();
        $client = new Client();
        if ($jwt) {
            try{
                // $decoded = JWT::decode($jwt, $this->jwt_key, array('HS256'));
                //$user_info = $decoded->data;
                $response = $client->post($this->base_url.'get_auth_user', [
                    'form_params' => [
                        'token' => $jwt
                    ]
                ]);
                $body = json_decode($response->getBody());
                $status = $body->status;
                if ($body->status != true) {
                    $login_status = false;
                }

                else {
                    $user_info = $body->result;
                } 
            }
            catch (Exception $e) {
                $login_status = false;
            }

            // try {
            //     $user_store = $client->post($this->base_url.'get_user_store', [
            //         'form_params' => [
            //             'token' => $jwt
            //         ]
            //     ]);
            //     $user_store_info = json_decode($user_store->getBody());
            // }
            // catch (Exception $e) {
            //     $login_status = false;
            // }

            // try {
            //     $user_cart = $client->post($this->base_url.'view_shopping_bag', [
            //         'form_params' => [
            //             'token' => $jwt
            //         ]
            //     ]);
            //     $user_cart_info = json_decode($user_cart->getBody());
            // }
            // catch (Exception $e) {
            //     $login_status = false;
            // }

            // try {
            //     $user_notification = $client->post($this->base_url.'get_notification', [
            //         'form_params' => [
            //             'token' => $jwt
            //         ]
            //     ]);
            //     $notification = json_decode($user_notification->getBody());
            // }
            // catch (Exception $e) {
            //     $login_status = false;
            // }
        }
        else {
            $login_status = false;
        }

        $result = new stdClass();
        $result->login_status = $login_status;
        $result->user_info = $user_info;
        // $result->user_store_info = $user_store_info;
        // $result->user_cart_info = $user_cart_info;
        // $result->notification = $notification;

        return $result;
    }

     public function index(Request $request)
    {
        set_time_limit(86400);
        $client = new Client();
        $jwt = $request->cookie('jwt');

        $login_info = $this->get_login_info($jwt);

        return view('pages.index', [                    
            // 'active_nav' => "",
            // 'all_product' => $product_info,
            'login_info' => $login_info]);
    }

     // public function search (Request $request)
     // {
        
     //     try {
     //         $jwt = $request->cookie('jwt');
 
     //         $login_info = $this->get_login_info($jwt);
     
     //         $product_name = $request->product_name;
     //         $client = new Client();
     //         $search = $client->post($this->base_url.'search', [
     //             'form_params' => [
     //                 'product_name' => $product_name
     //             ]
     //         ]);
     //         $result = json_decode($search->getBody());
     //         $collection = collect($result->product_info);

     //          $page = Input::get('page', 1);
     //        $perPage = 16;

     //         $search_result = new LengthAwarePaginator($collection->forPage($page, $perPage), $collection->count(), $perPage, $page, ['path'=>url('search')]);
 
     //         return view('pages.search',
     //            [
     //              'login_info' => $login_info,    
     //              'search_result' => $result,
     //              'search' => $search_result,
     //              'has_search' => "true"

     //            ]
     //        )->render();
     //     }
     //     catch (Exception $e) {
     //         echo $e->getMessage();
     //     }  
          
     // }
}

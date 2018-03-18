<?php

use Illuminate\Http\Request;
use App\Article;
use App\Category;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware(['api'])->group(function () {
    Route::get('/articles', function () {
        // Uses first & second Middleware
    	$data = Article::all();
    	if (count($data) !=null) {
    		# code...
    		$json = [
    			'status'=>'success',
    			'data'=>$data
    		];
    	}
    	else{
    		$json = [
    			'status'=>'failed'
    		];
    	}
    	return $json;
    });
    Route::get('/articles/{slug}', function ($slug) {
    	$data = Article::where('slug',$slug)->get();
    	if (count($data) !=null) {
    		# code...
    		$json = [
    			'status'=>'success',
    			'data'=>$data
    		];
    	}
    	else{
    		$json = [
    			'status'=>'failed'
    		];
    	}
    	return $json;
    });

    Route::get('/categories', function () {
        // Uses first & second Middleware

        $data= Category::all();
    	if (count($data) !=null) {
    		# code...
    		$json = [
    			'status'=>'success',
    			'data'=>$data
    		];
    	}
    	else{
    		$json = [
    			'status'=>'failed'
    		];
    	}
    	return $json;
    });    
    Route::get('/categories/{slug}', function ($slug) {
    	$data = Category::where('slug',$slug)->first();



    	if (count($data) !=null) {
    		# code...

    		 $articles = Article::where('category_id',$data->id)->get();
    		 if (count($articles) ==null) {

    		$json = [
    	    'status'=>'success',
    		'category'=>$data,
    			];
    		 }
    		 else{
    		$json = [
    	    'status'=>'success',
    		'category'=>$data,
    		'articles'=>$articles
    	];
    		 }

    	}
    	else{
    		$json = [
    			'status'=>'failed'
    		];
    	}
    	return $json;

    });

});
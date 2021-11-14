<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Blog;
use App\Models\Config;
use App\Models\Product;

class LandingController extends Controller
{
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function landing()
    {
        $blogs = Blog::paginate(10);
        $products = Product::with(['details'])->get();
        $config = Config::first();

        return view('welcome',compact(['blogs','config','products']));
    }
}

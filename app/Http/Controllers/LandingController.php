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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => 'required|email',
            ],[
                'title.required' => 'Email is required',
                'title.email' => 'Email is not valid',
            ]);

            $data = Subscription::create([
                'email' => $request->email
            ]);

            return redirect()->back()->with('message', 'Subscribe succeed '.$request->email.'!');
        } catch (Exception $e) {
            return redirect()->back()->with('erro_login', 'Subscribe failed!');
        }
    }

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

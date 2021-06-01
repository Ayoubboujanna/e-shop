<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



// use App\Models\Category;

class ProductController extends Controller
{
    //
    public function index()
    {

        // $products = Product::latest()->paginate(5);

        $products = Product::all();

        // $categories = Category::all();


        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function index_cli(Request $request)
    {

        $produits = Product::all()->where('id_category', "1");
        return view('products_category', ['produits' => $produits]);
    }

    public function index_cli1(Request $request)
    {
        $produits = Product::all()->where('id_category', "2");
        return view('products_category', ['produits' => $produits]);
    }

    public function index_cli2(Request $request)
    {
        $produits = Product::all()->where('id_category', "3");
        return view('products_category', ['produits' => $produits]);
    }

    public function index_cli3(Request $request)
    {
        $produits = Product::all()->where('id_category', "4");
        return view('products_category', ['produits' => $produits]);
    }

    public function index_cli4(Request $request)
    {
        $produits = Product::all()->where('id_category', "5");
        return view('products_category', ['produits' => $produits]);
    }

    public function index_cli5(Request $request)
    {
        $produits = Product::all()->where('id_category', "6");
        return view('products_category', ['produits' => $produits]);
    }


    public function create(Product $product)
    {
        return view('products.create', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'file_path' => 'required' // Only allow .jpg, .bmp and .png file types.
        ]);



        // ensure the request has a file before we attempt anything else.

        $request->file_path->store('product', 'public');
        $product = new Product();
        $product->title = $request->get('title');
        $product->price = $request->get('price');
        $product->id_category = $request->get('category');
        $product->description = $request->get('description');
        // $path = Storage::putFile('public', $request->file_path);
        // $url = Storage::url($path);
        $product->file_path =  $request->file_path->hashName();

        $product->save(); // Finally, save the record 


        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',

        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'products deleted successfully');
    }


    public function applyCoupon(Request $request)
    {
        // Session::forget('CouponAmount');
        // Session::forget('CouponCode');
        // if ($request->isMethod('post')) {
        //     $data = $request->all();
        //     // echo "<pre>";print_r($data);die;
        //     $couponCount = Promotion::where('code_promo', $data['code_promo'])->count();
        //     if ($couponCount == 0) {
        //         return redirect()->back()->with('flash_message_error', 'Coupon code does not exists');
        //     } else {
        //         // echo "Success";die;
        //         $couponDetails = Promotion::where('code_promo', $data['code_promo'])->first();


        //         //Coupon is ready for discount
        //         // $session_id = Session::get('session_id');

        //         if (Auth::check()) {
        //             $user_email = Auth::user()->email;
        //             $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();
        //         } else {
        //             $session_id = Session::get('session_id');
        //             $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();
        //         }
        //         $total_amount = 0;
        //         foreach ($userCart as $item) {
        //             $total_amount = $total_amount + ($item->price * $item->quantity);
        //         }
        //         //Check if coupon amount is fixed or percentage
        //         if ($couponDetails->amount_type == "Fixed") {
        //             $couponAmount = $couponDetails->amount;
        //         } else {
        //             $couponAmount = $total_amount * ($couponDetails->amount / 100);
        //             $coupon = intval($couponAmount);
        //             // echo $coupon;die;
        //         }
        //         //Add Coupon code in session
        //         Session::put('CouponAmount', $coupon);
        //         Session::put('CouponCode', $data['coupon_code']);
        //         return redirect()->back()->with('flash_message_success', 'Coupon Code is Successffully Applied.You are Availing Discount');
        //     }
        // }

        $code = $request->get('code');

        $coupon = Promotion::where('code_promo', $code)->first();

        if (!$coupon) {
            return redirect()->back()->with('error', 'Le coupon est invalide.');
        }

        $request->session()->put('coupon', [
            'code' => $coupon->code_promo,
            'remise' => $coupon->discount($request->total)
        ]);

        return redirect()->back()->with('success', 'Le coupon est appliqué.');
    }

}

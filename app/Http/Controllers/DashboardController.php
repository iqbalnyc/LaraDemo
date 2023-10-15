<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderDetail;
use App\Models\OrderMaster;
use App\Models\Product;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $orders_count;
    private $products_count;
    private $categories;
    public function __construct()
    {
        $this->orders_count = OrderMaster::count();
        $this->products_count = Product::count();
        $this->categories = Category::all();
    }

    public function admin() {
        return view('dashboard.admin', [
            'products_count' => $this->products_count,
            'orders_count' => $this->orders_count
        ]);
    }

    public function orders() {
        $orders = OrderMaster::all();

        return view('dashboard.orders', [
            'products_count' => $this->products_count,
            'orders_count' => $this->orders_count,
            'orders' => $orders
        ]);
    }

    public function products() {
        $products = Product::latest();
        return view('dashboard.products', [
            'products_count' => $this->products_count,
            'orders_count' => $this->orders_count,
            'products' => $products->simplePaginate(4)->withQueryString()
        ]);
    }

    public function orderDetail($id) {
        $order_detail = OrderDetail::where('orderId', '=', $id)->get();
        return view('dashboard.orderDetail', [
            'products_count' => $this->products_count,
            'orders_count' => $this->orders_count,
            'order_detail' => $order_detail
        ]);
    }

    public function productsEdit($id) 
    {
        $product = Product::find($id);
        return view('dashboard.productDetail', [
            'products_count' => $this->products_count,
            'orders_count' => $this->orders_count,
            'product' => $product
        ]);
    }
    public function productsUpdate(Request $request, $id) 
    {
        $attributes = request()->validate([
            'productImage' => 'image',
            'productName' => 'required',
            'productManu' =>  'required',
            'productPartNo' =>  'required',
            'productStatus' =>  'required',
            'productPrice' =>  'required'
        ]);

        if (isset($attributes['productImage'])) {
            request()->file('productImage')->store('public/thumbnails');
            $attributes['productImage'] = request()->file('productImage')->store('thumbnails');
        }
        $product = Product::find($id);
        $product->update($attributes);

        if ($product->update($attributes)) {
            return back()->with('successProduct', 'Product updated!');
        } else {
            $errors = $product->getErrors();
            return back()->with('successError', $errors);
        }
    }

    public function productDestroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return back()->with('success', 'Product has been Deleted');
    }

    public function addProduct()
    {
        return view('dashboard.addProduct', [
            'products_count' => $this->products_count,
            'orders_count' => $this->orders_count,
            'categories' => $this->categories
        ]);
    }

    public function addnewProduct(Request $request)
    {
        $attributes = request()->validate([
            'productName' => 'required',
            'productDesc' => 'required',
            'productImage' => 'required|image',
            'productManu' => 'required',
            'productPartNo' =>  'required',
            'productStatus' => 'required',
            'productPrice' => 'required'
        ]);

        request()->file('productImage')->store('public/thumbnails');
        $attributes['productImage'] = request()->file('productImage')->store('thumbnails');

        Product::create([
            'productCatId' => $request->productCatId,
            'productName' => $request->productName,
            'productDesc' => $request->productDesc,
            'productImage' => $attributes['productImage'],
            'productManu' => $request->productCatId,
            'productPartNo' => $request->productPartNo,
            'productStatus' => $request->productStatus,
            'productPrice' => $request->productPrice,
        ]);

        return back()->with('productAdded', 'Product has been added!');
    }

    public function orderUpdate(Request $request, $id) {

        $order = OrderDetail::findOrFail($id);
        $orderStatus = $request->input('orderStatus');
        $order->update(['orderStatus' => $orderStatus]);

        return back()->with('orderUpdated', 'Order updated!');
    }

    public function login()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if(! auth()->attempt($attributes))
        {
            return back()
            ->withInput()
            ->withErrors(['email' => 'Credentials are invalid.']);
        }

        session()->regenerate();  // session fixation
        return redirect('/admin');

        // throw ValidationException::withMessages([
        //     'email' => 'Credentials are invalid.'
        // ]);
        
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('successLogout','Successfully Logout!');
    }
    
    public function forgotPassword()
    {
        try {
            request()->validate([
                'email' => 'required|email'
            ]);
            return redirect('/admin/registration');
        
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withInput()->with('errorMsg', 'Validation failed. Please check your email.');
        }
    
    }

    public function adminSessionDestroy(Request $request)
    {
        auth()->logout();
        return redirect('/')->with('successLogout','Successfully Logout!');

        // $request->session()->flush();
        // return back()->with('success', 'You are successfully logout');
    }
    
}

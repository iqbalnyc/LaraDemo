<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Contactus;
use App\Models\OrderDetail;
use App\Models\OrderMaster;
use App\Models\Product;
use Database\Factories\ContactFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest();
        if (request('search')) {
            $products
                ->where('productName', 'like', '%' . request('search') . '%')
                ->orWhere('productDesc', 'like', '%' . request('search') . '%');
        }

        $categories = Category::all();
        $countCart=0;
        if(session()->has('cart'))
        {
            $countCart = count(session('cart'));
        }
        
        return view('products', [
            'category' => $categories,
            'product' => $products->get(),
            'countCart' => $countCart
        ]);
    }

    public function detail(Product $product)
    {
        $categories = Category::all();

        if (session()->has('cart') && session('cart') !== null) {
            $countCart = count(session('cart'));
        } else {
            $countCart = 0; // Set a default count when 'cart' is not present or is null
        }
        return view('components.detail', [
            'product' => $product,
            'category' => $categories,
            'countCart' => $countCart
        ]);
    }

    public function productOrder(Request $request)
    {
        $totalAmount = $request->quantity * $request->price;
        $cart = session('cart', []);
        foreach ($cart as $key => $item) {
            if ($item['product_id'] === $request->product_id) {
                return back()->with('success', 'Product already exist.');
            }
        }

        $cart[$request->product_id] = array(
            'orderId' => '123',
            'discountType' => 'normal',
            'discountAmount' => $request->productPrice,
            'userEmail' => 'abc@gmail.com',
            'product_id' => $request->product_id,
            'product_name' => $request->product_name,
            'product_image' => $request->product_image,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'total_amount' => $totalAmount
        );
        session()->put('cart', $cart);
        return back()->with('success', 'Product added to cart.');
    }

    public function cart()
    {
        if(session()->has('cart'))
        {
            $cart = session()->all();
            return view('components.cart', [
                'cart' => $cart
            ]);
        } else {
            session()->flash('success', 'Shopping cart is empty!');
            return view('components.cart');
        }
    }

    public function contactus()
    {
        return view('components.contactus');
    }

    public function contactuspost(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Contact::create($attributes);
        return back()->with('success', 'Thank you for contact us!');
    }

    public function checkout(Request $request)
    {
        if(session()->has('cart'))
        {
            $cart = session('cart', []);
            return view('components.checkout', [
                'cart' => $cart
            ]);
        } 
        else
        {
            return redirect("/");
        }
    }
    

    public function processCheckout(Request $request)
    {

        if(session()->has('cart')) 
        {
            $cart = session()->all();
        } ELSE {
            return back()->with('success', 'Your shopping cart is empty!');
        }

        $rows = OrderMaster::count();
        $recordCount = $rows + 1;
        
        $attributes = request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'userEmail' => 'required',
            'phoneNo' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'paymentType' => 'required'
        ]);

        $attributes['order_id'] = $recordCount;

        OrderMaster::create([
            'orderId' => $recordCount,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'userEmail' => $request->userEmail,
            'phoneNo' => $request->phoneNo,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'country' => $request->country,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            'paymentType' => $request->paymentType,
            'orderDate' => now()
        ]);

        session(['order_id' => $recordCount, 'fullName' => $request->fullName, 'userEmail' => $request->userEmail]);
        $cart = session('cart', []);
        if (is_array($cart)) {
            foreach ($cart as $key => $item) {
                OrderDetail::create([
                    'orderId' => $recordCount,
                    'userEmail' => $request->userEmail,
                    'product_id' => $item['product_id'],
                    'product_name' => $item['product_name'],
                    'product_image' => $item['product_image'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'discountType' => $item['discountType'] ?? 0,
                    'orderStatus' => 'Pending',
                    'discountAmount' => $item['discountAmount'] ?? 0,
                    'total_amount' => $item['total_amount'],
                ]);
            }

            $this->sessionDestroy($request);
            return back()->with('success', 'Thank you for your purchase!');
        }
    }

    public function cartOrderDelete(Request $request)
    {
        $cart = session('cart');
        if (isset($cart[$request->input('product_id')])) {
            unset($cart[$request->input('product_id')]);
            session(['cart' => $cart]);
            return back()->with('success', 'Cart item has been Deleted');
        } else {
            return back()->with('success', 'Cart item not found in Cart');
        }
    }

    public function sessionDestroy(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->forget('cart');
        $request->session()->flush();
        $request->session()->forget(['cart', 'status']);
    }
}

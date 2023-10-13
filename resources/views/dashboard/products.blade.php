@extends('dashboard.admin-layout')
@section('title', 'MultiShop - Products')

@section('content')
<!-- /. NAV SIDE  -->
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-primary">Products</h2>
            <a href="/admin/addProduct">Add Product</a>
        </div>
    </div>
    <!-- /. ROW  -->
    <div class="row">
        <div class="col-lg-12 col-md-6">
            <table class="min-w-full text-left text-md">
                <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                        <th scope="col" class="px-6 py-4">#</th>
                        <th scope="col" class="px-6 py-4">Product Name</th>
                        <th scope="col" class="px-6 py-4">Product Manufacturer</th>
                        <th scope="col" class="px-6 py-4">Status</th>
                        <th scope="col" class="px-6 py-4">Price</th>
                        <th scope="col" colspan="2" class="px-6 py-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $product)
                    <tr class="md:table-fixed border-b dark:border-neutral-500">
                        <td class="whitespace-wrap px-3 py-2">{{ $products->firstItem() + $loop->index }}</td>
                        <td class="whitespace-wrap px-3 py-2 w-25" v-if="isEditable">{{ $product->productName }}</td>
                        <td class="whitespace-wrap px-3 py-2">{{ $product->productManu }}</td>
                        <td class="whitespace-wrap px-3 py-2">{{ $product->productStatus }}</td>
                        <td class="whitespace-wrap px-3 py-2">{{ $product->productPrice }}</td>
                        <td class="whitespace-wrap px-3 py-2"><a href="/admin/productsEdit/{{$product->id}}">Edit</a></td>
                        <td class="whitespace-wrap px-3 py-2">
                            <form method="POST" action="/admin/productDestroy/{{$product->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr />
            <div class="mx-auto text-center">
                 {{ $products->links() }}
            </div>
        </div>
    </div>
    <div class="row">
        
    </div>
    <!-- /. ROW  -->
</div>

@endsection
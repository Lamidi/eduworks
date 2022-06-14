<table class="table table-bordered table-left">
    <thead>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Alert Stock</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $key => $product)
        <tr>
            <td>{{$key+1}}</td>
            <td style="cursor: pointer" data-toggle="tooltip" data-placemet="right" title="Click to view Detail" wire:click="ProductDetails({{$product->id}})">{{$product->product_name}}</td>
            <td>{{$product->brand}}</td>
            <td>{{number_format($product->price,2)}}</td>
            <td>{{$product->qty}}</td>
            <td>
                @if ($product->alert_stock > $product->qty) <span class="text text-danger">
                    Low Stock</span>
                @else
                <span class="text text-success">In Stock</span>
                @endif
            </td>
            <td>
                <div class="btn-group">
                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editproduct{{$product->id}}"> <i class=" fa fa-edit"></i>Edit</a>
                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteproduct{{$product->id}}"> <i class=" fa fa-trash"></i>Delete</a>
                </div>
            </td>
        </tr>
        <!-- Modal of Edit product Detail -->
        @include('products.edit')
        <!-- Modal of Delete product-->
        @include('products.delete')
        @endforeach
    </tbody>
</table>
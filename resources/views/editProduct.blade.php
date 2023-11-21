@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Update Product</h3>
        <form action="{{ route('updateProduct') }}" method="POST" enctype="multipart/form-data" >
           @CSRF

           @foreach($products as $product)
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" id="productName" name="productName" value="{{$product->name}}"> 
                <input type="hidden" name="productID" id="productID" value="{{$product->id}}">               
            </div>
            <div class="form-group">
                <label for="productDescription">Product Desciption</label>
                <input type="text" class="form-control" id="productDescription" name="productDescription" value="{{$product->description}}" >                
            </div>
            <div class="form-group">
                <label for="productPrice">Product Price</label>
                <input type="number" class="form-control" id="productPrice" name="productPrice" min="0" value="{{$product->price}}">                
            </div>
            <div class="form-group">
                <label for="productQuantity">Product Quantity</label>
                <input type="number" class="form-control" id="productQuantity" name="productQuantity" min="0" value="{{$product->quantity}}">                
            </div>

            <div class="form-group">
                <label for="productImage">Product Image</label>
                <img src="{{asset('images')}}/{{$product->image}}" alt="" class="img-fluid" width="100">
                <input type="file" class="form-control" id="productImage" name="productImage" value="">                
            </div>
            <div class="form-group">
                <label for="catID">Category</label>
                <select name="CategoryID" id="CategoryID" class="form-control">
                    @foreach($categoryID as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>                
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection
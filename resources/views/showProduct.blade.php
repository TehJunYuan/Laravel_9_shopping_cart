@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Image</td>
                        <td>Product Name</td>
                        <td>Desciption</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Category</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td><img src="{{ asset('images/') }}/{{$product->image}}" width="100" class="img-fluid" alt=""></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->cName}}</td>
                        <!-- 2 -->
                        <td>
                        <a href="{{ route('editProduct',['id'=>$product->id])}}" class="btn btn-warning btn-xs">Edit</a> 
                        <a href="{{ route('deleteProduct',['id'=>$product->id])}}" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure to delete?')">Delete
                        </a>
                    </td>   
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <br><br>
    </div>
    <div class="col-sm-2"></div>
</div>
@endsection
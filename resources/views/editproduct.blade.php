@extends('layouts.app')
@section('content')
<x-navbar/>
<div class="flex-center position-ref full-height">
    <div class="content" style="margin-left:10rem; margin-right:10rem;" >
        <form action="/products/{{$product->id}}" method="POST">
            @csrf
            @method('PUT')
            <h1> Enter Edit for Product</h1>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{$product->name}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" class="form-control" value="{{$product->description}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Count</label>
                <input type="number" name="count" class="form-control" value="{{$product->count}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" value="{{$product->price}}">
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top:1rem">Submit</button>
        </form>
    </div>
</div>
@endsection

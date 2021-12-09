@extends('layouts.app')
@section('content')
<x-navbar/>
<div class="flex-center position-ref full-height">
    <div class="content" style="margin-left:10rem; margin-right:10rem;" >
        <form action="/products" method="POST" enctype="multipart/form-data">
            @csrf
            <h1> Enter Details to create a product</h1>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Count</label>
                <input type="number" name="count" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control">
            </div>
            <div>
                <label for="formFileLg" class="form-label">Input Photo</label>
                <input class="form-control form-control-lg" name="media" type="file">
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top:1rem">Submit</button>
        </form>
    </div>
</div>
@endsection

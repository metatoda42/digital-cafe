
@extends('layouts.app')
@section('content')
  <body>
    <x-navbar/>
    <div class="col">
        <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text">{{ $product->count }}</p>
                <p class="card-text">{{ $product->price}}</p>
            </div>
        </div>
    </div>

  </body>
  @endsection

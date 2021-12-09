@extends('layouts.app')
@section('content')
    <x-navbar/>
    <div class="row row-cols-1 row-cols-md-4 g-4" style="margin: 2rem">
    @foreach ($products as $product)
        <div class="col">
            <div class="card">
                <img src="{{ asset('images/'. $product->media) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">{{ $product->count }}</p>
                    <p class="card-text">{{ $product->price}}</p>
                    <a
                        class="border-b-2 pb-2 border-dotted italic text-green-500"
                        href="/products/{{ $product->id }}/edit">
                        Edit &rarr;
                    </a>
                    <form action="/products/{{ $product->id }}" class="pt-3" method="POST">
                        @csrf
                        @method('delete')
                        <button
                            type="submit"
                            class="border-b-2 pb-2 border-dotted italic text-red-500">
                                Delete &rarr;
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <x-footer/>
@endsection

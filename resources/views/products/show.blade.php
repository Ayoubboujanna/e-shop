@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb my-5">
            <div class="pull-left">
                <h1>{{ $product->title }}</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary " href="{{ route('products.index') }}"> Retour</a>
            </div>
        </div>


        <!--Medias-->

        <div class="media p-10" style="background:#FEFEE2;  padding:100px;">
            <img class="mr-3" style="width:260px;height:260px" src="{{ asset('images/imgs/'. $product->file_path ) }}"

                alt="First slide">

            <div class="media-body">
                <h5 class="mt-0">Produit Numero : {{ $product->id }} </h5>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $product->title }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Price:</strong>
                        {{ $product->price }} Dh
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>category:</strong>

                        {{ $product->category->name }}

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        {{ $product->description }}
                    </div>
                </div>
            </div>
        </div>
        <!--endmedias-->
    </div>
</div>

@endsection
<style>
    .media {
        height: 100%;
        transition: 0.5s;
        cursor: pointer;
        margin-right: 0px;
    }

    .media:hover {
        transform: scale(1.05);
        box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.3);
    }

    .media-body {
        height: 80px;
    }

    .media::before,
    .media::after {

        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        transform: scale3d(0, 0, 1);
        transition: transform .3s ease-out 0s;
        background: rgba(255, 255, 255, 0.1);
        content: '';
        pointer-events: none;
    }

    .media::before {
        transform-origin: left top;
    }

    .media::after {
        transform-origin: right bottom;
    }

    .media:hover::before,
    .media:hover::after,
    .media:focus::before,
    .media:focus::after {
        transform: scale3d(1, 1, 1);
    }
</style>
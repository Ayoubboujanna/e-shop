@extends('layouts.master')

@section('content')



<h1><b>
        <center> Products List </center>
    </b></h1>


<div class="container">
    <!--   <div class="card card-block mb-2">
    <h4 class="card-title">Card 1</h4>
    <p class="card-text">Welcom to bootstrap card styles</p>
    <a href="#" class="btn btn-primary">Submit</a>
  </div>   -->
    <div class="row ">
        @foreach($produits as $produit)
        <div class="col-md-4 col-md-4">
            <div class="card card-block">


                {{-- <img style="height:180px;width:100%" src="{{ asset('/storage/product/'. $produit->file_path ) }}"
                alt="Photo of sunset"> --}}
                <img style="height:180px;width:100%" src="{{ url('images/imgs/'. $produit->file_path ) }}"
                    alt="Photo of sunset">
                <div class="course-box">
                    <h2>{{ $produit->title }}</h2>
                    <div class="text-muted">
                        <a class="course-likes m-l-10" href="#"></a>
                    </div>
                    <p class="text-success"><strong>{{ number_format($produit->price, 2, ',', ' ') }} Dh TTC</strong>
                    </p>
                    <p>{{ $produit->description }}</p>
                    <form method="POST" action="{{ url('basket/add/'.$produit->id) }}">
                        @csrf
                </div>
                <div class="align-text-bottom">
                    <input type="hidden" id="id" name="id" value="{{ $produit->id }}">
                    <label for="quantity">Quantité</label>
                    <input id="quantity" name="quantity" type="number" value="1" min="1">
                    <button class="btn waves-effect waves-light" style="width:20%; right:0px; position:absolute"
                        type="submit"><i class="fas fa-cart-arrow-down"></i>
                    </button>
                </div>
                </form>

            </div>
        </div>
        @endforeach
    </div>
</div>








@endsection
<style>
    div [class^="col-"] {
        padding: 20px;


    }

    .card {

        margin-left: -20px;
        height: 100%;
        padding: 20px;
        transition: 0.5s;
        cursor: pointer;
    }

    .card-title {
        font-size: 15px;
        transition: 1s;
        cursor: pointer;
    }

    .card-title i {
        font-size: 15px;
        transition: 1s;
        cursor: pointer;
        color: #ffa710
    }

    .card-title i:hover {
        transform: scale(1.25) rotate(100deg);
        color: #18d4ca;

    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.3);
    }

    .card-text {
        height: 80px;
    }

    .align-text-bottom {
        margin-top: auto;
    }

    .card::before,
    .card::after {
        position: absolute;
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

    .card::before {
        transform-origin: left top;
        a
    }

    .card::after {
        transform-origin: right bottom;
    }

    .card:hover::before,
    .card:hover::after,
    .card:focus::before,
    .card:focus::after {
        transform: scale3d(1, 1, 1);
    }
</style>
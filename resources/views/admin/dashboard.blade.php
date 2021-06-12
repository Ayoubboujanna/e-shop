@extends('layouts.admin')

@section('content')


<div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

            <h4 class="mb-2 mb-sm-0 pt-1">
                <a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home Page</a>
                <span>/</span>
                <span>Dashboard</span>
            </h4>

        </div>

    </div>




    {{-- Chart1 --}}
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4 h-screen bg-gray-100">

            <div class="container px-4 mx-auto">

                <div class="p-6 m-20 bg-white rounded shadow">
                    {!! $chart1->container() !!}
                </div>

            </div>

            <script src="{{ LarapexChart::cdn() }}"></script>

            {{ $chart1->script() }}
        </div>
    </div>

    {{-- Chart2 & Chart3 --}}
    <div class="row wow fadeIn">

        {{-- Chart2 --}}
        <div class="col-md-12 mb-4 h-screen bg-gray-100">

            <div class="container px-4 mx-auto">

                <div class="p-6 m-20 bg-white rounded shadow">
                    {!! $chart2->container() !!}
                </div>

            </div>

            <script src="{{ LarapexChart::cdn() }}"></script>


            {{ $chart2->script() }}





        </div>

        {{-- Chart3 --}}
        <div class="col-md-12 mb-4 h-screen bg-gray-100">



            {{-- <div class="col-md-12 mb-4 h-screen bg-gray-100"> --}}

            <div class="container px-4 mx-auto">

                <div class="p-6 m-20 bg-white rounded shadow">
                    {!! $chart3->container() !!}
                </div>

            </div>

            <script src="{{ LarapexChart::cdn() }}"></script>


            {{ $chart3->script() }}

            {{-- </div> --}}

        </div>
    </div>




    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4 h-screen bg-gray-100">

            <div class="container px-4 mx-auto">

                <div class="p-6 m-20 bg-white rounded shadow">
                    {!! $chart4->container() !!}
                </div>

            </div>

            <script src="{{ LarapexChart::cdn() }}"></script>

            {{ $chart4->script() }}
        </div>
    </div>

</div>


@endsection
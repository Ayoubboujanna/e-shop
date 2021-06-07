@extends('layouts.admin')

@section('content')
<section class="section-pagetop bg-dark">
    <div class="jumbotron">
        <h2 class="title-page">My Account - Orders</h2>
    </div>
</section>

<section class="section-content bg padding-y border-top">
    <div class="container">
        <div class="row">
        </div>
        <div class="row">
            <main class="col-sm-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Order No.</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Order Amount</th>
                            <th scope="col">Qty.</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        @forelse ($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->order_number }}</th>
                            <td>{{ $order->first_name }}</td>
                            <td>{{ $order->last_name }}</td>
                            <td>{{ config('settings.currency_symbol') }}{{ $order->grand_total }}</td>
                            <td>{{ $order->item_count  }}</td>
                            <td><span class="badge badge-success">{{ strtoupper($order->statuts) }}</span></td>
                            <td>
                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="float-left">
                                    <button type="button" class="btn btn-primary btn-sm"><i
                                            class="far fa-edit"></i></button>
                                </a></td>
                        </tr>
                        @empty
                        <div class="col-sm-12">
                            <p class="alert alert-warning">No orders to display.</p>
                        </div>
                        @endforelse
                    </tbody>
                </table>
            </main>
        </div>
    </div>
</section>
@stop
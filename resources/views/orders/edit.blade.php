@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Order numero: {{ $order->id }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.orders.update', ['order' => $order->id ]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-check">
                            <input type="radio" name="statuts" value="pending">
                            <label style="display: block;">pending</label>
                            <input type="radio" name="statuts" value="processing">
                            <label style="display: block;">processing</label>
                            <input type="radio" name="statuts" value="completed">
                            <label style="display: block;">completed</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
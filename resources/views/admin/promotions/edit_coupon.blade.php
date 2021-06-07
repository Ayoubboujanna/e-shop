@extends('layouts.admin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-product-hunt"></i>
        </div>
        <div class="header-title">
            <h1>Edit Coupon</h1>
            <small>Edit Coupons</small>
        </div>
    </section>
    @if(Session::has('flash_message_error'))
    <div class="alert alert-sm alert-danger alert-block" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{!! session('flash_message_error') !!}</strong>
    </div>
    @endif

    @if(Session::has('flash_message_success'))
    <div class="alert alert-sm alert-success alert-block" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{!! session('flash_message_success') !!}</strong>
    </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Form controls -->
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonlist">
                            <a class="btn btn-add " href="{{url('admin/view-coupons')}}">
                                <i class="fa fa-eye"></i> View Coupons </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="col-sm-6" enctype="multipart/form-data"
                            action="{{url('/admin/edit-coupon/'.$couponDetails->id)}}" method="post" name="edit_coupon"
                            id="edit_coupon"> {{csrf_field()}}

                            <div class="form-group">
                                <label>Coupon Code</label>
                                <input type="text" class="form-control" value="{{$couponDetails->code_promo}}"
                                    name="coupon_code" id="coupon_code" required>
                            </div>
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" class="form-control" value="{{$couponDetails->pourcentage}}"
                                    name="coupon_percent" id="coupon_amount" required>
                            </div>



                            <div class="reset-button">
                                <input type="submit" class="btn btn-success" value="Edit Coupon">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
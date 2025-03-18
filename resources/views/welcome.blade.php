@extends('frontend.dashboard')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="card radius-15 bg-voilet">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="mb-0 text-white">{{$all3}}</h2>
                            </div>
                            <div class="ms-auto font-35 text-white"><i class="bx bx-cart-alt"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Jumlah Keseluruhan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
        <div class="card radius-15 overflow-hidden">
            <div class="card-header border-bottom-0">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Recent Orders</h5>
                    </div>
                    <div class="ms-auto">
                        <button type="button" class="btn btn-white btn-sm px-4 radius-15">View
                            More</button>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="product-img bg-transparent border">
                                        <img src="{{ asset('assets/images/icons/smartphone.png') }}"
                                            width="35" alt="">
                                    </div>
                                </td>
                                <td>Honor Mobile 7x</td>
                                <td>Mitchell Daniel</td>
                                <td><a href="javascript:;"
                                        class="btn btn-sm btn-light-success btn-block radius-30">Delivered</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

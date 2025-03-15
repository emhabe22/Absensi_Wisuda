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
                                <h2 class="mb-0 text-white">649</h2>
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
            <div class="col-12 col-lg-3">
                <div class="card radius-15 bg-primary-blue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="mb-0 text-white">114</h2>
                            </div>
                            <div class="ms-auto font-35 text-white"><i class="bx bx-support"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Mahasiswa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card radius-15 bg-rose">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="mb-0 text-white">98</h2>
                            </div>
                            <div class="ms-auto font-35 text-white"><i class="bx bx-tachometer"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Orang Tua</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card radius-15 bg-sunset">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="mb-0 text-white">208</h2>
                            </div>
                            <div class="ms-auto font-35 text-white"><i class="bx bx-user"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Panitia</p>
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
                                <th>Product Name</th>
                                <th>Customer</th>
                                <th>Product id</th>
                                <th>Price</th>
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
                                <td>#835478</td>
                                <td>$54.68</td>
                                <td><a href="javascript:;"
                                        class="btn btn-sm btn-light-success btn-block radius-30">Delivered</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product-img bg-transparent border">
                                        <img src="{{ asset('assets/images/icons/watch.png') }}"
                                            width="35" alt="">
                                    </div>
                                </td>
                                <td>Hand Watch</td>
                                <td>Milona Burke</td>
                                <td>#987546</td>
                                <td>$43.78</td>
                                <td><a href="javascript:;"
                                        class="btn btn-sm btn-light-warning btn-block radius-30">Pending</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product-img bg-transparent border">
                                        <img src="{{ asset('assets/images/icons/laptop.png') }}"
                                            width="35" alt="">
                                    </div>
                                </td>
                                <td>Mini Laptop</td>
                                <td>Craig Clayton</td>
                                <td>#325687</td>
                                <td>$62.21</td>
                                <td><a href="javascript:;"
                                        class="btn btn-sm btn-light-success btn-block radius-30">Delivered</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product-img bg-transparent border">
                                        <img src="{{ asset('assets/images/icons/shirt.png') }}"
                                            width="35" alt="">
                                    </div>
                                </td>
                                <td>Slim-T-Shirt</td>
                                <td>Clark Andola</td>
                                <td>#658972</td>
                                <td>$75.68</td>
                                <td><a href="javascript:;"
                                        class="btn btn-sm btn-light-danger btn-block radius-30">Cancelled</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product-img bg-transparent border">
                                        <img src="{{ asset('assets/images/icons/wine-glass.png') }}"
                                            width="35" alt="">
                                    </div>
                                </td>
                                <td>Mini Laptop</td>
                                <td>Craig Clayton</td>
                                <td>#325687</td>
                                <td>$62.21</td>
                                <td><a href="javascript:;"
                                        class="btn btn-sm btn-light-success btn-block radius-30">Delivered</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product-img bg-transparent border">
                                        <img src="{{ asset('assets/images/icons/headphones.png') }}"
                                            width="35" alt="">
                                    </div>
                                </td>
                                <td>Honor Mobile 7x</td>
                                <td>Mitchell Daniel</td>
                                <td>#835478</td>
                                <td>$54.68</td>
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

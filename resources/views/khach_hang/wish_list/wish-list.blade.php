@extends('khach_hang.layout.index')

@section('title')
    <title>Shop son HLYNK Lipsticks</title>
@endsection()

@section('content')

<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">Wishlist</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- Wishlist main wrapper start -->
<div class="wishlist-main-wrapper mt-no-text">
    <div class="container container-default-2 custom-area">
        <div class="row">
            <div class="col-lg-12">
                <!-- Wishlist Table Area -->
                <div class="wishlist-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="pro-thumbnail">Image</th>
                            <th class="pro-title">Product</th>
                            <th class="pro-price">Price</th>
                            <th class="pro-cart">Add to Cart</th>
                            <th class="pro-remove">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="assets/images/product/small-size/1.jpg" alt="Product" /></a></td>
                            <td class="pro-title"><a href="#">Product dummy title <br> s / green</a></td>
                            <td class="pro-price"><span>$295.00</span></td>
                            <td class="pro-cart"><a href="cart.html" class="btn product-cart button-icon flosun-button dark-btn">Add to Cart</a></td>
                            <td class="pro-remove"><a href="#"><i class="lnr lnr-trash"></i></a></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

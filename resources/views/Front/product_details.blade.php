@extends("layouts.front.master")
@section('content')

<main class="main mt-5">

    <!-- Product Details Section -->
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">

            <h3 class="section-title bg-white text-center text-primary px-3">{{ trans('product_filter.product_details') }}</h3>
        </div>
            <div class="row">
                <!-- Product Image Carousel -->

                <div class="col-lg-6">
                    <div class="product-detail accordion-detail">
                        <!-- Image Carousel -->
                        <div class="product-image-slider">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($product->photos as $photo)
                                        <div class="carousel-item @if($loop->first) active @endif">
                                            <img src="{{ asset('images/products/attachments/' . $photo->src) }}" class="d-block w-100" alt="{{trans('pagination.alt_title')}}">
                                        </div>
                                    @endforeach
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-lg-6">
                    <div class="detail-info">
                        <h2 class="title-detail">{{ $product->name }}</h2>

                        <div class="product-detail-rating">
                            <div class="product-rate-cover text-end">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: {{ ($product->rating / 5) * 100 }}%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>

                        <!-- Product Description -->
                        <div class="short-desc mb-30">
                            <p>{!! $product->description ?? 'No description available' !!}</p>
                        </div>

                        <!-- Product Details Table -->
                        <div class="product-meta font-xs color-grey mt-50">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">{{trans('product_filter.feature')}}</th>
                                        <th scope="col">{{trans('product_filter.details')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{trans('product_filter.name')}}</td>
                                        <td>{{ $product->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{trans('product_filter.description')}}</td>
                                        <td>{!! $product->description  !!}</td>
                                    </tr>
                                    <tr>
                                        <td>{{trans('product_filter.body')}}</td>
                                        <td>{!!$product->body !!}</td>
                                    </tr>
                                    {{-- <tr>
                                        <td>{{trans('product_filter.price')}}</td>
                                        <td>{{ $product->price }}</td>
                                    </tr> --}}
                                    <tr>
                                        <td>{{trans('product_filter.package')}}</td>
                                        <td>{{ $product->package  }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <td>{{trans('product_filter.category')}}</td>
                                        <td>{{ $product->category  }}</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

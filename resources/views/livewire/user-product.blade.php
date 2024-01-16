    <!-- Left -->
    <div class="col-sm-12 col-md-8" id="main">
        <div class="row">
            <!-- Carousel -->
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded-4 mb-3" style="aspect-ratio: 25/7;">
                    <div class="carousel-item active">
                        <img src={{ asset('img/carousel-1.jpg') }} class="car-img d-block w-100" alt="carousel-1.jpg">
                    </div>
                    <div class="carousel-item">
                        <img src={{ asset('img/carousel-3.jpg') }} class="car-img d-block w-100" alt="carousel-3.jpg">
                    </div>
                    <div class="carousel-item">
                        <img src={{ asset('img/carousel-2.jpg') }} class="car-img d-block w-100" alt="carousel-2.jpg">
                    </div>
                    <div class="carousel-item">
                        <img src={{ asset('img/carousel-4.jpg') }} class="car-img d-block w-100" alt="carousel-4.jpg">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="container card pt-3">
            <div class="row">
                <!-- product -->
                @foreach ($product as $item)
                    <div class="col-3 col-lg-2" style="min-width: 100px;">
                        <div class="content">
                            <a wire:click="add({{ $item->id }})">
                                <div class="ratio ratio-1x1">
                                    <img src="{{ asset('300.png') }}" class="rounded" />
                                </div>
                                <div class="content-details fadeIn-bottom">
                                    <i class="bi bi-bag-plus" style="font-size: 30px"></i>
                                </div>
                            </a>
                        </div>

                        <div class="position-relative">
                            <p class="p-name mb-0" max>{{ $item->name }}</p>
                            <p class="text-secondary" style="font-size: smaller;">Rp.{{ number_format($item->price) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

<x-front-layout>
    <section class="hero-wrap hero-wrap-2" style="background-image: url({{asset("assets/images/image_2.jpg")}});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{route('home')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Rooms <i class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">{{$hotel->name}}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light ftco-no-pt ftco-no-pb">
        <div class="container-fluid px-md-0">
            <div class="row no-gutters">
                @foreach($apartments as $apartment)
                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex">
                        <a href="{{route('hotel.room',$apartment->id)}}" class="img" style="background-image: url({{asset("assets/images/$apartment->image")}});"></a>
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
                                <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
                                <p class="mb-0"><span class="price mr-1">{{$apartment->price}}$</span> <span class="per">per night</span></p>
                                <h3 class="mb-3"><a href="{{route('hotel.room',$apartment->id)}}">{{$apartment->name}}</a></h3>
                                <ul class="list-accomodation">
                                    <li><span>Max:</span> {{$apartment->max_person}} Persons</li>
                                    <li><span>Size:</span>{{$apartment->size}} m2</li>
                                    <li><span>View:</span> {{$apartment->view}}</li>
                                    <li><span>Bed:</span> {{$apartment->num_beds}}</li>
                                </ul>
                                <p class="pt-1"><a href="{{route('hotel.room',$apartment->id)}}" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</x-front-layout>

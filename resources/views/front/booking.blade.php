<x-front-layout>
    <section class="hero-wrap hero-wrap-2" style="background-image: url({{asset("assets/images/image_2.jpg")}});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{route('home')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Rooms <i class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Booking</h1>
                </div>
            </div>
        </div>
    </section>
    <table class="table table-striped m-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Hotel Name</th>
            <th scope="col">Room Name</th>
            <th scope="col">Check In</th>
            <th scope="col">Check Out</th>
            <th scope="col">Status</th>
            <th scope="col">Price</th>
            <th scope="col">Days</th>
            <?php $number=1?>
        </tr>
        </thead>
        <tbody>

        @forelse($bookings as $booking)
            <tr>
                <th scope="row">{{$number++}}</th>
                <td>{{$booking->apartment->hotel->name}}</td>
                <td>{{$booking->apartment->name}}</td>
                <td>{{$booking->check_in}}</td>
                <td>{{$booking->check_out}}</td>
                <td>{{$booking->status}}</td>
                <td>{{$booking->total_price}}</td>
                <td>{{$booking->total_nights}}</td>

            </tr>
        @empty
            <tr>
                <td colspan="9"> No Categories Found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
       <div class="ml-3 p-2" >
           {{$bookings->withQueryString()->links()}}
       </div>
</x-front-layout>

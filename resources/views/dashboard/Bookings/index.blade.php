<x-dashboard-layout>
    <div class="container-fluid">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4 d-inline p-2">Hotels Booking</h5>
                        <table class="table m-2">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Room Name</th>
                                <th scope="col">Hotel Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Total Nights</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($bookings as $booking)
                                <tr>
                                    <th scope="row">{{$booking->id}}</th>
                                    <td>{{$booking->user->name}}</td>
                                    <td>{{$booking->apartment->name}}</td>
                                    <td>{{$booking->apartment->hotel->name}}</td>
                                    <td>{{$booking->email}}</td>
                                    <td>{{$booking->phone}}</td>
                                    <td>{{$booking->total_nights}}</td>
                                    <td>{{$booking->total_price}}</td>
                                    <td>{{$booking->status}}</td>

                                    <td>
                                        <form action="{{route('admin.bookings.destroy',$booking->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No Booking Found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{$bookings->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>



    </div>

</x-dashboard-layout>

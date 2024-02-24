<x-dashboard-layout>
    <div class="container-fluid">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4 d-inline">Hotels</h5>
                        <a  href="{{route('admin.rooms.create')}}" class="btn btn-primary mb-4 text-center float-right">Create New Room</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Hotel Name</th>
                                <th scope="col">View</th>
                                <th scope="col">Number of Beds</th>
                                <th scope="col">Size</th>
                                <th scope="col">Price</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($rooms as $room)
                                <tr>
                                    <th><img height="50px" width="50px" src="{{$room->image_url}}"></th>
                                    <th scope="row">{{$room->id}}</th>
                                    <td>{{$room->name}}</td>
                                    <td>{{$room->hotel->name}}</td>
                                    <td>{{$room->view}}</td>
                                    <td>{{$room->num_beds}}</td>
                                    <td>{{$room->size}}</td>
                                    <td>{{$room->price}}</td>
                                    <td>
                                        <a href="{{route('admin.rooms.edit',$room->id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('admin.rooms.destroy',$room->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No Admins Found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{$rooms->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>



    </div>

</x-dashboard-layout>

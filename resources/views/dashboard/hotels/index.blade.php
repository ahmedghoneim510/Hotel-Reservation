<x-dashboard-layout>
    <div class="container-fluid">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4 d-inline">Hotels</h5>
                        <a  href="{{route('admin.hotels.create')}}" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Location</th>
                                <th scope="col">Description</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($hotels as $hotel)
                                <tr>
                                    <th><img height="50px" width="50px" src="{{$hotel->image_url}}"></th>
                                    <th scope="row">{{$hotel->id}}</th>
                                    <td>{{$hotel->name}}</td>
                                    <td>{{$hotel->address}}</td>
                                    <td>{{$hotel->description}}</td>
                                    <td>
                                        <a href="{{route('admin.hotels.edit',$hotel->id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('admin.hotels.destroy',$hotel->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Admins Found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{$hotels->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>



    </div>

</x-dashboard-layout>

<x-dashboard-layout>
    <div class="container-fluid">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4 d-inline">Admins</h5>
                        <a  href="{{route('admin.admins.create')}}" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">username</th>
                                <th scope="col">email</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($admins as $admin)
                            <tr>
                                <th scope="row">{{$admin->id}}</th>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>
                                    <a href="{{route('admin.admins.edit',$admin->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('admin.admins.destroy',$admin->id)}}" method="post" class="d-inline">
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
                        {{$admins->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>



    </div>

</x-dashboard-layout>

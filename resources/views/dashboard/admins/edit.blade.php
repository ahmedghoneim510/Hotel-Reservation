<x-dashboard-layout>
    <form action="{{route('admin.admins.update',$admin->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('dashboard.admins._form',['edit'=>"Edit"])
    </form>
</x-dashboard-layout>

<x-dashboard-layout>
    <form action="{{route('admin.rooms.update',$room->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('dashboard.rooms._form',['edit'=>"Edit"])
    </form>
</x-dashboard-layout>

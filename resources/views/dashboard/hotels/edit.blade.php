<x-dashboard-layout>
    <form action="{{route('admin.hotels.update',$hotel->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('dashboard.hotels._form',['edit'=>"Edit"])
    </form>
</x-dashboard-layout>

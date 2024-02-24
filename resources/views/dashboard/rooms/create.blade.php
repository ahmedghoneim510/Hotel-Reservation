<x-dashboard-layout>
    <form action="{{route('admin.rooms.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('dashboard.rooms._form')
    </form>
</x-dashboard-layout>

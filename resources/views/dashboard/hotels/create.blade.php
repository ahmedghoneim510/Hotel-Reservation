<x-dashboard-layout>
    <form action="{{route('admin.hotels.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('dashboard.hotels._form')
    </form>
</x-dashboard-layout>

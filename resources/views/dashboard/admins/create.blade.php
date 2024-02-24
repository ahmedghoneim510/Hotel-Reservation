<x-dashboard-layout>
    <form action="{{route('admin.admins.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('dashboard.admins._form')
    </form>
</x-dashboard-layout>

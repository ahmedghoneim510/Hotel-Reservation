<x-dashboard-layout>
    <x-alert type="success" />
    <x-alert type="error" />
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mt-5">Login</h5>
                        <form method="POST" class="p-auto" action="{{route('admin.login')}}">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="text" name="email" id="form2Example1" class="form-control" placeholder="Email" />

                            </div>


                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />

                            </div>

                            <div>
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">Remember Me</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>


<x-front-layout>
    <!-- Session Status -->
    <div class="hero-wrap js-fullheight" style="background-image: url({{asset('assets/images/image_2.jpg')}});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <!-- <h2 class="subheading">Welcome to Vacation Rental</h2>
                    <h1 class="mb-4">Rent an appartment for your vacation</h1>
                  <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p> -->
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row justify-content-middle" style="margin-left: 397px; margin-top: -200px;">
                <div class="col-md-6 mt-5">
                    <form action="{{route('login')}}" method="post" class="appointment-form" style="margin-top: -568px;">
                        @csrf
                        <h3 class="mb-3">Login</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <x-input-label for="email" :value="__('Email')" />

                                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div >
                                        <x-input-label for="password" :value="__('Password')" />
                                        <x-text-input id="password"
                                                      type="password"
                                                      class="form-control"
                                                      name="password"
                                                      required autocomplete="current-password" />



                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Login" class="btn btn-primary py-3 px-4">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>

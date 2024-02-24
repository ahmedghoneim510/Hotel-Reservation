<x-front-layout>
    <div class="hero-wrap js-fullheight" style="background-image: url({{asset("assets/images/image_2.jpg")}});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <h2 class="subheading">Welcome to Vacation Rental</h2>
                    <h1 class="mb-4">Rent an appartment for your vacation</h1>
                    <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    <hr>
    <div class="container align-content-center">
        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <div class="m-2">
            <script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL')}}&currency=USD"></script>
        </div>
        <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>
    </div>
    </section>
        <script>
            paypal.Buttons({
                // Sets up the transaction when a payment button is clicked
                createOrder: (data, actions) => {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: {{$book->total_price}} // Can also reference a variable or function
                            }
                        }]
                    });
                },
                // Finalize the transaction after payer approval
                onApprove: (data, actions) => {
                    return actions.order.capture().then(function(orderData) {
                        const jsonData = JSON.stringify(orderData);

                        if(orderData.status === 'COMPLETED'){
                            window.location.href = "{{route('booking.success')}}";
                        }
                    });
                }
            }).render('#paypal-button-container');
        </script>

    </div>
    </div>
    </div>

</x-front-layout>

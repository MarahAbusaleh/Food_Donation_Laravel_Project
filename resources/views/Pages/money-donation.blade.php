@extends('Layout.master')
@section('content')
    <main>
        <section class="donate-section">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mx-auto">
                        <form class="custom-form donate-form" action="{{ route('paypal') }}" method="post" role="form">
                            @csrf
                            @method('post')
                            <input type="hidden" name="user_id" value="{{ $userdonations->user_id }}">
                            <input type="hidden" name="donation_id" value="{{ $userdonations->donation_id }}">

                            <h3 class="mb-4">Make a donation</h3>

                            <div class="row">

                                <div class="col-lg-12 col-12">
                                    <h5 class="mt-2 mb-3">Select an amount</h5>
                                </div>

                                <div class="col-lg-12 col-12 form-check-group">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"
                                            name="price">{{ $donations->price }}</span>

                                        <input type="number" class="form-control" placeholder="select quantity"
                                            aria-label="Username" aria-describedby="basic-addon1" min="1"
                                            value="1" name="quantity" id="quantityInput">
                                    </div>
                                    <!-- Hidden input field to store the price -->
                                    <input type="hidden" id="priceInput" name="donationPrice" value="{{ $donations->price }}">
                                </div>
                                {{-- <div class="col-lg-6 col-12 form-check-group">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">$</span>

                                        <input type="text" class="form-control" placeholder="Custom amount"
                                            aria-label="Username" aria-describedby="basic-addon1" name="Custom">
                                    </div>
                                </div> --}}

                                <div class="col-lg-12 col-12">
                                    <h5 class="mt-1">Personal Info</h5>
                                </div>

                                {{-- <div class="col-lg-6 col-12 mt-2">
                                    <label id="basic-addon1" for="donation-name">Name</label>
                                    <input type="text" name="donation-name" id="donation-name" class="form-control"
                                        placeholder="Jack Doe" value="{{ $users->name }}">
                                        @if ($errors->has('donation-name'))
                                        <span class="text-danger">{{ $errors->first('donation-name') }}</span>
                                        @endif
                                </div> --}}

                                {{-- <div class="col-lg-6 col-12 mt-2">
                                    <label id="basic-addon1" for="donation-email">Email</label>
                                    <input type="text" name="donation-email" id="donation-email" class="form-control"
                                        placeholder="" value="{{ $users->email }}" pattern="[^ @]*@[^ @]*"
                                        >
                                        @if ($errors->has('donation-email'))
                                        <span class="text-danger">{{ $errors->first('donation-email') }}</span>
                                        @endif
                                </div> --}}

                                <div class="col-lg-6 col-12 mt-2">
                                    <label id="basic-addon1" for="donation-phone">Phone</label>
                                    <input type="text" name="donation-phone" id="donation-phone" class="form-control"
                                        placeholder="">
                                        @if ($errors->has('donation-phone'))
                                        <span class="text-danger">{{ $errors->first('donation-phone') }}</span>
                                        @endif
                                </div>
                                <div class="col-lg-6 col-12 mt-2">
                                    <label id="basic-addon1" for="donation-address">Address</label>
                                    <input type="text" name="donation-address" id="donation-address" class="form-control"
                                        placeholder="">
                                        @if ($errors->has('donation-address'))
                                        <span class="text-danger">{{ $errors->first('donation-address') }}</span>
                                        @endif
                                </div>

                                <input type="hidden" name="price" id="hiddenPrice" value="{{ $donations->price }}">
                                <div class="col-lg-12 col-12">
                                    <div class="form-check" style="padding-left: 0">
                                        <br>
                                        <button class="col-lg-12 col-12 mt-2" type="submit"
                                            style="text-decoration: none; border: #555555 1px solid; background-color: white;padding:10px; border-radius:30px; color:black;"
                                            name="paypal" value="Paypal"><i
                                                class="bi-paypal custom-icon ms-1"></i>Paypal</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

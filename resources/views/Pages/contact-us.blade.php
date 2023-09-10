@extends('Layout.master')
@section('content')
    <section class="contact-section section-padding" id="section_6">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
                    <div class="contact-info-wrap">
                        <h2>Get in touch</h2>

                        <div class="contact-image-wrap d-flex flex-wrap">
                            <img src="images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg"
                                class="img-fluid avatar-image" alt="">

                            <div class="d-flex flex-column justify-content-center ms-3">
                                <p class="mb-0">Clara Barton</p>
                                <p class="mb-0"><strong>HR & Office Manager</strong></p>
                            </div>
                        </div>

                        <div class="contact-info">
                            <h5 class="mb-3">Contact Infomation</h5>

                            <p class="d-flex mb-2">
                                <i class="bi-geo-alt me-2"></i>
                                Akershusstranda 20, 0150 Oslo, Norway
                            </p>

                            <p class="d-flex mb-2">
                                <i class="bi-telephone me-2"></i>

                                <a href="tel: 305-240-9671">
                                    305-240-9671
                                </a>
                            </p>

                            <p class="d-flex">
                                <i class="bi-envelope me-2"></i>

                                <a href="mailto:info@yourgmail.com">
                                    donate@charity.org
                                </a>
                            </p>

                            <a href="#" class="custom-btn btn mt-3">Get Direction</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-12 mx-auto">
                    <form class="custom-form contact-form" action="{{ url('store-contacts') }}" method="post"
                        role="form">
                        @csrf
                        <h2>Contact form</h2>

                        <p class="mb-4">Or, you can just send an email:
                            <a href="#">info@charity.org</a>
                        </p>
                        @if (session('success'))
                            <div id="vola_message" class="alert alert-primary">{{ session('success') }}</div>
                        @endif
                        <div class="row">

                            {{-- Name input --}}
                            <div class="col-lg-6 col-md-6 col-12">
                                <input type="text" name="name" id="first-name" class="form-control"
                                    placeholder="Full name" required>
                            </div>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif

                            {{-- Phone input --}}
                            <div class="col-lg-6 col-md-6 col-12">
                                <input type="text" name="phone" id="first-name" class="form-control"
                                    placeholder="Phone number" required>
                            </div>
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif

                        </div>

                        {{-- Email input --}}
                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control"
                            placeholder="Jackdoe@gmail.com" required>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif

                        {{-- Subject input --}}
                        <input name="subject" class="form-control" placeholder="Subject" required>
                        @if ($errors->has('subject'))
                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                        @endif

                        {{-- Message input --}}
                        <textarea name="message" rows="5" class="form-control" id="message" placeholder="What can we help you?"></textarea>
                        @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        @endif

                        <button type="submit" class="form-control">Send Message</button>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection

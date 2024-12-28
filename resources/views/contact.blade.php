@extends('layout.mainlayout')
@section('content')
    <div class="contact-area-inner upper">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="single-contact-box upper wow fadeInRight">
                        <div class="section-title upper">
                            <div class="sub-title">
                                <h2>Collaborate with Our <br> Support Team</h2>
                            </div>
                        </div>
                        <div class="contact_from_box">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('contact.send') }}" method="POST" id="dreamit-form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form_box">
                                            <input type="text" name="name" placeholder="Full Name" required>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_box">
                                            <input type="email" name="email" placeholder="Your Email" required>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form_box">
                                            <textarea name="message" id="message" cols="30" rows="10" placeholder="Message" required></textarea>
                                            @error('message')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="quote_button">
                                            <button class="btn" type="submit">SUBMIT NOW</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div id="status"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-contact-box wow fadeInLeft">
                        <div class="single-contact-thumb">
                            <img style="object-fit: cover" src="{{ asset('backend/assets/img/contactimg.jpg') }}"
                                height="600" width="500" alt="Contact Us Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="map-section">
        <div class="container">
            <div class="row mg-pt">
                <div class="col-lg-12 p-0">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48384.367867189205!2d-74.01058227968896!3d40.71751035716885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1609671967457!5m2!1sen!2sbd"
                        width="1920" height="520" style="border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection

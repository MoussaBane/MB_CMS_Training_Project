@extends('frontend.layout')
@section('title', 'Contact Us')

@section('content')
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3 text-color"><b>Contact Us</b> </h1>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <!-- Embedded Google Map centered on Mali -->
                <iframe width="100%" height="450px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    src="https://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=17.570692,-3.996166&amp;spn=5.078163,10.617675&amp;t=m&amp;z=5&amp;output=embed"></iframe>
            </div>

            <!-- Contact Details Column -->
            <div class="col-lg-4 mb-4">
                <div class=" card">
                    <div class=" card-body">
                        <h3 align='center'><b>Contact Details</b></h3>
                        <hr>
                        <p>
                            {!! $address !!}
                            {{ $neighborhood }}/{{ $city }}
                            <br>
                        </p>
                        <p>
                            <b>P1:</b> {{ $fix_phone }} <br>
                            <b>P2:</b> {{ $phone_gsm }}
                        </p>

                        <p>
                            <b>E:</b>
                            <a href="mailto:{{ $mail }}">{{ $mail }}
                            </a>
                        </p>
                        <p>
                            <b>H:</b> {{ $work_times }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class=" card">
                    <div class=" card-body">
                        <h3 class=" mb-4 mt-0" align='center'><b>Send us a Message</b></h3>
                        <hr>
                        @if (session()->has('success'))
                            <div class=" alert alert-success">
                                {{ session('success') }}
                            </div>
                            <br>
                        @elseif(session()->has('error'))
                            <div class=" alert alert-danger">
                                {{ session('error') }}
                            </div>
                            <br>
                        @endif
                        <form method="POST">
                            @csrf
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label><b>Full Name:</b></label>
                                    <input type="text" class="form-control" name="full_name"
                                        data-validation-required-message="Please enter your name." required>
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label><b>Phone Number:</b></label>
                                    <input type="tel" class="form-control" name="phone"
                                        data-validation-required-message="Please enter your phone number." required>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label><b>Email Address:</b></label>
                                    <input type="email" class="form-control" name="from"
                                        data-validation-required-message="Please enter your email address." required>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label><b>Subject:</b></label>
                                    <input type="text" class="form-control" name="subject"
                                        data-validation-required-message="Please enter your email address." required>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label><b>Message:</b></label>
                                    <textarea rows="5" cols="100" class="form-control" name="message" required
                                        data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

        <br><br><br>

    </div>
@endsection

@section('css')
@endsection

@section('js')
@endsection

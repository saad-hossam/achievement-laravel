@extends("layouts.front.master")
@section('content')





<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-1 text-white animated slideInDown" data-translate="page_header.breadcrumb_title">
            {{ __('contact.page_header.breadcrumb_title') }}
        </h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item">
                    <a class="text-white" href="#" data-translate="page_header.breadcrumb_home">
                        {{ __('contact.page_header.breadcrumb_home') }}
                    </a>
                </li> /
                {{-- /<li class="breadcrumb-item">
                    <a class="text-white" href="#" data-translate="page_header.breadcrumb_pages">
                        {{ __('contact.page_header.breadcrumb_pages') }}
                    </a>
                </li> --}}
                <li class="breadcrumb-item text-primary active" aria-current="page">
                    <a class="text-white" href="#" data-translate="page_header.breadcrumb_contact">
                        {{ __('contact.page_header.breadcrumb_contact') }}
                    </a>
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
    <h4 class="section-title" data-translate="contact_section.section_title">
        {{ __('contact.contact_section.section_title') }}
    </h4>
    <h6 class="display-5 mb-4" data-translate="contact_section.section_subtitle">
        {{ __('contact.contact_section.section_subtitle') }}
    </h6>
</div>
  <!-- Google Map Start -->
  <div class="container  px-0 wow fadeIn" data-wow-delay="0.1s">
    <iframe class="w-100 mb-n2" style="height: 450px;"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
        frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<!-- Google Map End -->


<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        {{-- <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title" data-translate="contact_section.section_title">
                {{ __('contact.contact_section.section_title') }}
            </h4>
            <h6 class="display-5 mb-4" data-translate="contact_section.section_subtitle">
                {{ __('contact.contact_section.section_subtitle') }}
            </h6>
        </div> --}}
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-flex flex-column justify-content-between h-100">
                    <div class="bg-light d-flex align-items-center w-100 p-4 mb-4">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark" style="width: 55px; height: 55px;">
                            <i class="fa fa-map-marker-alt text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2" data-translate="contact_section.address_label">
                                {{ __('contact.contact_section.address_label') }}
                            </p>
                            <h3 class="mb-0">123 Street, New York, USA</h3>
                        </div>
                    </div>
                    <div class="bg-light d-flex align-items-center w-100 p-4 mb-4">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark" style="width: 55px; height: 55px;">
                            <i class="fa fa-phone-alt text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2" data-translate="contact_section.phone_label">
                                {{ __('contact.contact_section.phone_label') }}
                            </p>
                            <h3 class="mb-0">+012 345 6789</h3>
                        </div>
                    </div>
                    <div class="bg-light d-flex align-items-center w-100 p-4">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark" style="width: 55px; height: 55px;">
                            <i class="fa fa-envelope-open text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2" data-translate="contact_section.email_label">
                                {{ __('contact.contact_section.email_label') }}
                            </p>
                            <h3 class="mb-0">info@example.com</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <h3 class="mb-4 text-center" >
                    {{trans('contact.email_label1')}}


                </h3>
                <form action="{{route('messages.store')}}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" data-translate="contact_section.form.name_placeholder">
                                <label for="name" data-translate="contact_section.form.name_placeholder">
                                    {{ __('contact.contact_section.form.name_placeholder') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" data-translate="contact_section.form.email_placeholder">
                                <label for="email" data-translate="contact_section.form.email_placeholder">
                                    {{ __('contact.contact_section.form.email_placeholder') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" name="message" id="message" style="height: 110px" data-translate="contact_section.form.message_placeholder"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit" data-translate="contact_section.form.submit_button">
                                {{ __('contact.contact_section.form.submit_button') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->


@endsection

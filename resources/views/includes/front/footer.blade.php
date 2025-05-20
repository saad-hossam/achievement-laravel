<!-- Footer Start -->
<div class="container-fluid bg-dark text-body footer mt-5 pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <h3 class="text-light mb-4" data-translate="footer.address.title">
                    {{ __('footer.address.title') }}
                </h3>
                <p class="mb-2">
                    <i class="fa fa-map-marker-alt text-primary me-3"></i>
                    123 Street, New York, USA
                </p>
                <p class="mb-2">
                    <i class="fa fa-phone-alt text-primary me-3"></i>
                    +012 345 67890
                </p>
                <p class="mb-2">
                    <i class="fa fa-envelope text-primary me-3"></i>
                    info@example.com
                </p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-body me-1" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-body me-1" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-body me-1" href="#"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-outline-body me-0" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <h3 class="text-light mb-4" data-translate="footer.services.title">
                    {{ __('footer.services.title') }}
                </h3>
                @foreach ($services as $service)
                    <a class="btn btn-link" href="#">{{ $service->translate(app()->getLocale())->name }}</a>
                @endforeach
            </div>

            <div class="col-lg-3 col-md-6">
                <h3 class="text-light mb-4" data-translate="footer.quickLinks.title">
                    {{ __('footer.quickLinks.title') }}
                </h3>
                <a class="btn btn-link" href="#" data-translate="footer.quickLinks.links.home">
                    {{ __('footer.quickLinks.links.home') }}
                </a>
                <a class="btn btn-link" href="#" data-translate="footer.quickLinks.links.contact">
                    {{ __('footer.quickLinks.links.contact') }}
                </a>
                <a class="btn btn-link" href="#" data-translate="footer.quickLinks.links.about">
                    {{ __('footer.quickLinks.links.about') }}
                </a>
                <a class="btn btn-link" href="#" data-translate="footer.quickLinks.links.services">
                    {{ __('footer.quickLinks.links.services') }}
                </a>
            </div>

            <div class="col-lg-3 col-md-6">
                <h3 class="text-light mb-4" data-translate="footer.newsletter.title">
                    {{ __('footer.newsletter.title') }}
                </h3>
                <iframe class="w-100 mb-n2 pb-5" style="height:300px"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>

    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0" data-translate="footer.copyright.title">
                    &copy; <a href="#" data-translate="footer.links.siteName">
                        {{ __('footer.links.siteName') }}
                    </a>, {{ __('footer.copyright.title') }}.
                </div>
                <div class="col-md-6 text-center text-md-end" data-translate="footer.copyright.designedBy">
                    <a href="https://htmlcodex.com" data-translate="footer.links.designedBy">
                        {{ __('footer.links.designedBy') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

@extends('layouts.front.master')
@section('content')
    <!-- login Start -->
    <div style="width: 100%;height: 150px;"></div>
    <div class="container  bg-white pt-5">
        <div class="container mx-5 d-flex justify-content-center ">
            <div class="col-md-6 mx-5">
                <div class="wow fadeInUp rounded" data-wow-delay="0.5s">
                    <form class="" style="border: 2px solid rgba(0, 0, 0, 0.204);padding: 10px;" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h1 style="text-align: center; color: #c39e1e; background-color: #000; padding: 15px"> تسجيل الدخول
                        </h1>
                        <!-- <p style="font-size: 23px; text-align: center ;">   الى فريق عمل شركتنا</p> -->
                        <div class="row g-6 rounded">

                            <div class="col-md-12">
                                <div class="form-group  ">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control rounded " placeholder="Email" name="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <!-- </div>            -->
                            <div class="col-md-12">
                                <div class="form-group  ">
                                    <label for="password">password</label>
                                    <input type="password" class="form-control rounded " placeholder="password"
                                        name="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <br>
                            <div class="col-md-3"></div>
                            <div class="col-md-6 m-auto mt-2 text-aline-center">
                                <button class="btn btn-primary" type="submit">تسجيل الدخول</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div style="width: 100%;height: 50px;"></div>

    <!-- login End -->
@endsection
{{-- <section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h3 class="mb-5">Sign in</h3>

              <div class="form-outline mb-4">
                <input type="email" id="typeEmailX-2" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX-2">Email</label>
              </div>

              <div class="form-outline mb-4">
                <input type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX-2">Password</label>
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-start mb-4">
                <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                <label class="form-check-label" for="form1Example3"> Remember password </label>
              </div>

              <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

              <hr class="my-4">

              <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
                type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
              <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
                type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

{{-- @extends('layouts.dashbord.master')

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">إضافه رساله</h4>
            </div>
        </div>
        @can('message-list')
        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('messages.index') }}">عرض الرسائل</a>

        </div>

        @endcan
    </div>
    <!-- breadcrumb -->
@endsection
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/admin/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <!-- row opened -->

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-info">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form method="post" action="{{ route('messages.store') }}" class="needs-validation was-validated">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="name">الاسم</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="name" required name="name"
                                        oninvalid="setCustomValidity('Please enter alphabets only. ')">
                                    @error('name')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="email">الايميل</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" id="email" required name="email"
                                        oninvalid="setCustomValidity('Please enter alphabets only. ')">
                                    @error('email')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="message">الرساله</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="message" required name="message"
                                        oninvalid="setCustomValidity('Please enter alphabets only. ')">
                                    @error('message')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block">save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/admin/plugins/select2/js/select2.min.js')}}"></script>
<!-- Form-layouts js -->
<script src="{{URL::asset('assets/admin/js/form-layouts.js')}}"></script>
@endsection
 --}}

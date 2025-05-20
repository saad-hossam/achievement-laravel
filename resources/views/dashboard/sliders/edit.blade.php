@extends('layouts.dashbord.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تعديل العرض</h4>
            </div>
        </div>
        @can('sliders-list')

        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('sliders.index') }}">جميع العروض</a>

        </div>
        @endcan
    </div>
    <!-- breadcrumb -->
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-info">{{ $error }}</div>
                        @endforeach
                    @endif






                    <form method="post" action="{{ route('sliders.update', $slider->id) }}" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header">
                                <strong>{{ __('words.translations') }}</strong>
                            </div>
                            <div class="card-block">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    @foreach (config('app.languages') as $key => $lang)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($loop->index == 0) active @endif" id="home-tab" data-toggle="tab" href="#{{ $key }}" role="tab" aria-controls="home" aria-selected="true">{{ $lang }}</a>
                                    </li>
                                    @endforeach

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    @foreach (config('app.languages') as $key => $lang)
                                    <div class="tab-pane mt-3 fade @if ($loop->index == 0) show active in @endif" id="{{ $key }}" role="tabpanel" aria-labelledby="home-tab">
                                        <br>
                                        <div class="form-group mt-3 col-md-12">
                                            <label> العنوان-- {{ $lang }}</label>
                                            <input type="text" name="{{$key}}[title]" value="{{ $slider->translate($key)->title }}" class="form-control" placeholder="العنوان">
                                        </div>

                                        {{-- <div class="form-group mt-3 col-md-12">
                                            <label>  المحتوى-- {{ $lang }}</label>
                                            <input type="text" name="{{$key}}[description]" class="form-control" placeholder="المحتوى">
                                        </div> --}}

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-lable h5" for="status">الصوره</label>
                            <div class="form-group">
                                <input name="image" type="file" class="dropify" data-height="200" multiple />
                                <a type="image" target="_blank"
                                    href="{{ '/images/sliders/' . $slider->image }}">
                                    <img class="rounded float-start h-25" style="max-width:30px; max-height:30px"
                                        src="{{ '/images/sliders/' . $slider->image }}">
                                </a>
                            </div>
                        </div>

                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">حاله العميل</label>
                                <div class="form-group">
                                    <select class="form-control select2-search" id="status" name="status">
                                        @if ($slider->status == 'active')
                                            <option value="active" selected>مفعل</option>
                                            <option value="disabled">غير مفعل</option>
                                        @else
                                            <option value="active">مفعل</option>
                                            <option value="disabled" selected>غير مفعل</option>
                                        @endif

                                    </select>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!--Internal  Select2 js -->
    <script src="{{ URL::asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.steps js -->
    <script src="{{ URL::asset('assets/admin/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!--Internal  Form-wizard js -->
    {{-- <script src="{{URL::asset('assets/admin/js/form-wizard.js')}}"></script> --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#client_address'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

            ClassicEditor
            .create(document.querySelector('#client_note'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#client_stats_note'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

    </script>

@endsection

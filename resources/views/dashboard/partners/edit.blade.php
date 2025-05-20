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
                <h4 class="content-title mb-0 my-auto">تعديل الشريك</h4>
            </div>
        </div>
        @can('partner-list')
        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('partners.index') }}">جميع الشركاء</a>

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

                    <form method="post" action="{{ route('partners.update', $partner->id) }}" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6">
                            <!-- Name Field -->
                            <div class="form-group">
                                <label>الاسم</label>
                                <input type="text" name="name" value="{{ $partner->name }}" class="form-control" placeholder="الاسم">
                            </div>

                            <!-- Logo Upload -->
                            <div class="row row-xs formgroup-wrapper">
                                <div class="col-md-6 mg-t-20 mg-md-t-0">
                                    <label class="form-lable h5" for="logo">الصوره الحالية</label>
                                    @if($partner->logo)
                                        <div class="mb-3">
                                            <img src="{{ asset('images/partners/' . $partner->logo) }}" alt="Partner Logo" width="100">
                                        </div>
                                    @else
                                        <p>لا توجد صورة حالية</p>
                                    @endif

                                    <label class="form-lable h5" for="logo">تحديث الصورة</label>
                                    <div class="form-group">
                                        <input name="logo" type="file" class="form-control" />
                                    </div>
                                </div>

                                <!-- Status Field -->
                                <div class="col-md-6 mg-t-20 mg-md-t-0">
                                    <label class="form-lable h5" for="status">حاله العميل</label>
                                    <div class="form-group">
                                        <select class="form-control select2-search" id="status" name="status">
                                            <option value="active" {{ $partner->status == 'active' ? 'selected' : '' }}>مفعل</option>
                                            <option value="disabled" {{ $partner->status == 'disabled' ? 'selected' : '' }}>غير مفعل</option>
                                        </select>
                                    </div>
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

@extends('layouts.dashbord.master')

@section('css')
    <link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">اضافه قسم</h4>
            </div>
        </div>
        @can('department-list')
            <div class="d-flex my-xl-auto right-content">
                <a class="btn btn-primary btn-block" href="{{ route('departments.index') }}">جميع الاقسام</a>
            </div>
        @endcan
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('departments.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="card-header">
                                <strong>{{ __('words.translations') }}</strong>
                            </div>
                            <div class="card-block">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @foreach (config('app.languages') as $key => $lang)
                                        <li class="nav-item">
                                            <a class="nav-link @if ($loop->index == 0) active @endif" id="{{ $key }}-tab" data-toggle="tab" href="#{{ $key }}" role="tab" aria-controls="{{ $key }}" aria-selected="true">{{ $lang }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    @foreach (config('app.languages') as $key => $lang)
                                        <div class="tab-pane mt-3 fade @if ($loop->index == 0) show active in @endif" id="{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}-tab">
                                            <div class="form-group mt-3 col-md-12">
                                                <label>الاسم -- {{ $lang }}</label>
                                                <input type="text" name="{{ $key }}[name]" id="name-{{ $key }}" class="form-control" placeholder="الاسم" required value="{{ old($key . '.name') }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="row row-xs formgroup-wrapper">
                            <div class="col-md-6">
                                <label class="form-label h5" for="image">الصوره</label>
                                <div class="form-group">
                                    <input name="image" type="file" class="form-control" >
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <label class="form-label h5" for="status">حاله القسم</label>
                                <div class="form-group">
                                    <select class="form-control select2-search" id="status" name="status" required>
                                        <option value="active" selected>مفعل</option>
                                        <option value="disabled">غير مفعل</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-3">
                            <button class="btn btn-main-primary pd-x-20" type="submit">حفظ</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2-search').select2();
        });
    </script>
@endsection

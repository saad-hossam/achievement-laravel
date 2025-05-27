@extends('layouts.dashbord.master')

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاعمال السابقه</h4>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            @if(isset($achievement))
                <a class="btn btn-primary btn-block" href="{{ route('achievements.edit', $achievement_id) }}">الاعمال السابقه</a>
            @endif
        </div>
    </div>
@endsection

{{-- @section('css') --}}
@section('css')
<!-- Internal Select2 CSS -->
<link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<!-- Internal Quill Editor CSS -->
<link href="{{ URL::asset('assets/admin/plugins/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/admin/plugins/quill/quill.bubble.css') }}" rel="stylesheet">
<!-- Internal File Upload CSS -->
<link href="{{ URL::asset('assets/admin/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
<!-- Internal Fancy Uploader CSS -->
<link href="{{ URL::asset('assets/admin/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
<!-- CKEditor CSS -->
<link href="{{ URL::asset('assets/admin/plugins/ckeditor/ckeditor.css') }}" rel="stylesheet">
@endsection
    {{-- <link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet"> --}}
{{-- @endsection --}}

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-info">{{ $errors->first() }}</div>
                @endif

                <form method="post" action="{{ route('achievement_media.store') }}" class="needs-validation was-validated" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="achievement_id" value="{{ $achievement_id ?? '' }}">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="type">نوع المديا</label>
                            </div>
                            <div class="col-md-10">
                                <select name="type" id="type" class="form-control SlectBox" onchange="show()">
                                    <option value="" selected disabled>اختر نوع الميديا</option>
                                    <option value="image">صوره</option>
                                    <option value="video">فيديو</option>
                                </select>
                                @error('type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div id="input"></div>

                    <button class="btn btn-primary btn-block">حفظ</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/fileupload.js') }}"></script>
{{-- <script>
</script> --}}
<script src="{{ URL::asset('assets/admin/js/form-layouts.js') }}"></script>

<script>
    function show() {
        const input = document.getElementById('input');
        const type = document.getElementById('type').value;

        input.innerHTML = '';

        if (type === 'image') {
            input.innerHTML = `
            <div class="col-md-12 mt-3 mb-3">
                <label>الصورة الرئيسية</label>
                <input type="file" multiple class="form-control" id="file" required name="file[]">
                </div>
                `;
                $('.dropify').dropify();
            } else if (type === 'video') {
                input.innerHTML = `
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3"><label for="file">رابط الفيديو</label></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="file" required name="file" placeholder="رابط الفيديو">
                            </div>
                        </div>
                    </div>
                `;
            }
        }
    </script>


@endsection

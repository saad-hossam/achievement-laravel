@extends('layouts.dashbord.master')

@section('css')
<!--- Internal Select2 css-->
<link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/admin/plugins/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/admin/plugins/quill/quill.bubble.css') }}" rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{ URL::asset('assets/admin/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
<!---Internal Fancy uploader css-->
<link href="{{ URL::asset('assets/admin/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
<!---Internal  Prism css-->
<link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
<!--- Custom-scroll -->
<link href="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">


<link href="{{URL::asset('assets/admin/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/admin/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/admin/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">

@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">تعديل الانجاز</h4>
        </div>
    </div>
    @can('achievement-list')
    <div class="d-flex my-xl-auto right-content">
        <a class="btn btn-primary btn-block" href="{{ route('achievements.index') }}">جميع الانجازات</a>
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
                @foreach ($errors->all() as $error)
                <div class="alert alert-info">{{ $error }}</div>
                @endforeach
                @endif

                <form method="POST" action="{{ route('achievements.update', $achievement->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Translations Tab -->
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
                                        <label> الاسم-- {{ $lang }}</label>
                                        <input type="text" name="{{ $key }}[title]" id="title-{{ $key }}" class="form-control" placeholder="الاسم" required value="{{ old($key . '.title', strip_tags(optional($achievement->translate($key))->title ?? '')) }}">
                                        {{-- <input type="text" name="{{ $key }}[title]" id="title-{{ $key }}" class="form-control" placeholder="الاسم" required value="{{ old($key . '.title',{!! $achievement->translate($key))->title !!} }}"> --}}
                                    </div>
                                    <div class="form-group mt-3 col-md-12">
                                        <label> الوصف-- {{ $lang }}</label>
                                        <textarea id="desc_{{ $key }}" name="{{ $key }}[desc]" class="form-control" placeholder="Textarea" rows="5">{!! $achievement->translate($key)->desc !!}</textarea>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Main Image Section -->
                    <div class="row row-xs formgroup-wrapper">
                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-lable h5" for="department_id">اختار القسم</label>
                            <div class="form-group">
                                <select class="form-control select2-search" id="department_id" name="department_id">
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" @if ($achievement->department_id == $department->id) selected @endif>
                                        {!! $department->name !!}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>تاريخ الانجاز</label>
                            <input class="form-control fc-datepicker" name="achievement_date" placeholder="MM/DD/YYYY" type="text" value="{{ $achievement->achievement_date }}">
                        </div>
                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-lable h5" for="status">حاله العميل</label>
                            <div class="form-group">
                                <select class="form-control select2-search" id="status" name="status">
                                    <option value="active" @if ($achievement->status == 'active') selected @endif>مفعل</option>
                                    <option value="disabled" @if ($achievement->status == 'disabled') selected @endif>غير مفعل</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-lable h5" for="image">الصوره الرئيسية</label>
                            <div class="form-group">
                                <input name="image_layout" type="file" class="dropify" data-height="200" />
                                <div class="existing-images mt-3">

                                    @if ($achievement->image_layout)
                                    <a type="image" target="_blank" href="{{ '/images/achievements/' . $achievement->image_layout }}">
                                        <img class="rounded " style="max-width: 100px; max-height: 100px;" src="{{ '/images/achievements/' . $achievement->image_layout }}">
                                    </a>


                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Additional Images Section -->
                        {{-- <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-lable h5" for="images">الصور الإضافية</label>

                            <div class="form-group">
                                <input name="images[]" type="file" class="dropify" data-height="200" multiple />

                                @if ($achievement->images)
                                    <div class="existing-images mt-3">
                                        @foreach ($achievement->images as $image)
                                            <a href="{{ asset('images/achievements/gallary/' .$image) }}" target="_blank">
                        <img src="{{ asset('images/achievements/gallary/' .$image) }}" class="rounded" style="max-width: 100px; max-height: 100px;">
                        </a>
                        @endforeach
                    </div>
                    @endif
            </div>
        </div> --}}


        <!-- Submit Button -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
        </div>
        </form>
    </div>
</div>
</div>
</div>
<div class="container p-3">

    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="col-sm-1 col-md-2">
                        @can('achievement_link-create ')
                        <a class="btn btn-primary btn-block" href="{{ route('achievement.links.create',$achievement->id) }}">اضافه لينك</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive hoverable-table">
                        @can('achievement_link-list ')

                        <table class="table table-hover  text-md-nowrap" id="example1" data-page-length='50' style=" text-align: center;">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">عنوان الينك</th>
                                    <th class="wd-15p border-bottom-0">URL</th>
                                    <th class="wd-15p border-bottom-0">عمليات </th>

                                </tr>
                            </thead>
                            <tbody>
                                @if ($links->count()>0)
                                @foreach ($links as $link)
                                <tr>
                                    <td>{{ $link->id }}</td>
                                    <td>{!! $link->title !!}</td>
                                    <td>{!! $link->url !!}</td>
                                    <td>
                                        @can('achievement_link-edit')

                                        <a href="{{ route('achievement_links.edit', $link->id) }}" class="btn btn-sm btn-info" title="تعديل"><i class="las la-pen"></i></a>
                                        @endcan
                                        @can('achievement_link-delete')
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                        data-link_id="{{ $link->id }}"
                                        data-username="{!! $link->title !!}"
                                        data-toggle="modal" href="#modaldemo8" title="حذف">
                                        <i class="las la-trash"></i>
                                     </a>

                                        @endcan
                                    </td>
                                </tr>
                                @endforeach

                                @endif
                            </tbody>
                        </table>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

        <!-- Modal effects -->
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content modal-content-demo">
                <div class="modal-header">
                  <h6 class="modal-title">حذف اللينك</h6>
                  <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{ route('achievement_links.destroy',0) }}" method="post">
                  {{ method_field('delete') }}
                  {{ csrf_field() }}
                  <div class="modal-body">
                    <p>هل انت متأكد من حذف هذا اللينك؟</p><br>
                    <input type="hidden" name="achievement_link_id" id="link_id" value="">
                    <input class="form-control" name="username" id="username" type="text" readonly>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">


            <div class="card">
                <div class="card-header pb-0">
                    <div class="col-sm-1 col-md-2">
                        @can('achievement_media-create')
                        <a class="btn btn-primary btn-block" href="{{ route('achievement.media.create',$achievement->id) }}">اضافه ملفات</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive hoverable-table">
                        @can('achievement_media-list')

                        <table class="table table-hover  text-md-nowrap" id="example1" data-page-length='50' style=" text-align: center;">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">image</th>
                                    <th class="wd-15p border-bottom-0">عمليات </th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($media as $file )
                                <tr>

                                    @if($file->type=='image')
                                    <td> <a type="image" target="_blank" href="{{ asset('images/achievements/' . $file->path) }}">
                                        <img class="rounded float-start" style="width:160px; max-height:100px" src="{{ asset('images/achievements/' . $file->path) }}">
                                    </a></td>
                                    @else
                                    <td> <iframe width="250" height="125" src="{{ $file->path }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></td>
                                    @endif
                                    <td>
                                        {{-- @can('link-edit') --}}

                                        {{-- <a href="{{ route('achievement_links.edit', $link->id) }}" class="btn btn-sm btn-info" title="تعديل"><i class="las la-pen"></i></a> --}}
                                        {{-- @endcan     --}}
                                        {{-- @can('link-delete') --}}
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                        data-media_id="{{ $file->id }}"
                                        data-toggle="modal" href="#modaldemo9" title="حذف">
                                        <i class="las la-trash"></i>
                                     </a>

                                        {{-- @endcan --}}
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td>
                                        <span>not found !!!</span></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        @endcan

                    </div>

                </div>
            </div>

        </div>

    </div>
    <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content modal-content-demo">
            <div class="modal-header">
              <h6 class="modal-title">حذف الملف</h6>
              <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('achievement_media.destroy',0) }}" method="post">
              {{ method_field('delete') }}
              {{ csrf_field() }}
              <div class="modal-body">
                <p>هل انت متأكد من حذف هذا الملف؟</p><br>
                <input type="hidden" name="achievement_media_id" id="media_id" value="">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                <button type="submit" class="btn btn-danger">تاكيد</button>
              </div>
            </form>
          </div>
        </div>
      </div>

</div>
@endsection

@section('js')


<!-- Internal JS Libraries -->
<script src="{{ URL::asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/file-upload.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/ckeditor/ckeditor.js') }}"></script>
<script>
    @foreach (config('app.languages') as $key => $lang)
    ClassicEditor
        .create(document.querySelector('#desc_{{ $key }}'))
        .catch(error => console.error('Error initializing CKEditor for description:', error));
@endforeach

</script>
<script>
    $('.dropify').dropify();

</script>
<script>
    // مودال حذف اللينك
    $('#modaldemo8').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var link_id = button.data('link_id')
        var username = button.data('username')
        var modal = $(this)
        modal.find('.modal-body #link_id').val(link_id)
        modal.find('.modal-body #username').val(username)
    })

    // مودال حذف الميديا
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var media_id = button.data('media_id')
        var modal = $(this)
        modal.find('.modal-body #media_id').val(media_id)
    })
</script>
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/admin/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/admin/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/admin/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/admin/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('assets/admin/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('assets/admin/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/admin/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('assets/admin/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('assets/admin/js/form-elements.js')}}"></script>

@endsection

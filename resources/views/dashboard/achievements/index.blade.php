@extends('layouts.dashbord.master')
@section('css')

@section('title')
    الانجازات
@stop

<!-- Internal Data table css -->

<link href="{{ URL::asset('assets/admin/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/admin/admin/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/admin/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/admin/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/admin/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/admin/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الانجازات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                الانجازات</span>
        </div>
    </div>
    @can('achievement-create')

    <div class="d-flex my-xl-auto right-content">
        <a class="btn btn-primary btn-block" href="{{ route('achievements.create') }}">اضافه انجاز</a>
    </div>
    @endcan
</div>
<!-- breadcrumb -->
@endsection

@section('content')
{{--
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif --}}

@if (session()->has('add'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ session()->get('add') }}",
                type: "success"
            });
        }

    </script>
@endif

@if (session()->has('edit'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ session()->get('edit') }}",
                type: "info"
            });
        }

    </script>
@endif

@if (session()->has('delete'))
    <script>
        window.onload = function() {
            notif({
                msg: " {{ session()->get('delete') }}",
                type: "error"
            });
        }

    </script>
@endif


<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                {{-- <div class="col-sm-1 col-md-2">
                    @can('اضافة مستخدم')
                        <a class="btn btn-primary btn-sm" href="{{ route('users.create') }}">اضافة مستخدم</a>
                    @endcan
                </div> --}}
            </div>
            <div class="card-body">

                <table class="table table-hover text-md-nowrap" id="example1" data-page-length='50' style="text-align: center;">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>عنوان الانجاز</th>
                        <th>اسم القسم</th>
                        {{-- <th>الصورة</th> --}}
                        <th>الحالة</th>
                        <th>عمليات</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($achievements as $achievement)
                        <tr>
                          <td>{{ $achievement->id }}</td>
                          <td>{!! $achievement->title !!}</td>
                          <td>{!! optional($achievement->department)->name !!}</td>
                          {{-- <td>
                            @if($achievement->image_layout)
                              <a target="_blank" href="{{ asset('images/achievements/' . $achievement->image_layout) }}">
                                <img class="rounded" style="max-width:30px; max-height:30px"
                                     src="{{ asset('images/achievements/' . $achievement->image_layout) }}">
                              </a>
                            @endif
                          </td> --}}
                          <td>
                            @if ($achievement->status == 'active')
                              <span class="label text-success d-flex" style="margin-right: 50px;">
                                <div class="dot-label bg-success"></div>مفعل
                              </span>
                            @else
                              <span class="label text-danger d-flex" style="margin-right: 50px;">
                                <div class="dot-label bg-danger"></div>غير مفعل
                              </span>
                            @endif
                          </td>
                          <td>
                            @can('achievement-edit')
                            <a href="{{ route('achievements.edit', $achievement->id) }}" class="btn btn-sm btn-info" title="تعديل">
                              <i class="las la-pen"></i>
                            </a>
                            @endcan

                            @can('achievement-delete')
                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                               data-user_id="{{ $achievement->id }}" data-username="{!! $achievement->title !!}"
                               data-toggle="modal" href="#modaldemo8" title="حذف">
                              <i class="las la-trash"></i>
                            </a>
                            @endcan
                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="6">لا توجد بيانات</td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>


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
                    <h6 class="modal-title">حذف الانجاز</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('achievements.destroy',0) }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="achievement_id" id="user_id" value="">
                        <input class="form-control" name="username" id="username" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/admin/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/admin/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- Internal Modal js-->
<script src="{{ URL::asset('assets/admin/js/modal.js') }}"></script>

<script>
    $('#modaldemo8').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var user_id = button.data('user_id')
        var username = button.data('username')
        var modal = $(this)
        modal.find('.modal-body #user_id').val(user_id);
        modal.find('.modal-body #username').val(username);
    })

</script>



@endsection

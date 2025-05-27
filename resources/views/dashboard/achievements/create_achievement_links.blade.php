@extends('layouts.dashbord.master')

@section('css')
<link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <h4 class="content-title mb-0 my-auto">إضافة روابط انجاز متعدد اللغات</h4>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <h4 class="text-center my-4">إضافة روابط متعددة باللغات</h4>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
    </div>
    @endif

    <form method="POST" action="{{ route('achievement_links.store') }}">
        @csrf

        <div class="table-responsive">
            <table class="table table-bordered" id="dynamic_field">
                <thead>
                    <tr>
                        <th>العنوان (متعدد اللغات)</th>
                        <th>الرابط</th>
                        <th>الإجراء</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="lang-tabs">
                                <ul class="nav nav-tabs">
                                    @foreach (config('app.languages') as $key => $lang)
                                    <li class="nav-item">
                                        <a class="nav-link @if($loop->first) active @endif" data-toggle="tab" href="#row0-{{ $key }}">{{ $lang }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content mt-2">
                                    @foreach (config('app.languages') as $key => $lang)
                                    <div class="tab-pane fade @if($loop->first) show active @endif" id="row0-{{ $key }}">
                                        <input type="text" name="{{ $key }}[title][0]" class="form-control" placeholder="العنوان - {{ $lang }}" required>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="text" name="url[0]" class="form-control" placeholder="https://example.com" required>
                        </td>
                        <td>
                            <button type="button" name="add" id="add" class="btn btn-success">+</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <input type="hidden" name="achievement_id" value="{{ $achievement_id }}">

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
    </form>
</div>
@endsection

@section('js')
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

<script src="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!--Internal  Clipboard js-->
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>
<!-- Internal Prism js-->
<script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>

<script>
    let rowIndex = 1;
    const languages = @json(array_keys(config('app.languages')));

    $('#add').on('click', function () {
        let langTabs = `<ul class="nav nav-tabs">`;
        let tabContent = `<div class="tab-content mt-2">`;

        languages.forEach((lang, idx) => {
            langTabs += `
                <li class="nav-item">
                    <a class="nav-link ${idx === 0 ? 'active' : ''}" data-toggle="tab" href="#row${rowIndex}-${lang}">${lang}</a>
                </li>`;
            tabContent += `
                <div class="tab-pane fade ${idx === 0 ? 'show active' : ''}" id="row${rowIndex}-${lang}">
                    <input type="text" name="${lang}[title][${rowIndex}]" class="form-control" placeholder="العنوان - ${lang}" required>
                </div>`;
        });

        langTabs += `</ul>`;
        tabContent += `</div>`;

        let newRow = `
            <tr id="row${rowIndex}">
                <td>
                    <div class="lang-tabs">
                        ${langTabs}
                        ${tabContent}
                    </div>
                </td>
                <td>
                    <input type="text" name="url[${rowIndex}]" class="form-control" placeholder="https://example.com" required>
                </td>
                <td>
                    <button type="button" name="remove" id="${rowIndex}" class="btn btn-danger btn_remove">X</button>
                </td>
            </tr>`;

        $('#dynamic_field tbody').append(newRow);
        rowIndex++;
    });

    $(document).on('click', '.btn_remove', function () {
        $('#row' + $(this).attr("id")).remove();
    });
</script>
@endsection

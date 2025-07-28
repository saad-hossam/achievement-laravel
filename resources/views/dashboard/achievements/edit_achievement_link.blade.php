@extends('layouts.dashbord.master')


@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">تعديل الانجاز</h4>
        </div>
    </div>
    @can('achievement_link-list')
    <div class="d-flex my-xl-auto right-content">
        <a class="btn btn-primary btn-block" href="{{ route('achievements.edit',$achievement_link->achievement->id) }}">جميع الانجازات</a>
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

                <form method="POST" action="{{ route('achievement_links.update', $achievement_link->id) }}" enctype="multipart/form-data">
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
                                        <label> العنوان-- {{ $lang }}</label>
                                        <input type="text" name="{{ $key }}[title]" id="title-{{ $key }}" class="form-control" placeholder="عنوان" required value="{{ old($key . '.title', strip_tags(optional($achievement_link->translate($key))->title ?? '')) }}">
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group mt-3 col-md-12">
                            <label> Url</label>
                            <input type="text" name="url" id="title-{{ $key }}" class="form-control" placeholder="الاسم" required value="{{$achievement_link->url}}">
                        </div>

                    </div>

                    <!-- Main Image Section -->


                        <!-- Submit Button -->
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection

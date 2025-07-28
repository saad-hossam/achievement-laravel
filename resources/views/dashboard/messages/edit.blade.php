{{-- @extends('layouts.dashbord.master')

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Edit Teacher</h4>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('teachers.index') }}">All Teachers</a>

        </div>
    </div>
    <!-- breadcrumb -->
@endsection


@section('content')
    <!-- row opened -->
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-info">{{ $errors->first() }}</div>
                    @endif
                    <form method="post" action="{{ route('teachers.update', $teacher['id']) }}"
                        class=" needs-validation was-validated">
                        @csrf
                        @method('PUT')
                        <input type="text" hidden name="idx" value="{{ $teacher['id'] }}">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="name">Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control"
                                        value="{{ old('name') ?? $teacher['name'] }}" id="name" name="name"
                                        required=""
                                        oninvalid="setCustomValidity('Please enter alphabets only. ')">
                                </div>
                                @error('name')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="name">Phone</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control"
                                        value="{{ old('name') ?? $teacher['phone'] }}" id="phone" name="phone"
                                        required=""
                                        oninvalid="setCustomValidity('Please enter alphabets only. ')">
                                </div>
                                @error('phone')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="name">Website</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control"
                                        value="{{ old('name') ?? $teacher['website'] }}" id="name" name="website"
                                        required=""
                                        oninvalid="setCustomValidity('Please enter alphabets only. ')">
                                </div>
                                @error('name')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block ">Sbmit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection --}}

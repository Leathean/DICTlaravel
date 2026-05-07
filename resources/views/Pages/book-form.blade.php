@extends('layout.app')

@section('content')

<x-page-header pagetitle="BOOK FORM" class="bg-warning" />

<div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>All form elements <small>With custom checbox and radion elements.</small></h5>

            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>

                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>

                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <a href="#" class="dropdown-item">Config option 1</a>
                    </li>

                    <li>
                        <a href="#" class="dropdown-item">Config option 2</a>
                    </li>
                </ul>

                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>

        <div class="ibox-content">

            <form enctype="multipart/form-data"
                action="{{ isset($data) ? route('books.update', $data->id) : route('books.store') }}"
                method="POST">

                @csrf

                @if(isset($data))
                    @method('PUT')
                @endif

                <!-- TITLE -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>

                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control"
                            name="title"
                            value="{{ old('title', $data->title ?? '') }}">

                        @error('title')
                        <div class="text-danger" style="display:inline">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>


                <!-- DESCRIPTION -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>

                    <div class="col-sm-10">
                        <textarea class="form-control" name="description">{{ old('description', $data->description ?? '') }}</textarea>

                        @error('description')
                        <div class="text-danger" style="display:inline">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>


                <!-- COUNTRY ID -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Country ID</label>

                    <div class="col-sm-10">
                        <input type="number"
                            class="form-control"
                            name="country_id"
                            min="1"
                            max="50"
                            value="{{ old('country_id', $data->country_id ?? '') }}">

                        @error('country_id')
                        <div class="text-danger" style="display:inline">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>


                <!-- STOCKS -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Stocks</label>

                    <div class="col-sm-10">
                        <input type="number"
                            class="form-control"
                            name="stocks"
                            min="1"
                            max="100"
                            value="{{ old('stocks', $data->stocks ?? '') }}">

                        @error('stocks')
                        <div class="text-danger" style="display:inline">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>


                <!-- AMOUNT -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Amount</label>

                    <div class="col-sm-10">
                        <input type="number"
                            class="form-control"
                            name="amount"
                            min="0"
                            max="1000"
                            step="0.01"
                            value="{{ old('amount', $data->amount ?? '') }}">

                        @error('amount')
                        <div class="text-danger" style="display:inline">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>


                <!-- PHOTO -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Upload Photo</label>

                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="photo" id="photo">

                        @error('photo')
                        <div class="text-danger" style="display:inline">
                            {{ $message }}
                        </div>
                        @enderror

                        <!-- PREVIEW -->
                        <img id="preview"
                            src="{{ isset($data) && $data->photo ? asset('storage/'.$data->photo) : '' }}"
                            style="margin-top:10px; max-width:150px; display:block;">
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-4 col-sm-offset-2">

                        <button class="btn btn-white btn-sm"
                            type="button"
                            onclick="window.history.back()">
                            Cancel
                        </button>

                        <button class="btn btn-primary btn-sm" type="submit">
                            Save changes
                        </button>

                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script>
    document.getElementById('photo').addEventListener('change', function(event) {

        const preview = document.getElementById('preview');

        preview.src = URL.createObjectURL(event.target.files[0]);

    });
</script>
@endpush
``

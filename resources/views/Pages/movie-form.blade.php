@extends('layout.app')

@section('content')

<x-page-header pagetitle="Movie FORM" class="bg-warning" />

<div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>All form elements <small>With custom checkbox and radio elements.</small></h5>
        </div>

        <div class="ibox-content">

            <form enctype="multipart/form-data"
                  action="{{ isset($data) ? route('movies.update', $data->id) : route('movies.store') }}"
                  method="POST">

                @csrf

                @if(isset($data))
                    @method('PUT')
                @endif

                <!-- TITLE -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title"
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
                    </div>
                </div>

                <!-- RATING -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Rating</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" min="1" max="5" name="star_rating"
                               value="{{ old('star_rating', $data->star_rating ?? '') }}">
                               @error('star_rating')
                            <div class="text-danger" style="display:inline">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- DATE -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Date Published</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="date_published"
                               value="{{ old('date_published', $data->date_published ?? '') }}">
                               @error('date_published')
                            <div class="text-danger" style="display:inline">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- DIRECTOR -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Director</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="director"
                               value="{{ old('director', $data->director ?? '') }}">
                               @error('director')
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

                                <!-- preview -->
                               <img id="preview" src="{{ isset($data) && $data->photo ?  asset('storage/'.$data->photo) : '' }}" style="margin-top:10px; max-width:150px; display:block;">
                            </div>
                        </div>

                <!-- BUTTONS -->
                <div class="form-group row">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-white btn-sm" type="button" onclick="window.history.back()">
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

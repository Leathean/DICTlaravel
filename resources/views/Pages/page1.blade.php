@extends('layout.app')

@section('content')

<x-page-header pagetitle="Page 1" class="bg-warning" />

@if (Session::has('success'))
    <p class="alert alert-success">{{ Session::get('success') }}</p>
@endif

@if (Session::has('error'))
    <p class="alert alert-danger">{{ Session::get('error') }}</p>
@endif

<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">

            {{-- BUTTON --}}
            <div class="mb-3">
                <x-action-button class="btn-primary">
                    <x-slot name="button_text">
                        Add a movie
                    </x-slot>

                    <x-slot name="link">
                        {{ route('movies.create') }}
                    </x-slot>
                </x-action-button>
            </div>

            <div class="ibox">

                <div class="ibox-title">
                    <h5>List of Movies</h5>
                </div>

                <div class="ibox-content">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover dataTables-example">

                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Star Rating</th>
                                    <th>Photo</th>
                                    <th>Date Published</th>
                                    <th>Director</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $d->id }}</td>
                                        <td>{{ $d->title }}</td>
                                        <td>{{ $d->description }}</td>

                                        <td>{{ $d->category->name ?? 'No Category' }}</td>

                                        <td>{{ $d->star_rating }}</td>

                                        <td>
                                            @if($d->photo)
                                                <img src="{{ asset('storage/' . $d->photo) }}"
                                                     width="80"
                                                     height="80"
                                                     style="object-fit: cover;">
                                            @endif
                                        </td>

                                        <td>{{ $d->date_published }}</td>
                                        <td>{{ $d->director }}</td>

                                        <td class="text-nowrap">

                                            {{-- EDIT --}}
                                            <a href="{{ route('movies.edit', $d->id) }}"
                                               class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>

                                            {{-- DELETE --}}
                                            <form action="{{ route('movies.destroy', $d->id) }}"
                                                  method="POST"
                                                  style="display:inline;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Delete?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection

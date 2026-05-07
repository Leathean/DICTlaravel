@extends('layout.app')

@section('content')

<x-page-header pagetitle="Page 2" class="bg-primary" />
@if (Session::has('success'))
    <p class="alert alert-success">{{ Session::get('success') }}</p>
@endif
@if (Session::has('error'))
    <p class="alert alert-danger">{{ Session::get('error') }}</p>
@endif
<div class="wrapper wrapper-content animated fadeInRight">
<x-action-button class="btn-primary">
    <x-slot name="button_text">
        Add a book
    </x-slot>

    <x-slot name="link">
        {{ route('books.create') }}
    </x-slot>
</x-action-button>
    <div class="row">
        <div class="col-lg-12">

            <div class="ibox">

                <div class="ibox-title">
                    <h5>List of Books</h5>
                </div>

                <div class="ibox-content">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover dataTables-example">

                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Country ID</th>
                                    <th>Photo</th>
                                    <th>Stocks</th>
                                    <th>Amount</th>

                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->title }}</td>
                                    <td>{{ $d->description }}</td>
                                    <td>{{ $d->country->name ?? 'No country' }}</td>
                                    <td>
                                                <img src="{{ Storage::url($d->photo) }}" width="80" height="80">
                                    </td>
                                    <td>{{ $d->stocks }}</td>
                                    <td>{{ $d->amount }}</td>


                                    <td class="text-nowrap">
                                       <a href="{{route('books.edit', $d->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>

                                    <form action="{{ route('books.destroy', $d->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger"
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

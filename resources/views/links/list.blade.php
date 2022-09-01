@extends('layout')
@section('content_box')
    <div class="container my-5">
            <div class="row">
                <h1 class="my-2 fs-4 fw-bold text-center">Your list Bulldozer Shortener</h1>
                <form action="{{ route('createLink') }}" method="POST" class="my-2">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="url" class="form-control" placeholder="URL Shortener" required>
                        <button class="btn btn-outline-secondary" type="submit">Shorten</button>
                    </div>
                </form>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif (session('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">URL Key</th>
                            <th scope="col">URL Destination</th>
                            <th scope="col">Short URL</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($urls as $key => $item)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $item->url_key }}</td>
                            <td>{{ $item->destination_url }}</td>
                            <td>{{ $item->default_short_url }}</td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $key }}">
                                Delete
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Are you sure?</h5>
                                        <form action="{{ route('deleteLink', $item->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach  
                    </tbody>
                </table>
            </div>
        </div>
@endsection

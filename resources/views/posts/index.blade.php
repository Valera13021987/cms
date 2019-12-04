@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href={{route('posts.create')}} class="btn btn-success float-right">Add post</a>
    </div>

    <div class="card card-default">
        <div class="card-header">
            Posts
        </div>
        @if($posts->count() > 0)
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/'.$post->image) }}" alt="" width="60px" height="60px">
                            </td>
                            <td>{{ $post->title }}</td>
                            @if($post->trashed())
                                <td>
                                    <form action="{{ route('restore-posts', $post->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
                                </td>
                            @endif
                            <td>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        {{ $post->trashed() ? 'Delete' : 'Trash' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <h3 class="text-center">No posts yet</h3>
        @endif
    </div>
@endsection

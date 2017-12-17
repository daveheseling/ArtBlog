@extends('layout')

@section('title', '| All Posts')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-hover" width="100%">
                <thead>
                <th>Artist Name</th>
                <th>Title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Image</th>
                <th>Created At</th>



                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->artist_name}}</td>
                    <td><a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a></td>
                    <td>{{$post->category->name}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->img}}</td>
                    <td>{{$post->created_at}}</td>
                @endforeach
                </tr>
                </tbody>
            </table>

        </div>
    </div>



@endsection
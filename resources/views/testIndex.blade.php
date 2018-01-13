@extends('layout')

@section('title', '| Homepage')

@section('header-button')

                    <div class="header-btns">

                        <a class="btn btn-make-account" href="#"> Make a New Account </a>
                        <a class="btn btn-tour" href="#"> Take a Tour and See Our Posts
                            <i class="fa fa-angle-down"></i>
                        </a>

                    </div>
@endsection

@section('content')



    {{--Slider--}}
    <section class="slider">

        <div class="slider-overlay">

            {{--<div class="container">--}}

                <div class="row">

                    <div class="col-md-12">

                        <div id="carousel-slider" class="carousel slide" data-ride="carousel">
                            <div class="carousel-header text-center">

                                <h1>Artists</h1>

                            </div>
                            {{--indicators--}}
                            <ol class="carousel-indicators">
                                @foreach( $posts as $post )
                                    <li data-target="#carousel-slider" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>

                            {{--wrapper for slides--}}
                            <div class="carousel-inner" role="listbox">

                                @foreach($posts as $post)
                                {{--item 1--}}
                                <div class="item {{ $loop->first ? ' active' : '' }} text-center">

                                    <img src="{{asset('/images/' . $post->img)}}" height="200" width="400" alt="{{$post->artist_name . " _ " . $post->title}}" class="center-block">

                                    <div class="slide-caption">

                                        <h2>{{$post->artist_name}}</h2>
                                        <h3>Title:<a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a></h3>
                                        <h4><span>User</span> <a href="{{route('userShow', $post->id_user)}}"> See author</a></h4>
                                        <p>{{str_limit(strip_tags($post->description), $limit = 50, $end = '...')}}
                                        </p>
                                    </div>

                                </div>
                            @endforeach

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-slider" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-slider" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>


                            </div>

                        </div>

                    </div>

                {{--</div>--}}

            </div>

        </div>

    </section>

    {{--categories--}}
    <section>

        <div class="container">

            <div class="row">

                <div class="col-md-10">

                    <div class="section-title text-center">

                        <h2> Categories</h2>
                        <p>Początek traktatu czasu być uważana.
                            Dopiero możemy nazwać wszechdostatecznością.
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <div class="choose-us-wrapper">

            <div class="container">

                <div class="row">

                    <div class="col-md-6">

                        {{--Caregoties menu--}}
                        <div class="categories-list-menu">

                            <table>
                                <th>aaa</th>
                                <ul>aaa</ul>
                            </table>

                        </div>

                    </div>

                    <div class="col-md-6">

                        {{--Categories list head--}}
                        <div class="categories-list-head">

                            <h2> all post from category nr 1</h2>

                        </div>

                        <div class="categories-list-body">

                            {{--category list of post--}}
                            <div class="categories-list-posts">

                                <div><i class="fa fa-bolt"></i></div>
                                <h3>Kiedy Dobru przypisujemy wieczność, to jest zupełne poznanie niebędzie</h3>

                                <div class="categories-list-posts-btn">
                                    <a class="btn btn-show-more-category" href="#"> Show All Posts </a>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="post-index">
                @foreach($posts as $post)
                    <div class="post-index-single">


                        <div class="image">
                            <img src="{{asset('/images/' . $post->img)}}" height="200" width="400" alt="{{$post->artist_name . " _ " . $post->title}}"/>
                        </div>
                        <div class="artis-name">
                            {{$post->artist_name}}
                        </div>
                        <div class="title">
                            Title:<a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a>
                        </div>



                        <td>{!!str_limit(strip_tags($post->description), $limit = 50, $end = '...')!!}</td>

                    </div>
                @endforeach

            </div>
        </div>
    </div>



@endsection



@section('footer')

    @endsection

@section('scripts')

    <script src="/js/index.js"></script>
@endsection
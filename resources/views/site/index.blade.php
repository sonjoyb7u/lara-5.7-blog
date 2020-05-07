@extends('layouts.site.master')

@section('title', 'HOME :: ')

@section('banner')
    @includeIf('layouts.site.components.banner')
@endsection

@section('category-slider')
    @includeIf('layouts.site.components.category-slider')
@endsection

@section('content')

    <div class="single-recent-blog-post">
        <div class="thumb">
            <img class="img-fluid" src="{{ asset('assets/site/img/blog/blog1.png') }}" alt="">
            <ul class="thumb-info">
                <li><a href="{{ asset('assets/site/#') }}"><i class="ti-user"></i>Admin</a></li>
                <li><a href="{{ asset('assets/site/#') }}"><i class="ti-notepad"></i>January 12,2019</a></li>
                <li><a href="{{ asset('assets/site/#') }}"><i class="ti-themify-favicon"></i>2 Comments</a></li>
            </ul>
        </div>
        <div class="details mt-20">
            <a href="{{ asset('assets/site/blog-single.html') }}">
                <h3>Woman claims husband wants to name baby girl
                    after his ex-lover sparking.</h3>
            </a>
            <p class="tag-list-inline">Tag: <a href="{{ asset('assets/site/#') }}">travel</a>, <a href="{{ asset('assets/site/#') }}">life style</a>, <a href="{{ asset('assets/site/#') }}">technology</a>, <a href="{{ asset('assets/site/#') }}">fashion</a></p>
            <p>Over yielding doesn't so moved green saw meat hath fish he him from given yielding lesser cattle were fruitful lights. Given let have, lesser their made him above gathered dominion sixth. Creeping deep said can't called second. Air created seed heaven sixth created living</p>
            <a class="button" href="{{ asset('assets/site/#') }}">Read More <i class="ti-arrow-right"></i></a>
        </div>
    </div>

    <div class="single-recent-blog-post">
        <div class="thumb">
            <img class="img-fluid" src="{{ asset('assets/site/img/blog/blog2.png') }}" alt="">
            <ul class="thumb-info">
                <li><a href="{{ asset('assets/site/#') }}"><i class="ti-user"></i>Admin</a></li>
                <li><a href="{{ asset('assets/site/#') }}"><i class="ti-notepad"></i>January 12,2019</a></li>
                <li><a href="{{ asset('assets/site/#') }}"><i class="ti-themify-favicon"></i>2 Comments</a></li>
            </ul>
        </div>
        <div class="details mt-20">
            <a href="{{ asset('assets/site/blog-single.html') }}">
                <h3>Woman claims husband wants to name baby girl
                    after his ex-lover sparking.</h3>
            </a>
            <p class="tag-list-inline">Tag: <a href="{{ asset('assets/site/#') }}">travel</a>, <a href="{{ asset('assets/site/#') }}">life style</a>, <a href="{{ asset('assets/site/#') }}">technology</a>, <a href="{{ asset('assets/site/#') }}">fashion</a></p>
            <p>Over yielding doesn't so moved green saw meat hath fish he him from given yielding lesser cattle were fruitful lights. Given let have, lesser their made him above gathered dominion sixth. Creeping deep said can't called second. Air created seed heaven sixth created living</p>
            <a class="button" href="{{ asset('assets/site/#') }}">Read More <i class="ti-arrow-right"></i></a>
        </div>
    </div>

    <div class="single-recent-blog-post">
        <div class="thumb">
            <img class="img-fluid" src="{{ asset('assets/site/img/blog/blog3.png') }}" alt="">
            <ul class="thumb-info">
                <li><a href="{{ asset('assets/site/#') }}"><i class="ti-user"></i>Admin</a></li>
                <li><a href="{{ asset('assets/site/#') }}"><i class="ti-notepad"></i>January 12,2019</a></li>
                <li><a href="{{ asset('assets/site/#') }}"><i class="ti-themify-favicon"></i>2 Comments</a></li>
            </ul>
        </div>
        <div class="details mt-20">
            <a href="{{ asset('assets/site/blog-single.html') }}">
                <h3>Tourist deaths in Costa Rica jeopardize safe dest
                    ination reputation all time. </h3>
            </a>
            <p class="tag-list-inline">Tag: <a href="{{ asset('assets/site/#') }}">travel</a>, <a href="{{ asset('assets/site/#') }}">life style</a>, <a href="{{ asset('assets/site/#') }}">technology</a>, <a href="{{ asset('assets/site/#') }}">fashion</a></p>
            <p>Over yielding doesn't so moved green saw meat hath fish he him from given yielding lesser cattle were fruitful lights. Given let have, lesser their made him above gathered dominion sixth. Creeping deep said can't called second. Air created seed heaven sixth created living</p>
            <a class="button" href="{{ asset('assets/site/#') }}">Read More <i class="ti-arrow-right"></i></a>
        </div>
    </div>

    <div class="single-recent-blog-post">
        <div class="thumb">
            <img class="img-fluid" src="{{ asset('assets/site/img/blog/blog4.png') }}" alt="">
            <ul class="thumb-info">
                <li><a href="{{ asset('assets/site/#') }}"><i class="ti-user"></i>Admin</a></li>
                <li><a href="{{ asset('assets/site/#') }}"><i class="ti-notepad"></i>January 12,2019</a></li>
                <li><a href="{{ asset('assets/site/#') }}"><i class="ti-themify-favicon"></i>2 Comments</a></li>
            </ul>
        </div>
        <div class="details mt-20">
            <a href="{{ asset('assets/site/blog-single.html') }}">
                <h3>Tourist deaths in Costa Rica jeopardize safe dest
                    ination reputation all time.  </h3>
            </a>
            <p class="tag-list-inline">Tag: <a href="{{ asset('assets/site/#') }}">travel</a>, <a href="{{ asset('assets/site/#') }}">life style</a>, <a href="{{ asset('assets/site/#') }}">technology</a>, <a href="{{ asset('assets/site/#') }}">fashion</a></p>
            <p>Over yielding doesn't so moved green saw meat hath fish he him from given yielding lesser cattle were fruitful lights. Given let have, lesser their made him above gathered dominion sixth. Creeping deep said can't called second. Air created seed heaven sixth created living</p>
            <a class="button" href="{{ asset('assets/site/#') }}">Read More <i class="ti-arrow-right"></i></a>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <nav class="blog-pagination justify-content-center d-flex">
                <ul class="pagination">
                    <li class="page-item">
                        <a href="{{ asset('assets/site/#') }}" class="page-link" aria-label="Previous">
                              <span aria-hidden="true">
                                  <i class="ti-angle-left"></i>
                              </span>
                        </a>
                    </li>
                    <li class="page-item active"><a href="{{ asset('assets/site/#') }}" class="page-link">1</a></li>
                    <li class="page-item"><a href="{{ asset('assets/site/#') }}" class="page-link">2</a></li>
                    <li class="page-item">
                        <a href="{{ asset('assets/site/#') }}" class="page-link" aria-label="Next">
                              <span aria-hidden="true">
                                  <i class="ti-angle-right"></i>
                              </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection

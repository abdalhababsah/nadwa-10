@extends('layout.mainlayout')
@section('content')



<!--==================================================-->
<!-- Start projects-area -->
<!--==================================================-->

<div class="portfolio-showcase-area upper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="showcase-title">
                    <h1>Unveiling the Brilliance of Design</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="portfolio_nav">
                    <div class="portfolio_menu">
                        <ul class="menu-filtering">
                            <li data-filter="*">All</li>
                            @foreach ($categories as $category)
                            
                            <li data-filter=".{{$category->value}}">{{$category->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row image_load">
            @foreach ($projects as $project)
            <div class="col-lg-4 col-md-6 grid-item {{$project->category}}">
                <div class="case-study-single-box wow fadeInUp animated">
                    <div class="case-study-thumb2">
                        <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}">
                    </div>
                    <div class="case-study-contents">
                        <div class="case-text">
                            <div class="case-title style2">
                                <h3>{{$project->title}}</h3>
                                <span>{{$project->category}}</span>
                            </div>
                            <div class="showcase-button">
                                <a href="{{url('projects', $project)}}">
                                    View details
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!--==================================================-->
<!-- End projects-area -->
<!--==================================================-->

@endsection
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
                            @foreach ($categories as $index => $category)                            
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
                        <img loading="lazy" src="{{ url('storage/resized-' . $project->image_path) }}" alt="{{ $project->title }}" height="375">
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
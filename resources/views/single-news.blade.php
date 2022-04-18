@extends('layouts.landingpage.main')

@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Read the Details</p>
					<h1>Single Article</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- single article section -->
<div class="mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="single-article-section">
					<div class="single-article-text">
						<img src="{{ asset($news -> photo) }}" alt="" class="p-2"
							style="border-radius: 15px;overflow: hidden">
						<p class="blog-meta">
							<span class="author"><i class="fas fa-user"></i>{{ $news -> user -> name }}</span>
							<span class="date"><i class="fas fa-calendar"></i>{{ $news -> date }} </span>
						</p>
						<h2>{{ $news -> title }}</h2>
						{!! $news -> content !!}
					</div>


				</div>
			</div>
			<div class="col-lg-4">
				<div class="sidebar-section">
					<div class="recent-posts">
						<h4>Recent Posts</h4>
						<ul>
							@foreach ($recents as $recent)
							<li><a href="/news/{{ $recent -> slug }}">{{ $recent -> title }}</a></li>
							@endforeach

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end single article section -->


@endsection
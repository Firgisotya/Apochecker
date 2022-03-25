@extends('layouts.landingpage.main')

@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Organic Information</p>
					<h1>News Article</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- latest news -->
<div class="latest-news mt-150 mb-150">
	<div class="container">
		<div class="row">
			@foreach ($news as $n)
			<div class="col-lg-4 col-md-6">
				<div class="single-latest-news">
					<a href="/news/{{ $n -> slug }}">

						<img src="{{ asset($n -> photo) }}" alt="">

					</a>
					<div class="news-text-box">
						<h3><a href="/news/{{ $n -> slug }}">{{ $n -> title }}</a></h3>
						<p class="blog-meta">
							<span class="author"><i class="fas fa-user"></i> {{ $n -> user -> name }}</span>
							<span class="date"><i class="fas fa-calendar"></i> {{ $n -> date }}</span>
						</p>
						<p class="excerpt">{{ $n -> excerpt }}</p>
						<a href="/news/{{ $n -> slug }}" class="read-more-btn">read more <i
								class="fas fa-angle-right"></i></a>
					</div>
				</div>
			</div>
			@endforeach

		</div>
		<div class="d-flex justify-content-center py-5">
			{{ $news -> links() }}
		</div>

	</div>
</div>
<!-- end latest news -->


@endsection
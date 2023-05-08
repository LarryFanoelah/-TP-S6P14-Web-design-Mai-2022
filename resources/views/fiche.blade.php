@extends('template')
@section('titre')
<title>{{ $rows->titre }}</title>
@endsection
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{url('images/bg.jpg')}});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
            <h1 class="mb-3 bread">{{ $rows->titre }}</h1>
          </div>
        </div>
      </div>
    </section>
    {{-- <section class="ftco-section bg-light">
    	<div class="container" width="100%" !important> --}}



    <section class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center">
                    <img style ="max-width: 100%" src={{  $rows->photo }} alt="">

					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
	          	
	            <strong><h2 class="mb-4">{{ $rows->titre }}</h2></strong>

	            <?php echo ($rows->body) ?>
	          </div>
					</div>
				</div>
			</div>
		</section>


    @endsection

    
@extends('template')
@section('titre')
<title>Intelligence Artificiel</title>
@endsection
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
            <h1 class="mb-3 bread">IA actuality</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section bg-light">
    	<div class="container" width="100%" !important>


                <div class="car-wrap rounded ftco-animate">
                    @foreach($listeArticle as $rows)
                    <div style="display: inline-block" class="col-md-4">

                      <div class="img  rounded d-flex flex-wrap">
                      <img style ="max-width: 100%" src="{{  $rows->photo  }}" alt="">
                      </div>
    					        <div class="text">
    						        <h2 class="mb-0"><a href="car-single.html">{{ $rows->titre }}</a></h2>
    						        <div class="d-flex mb-3">
	    						      <span class="cat">{{ $rows->lieu }}</span>
    						        </div>

                            <p class="d-flex mb-0 d-block">
                            <a href="{{ route('front_fiche', ['id' => $rows->id_contenu.'-'.$rows->slug()]) }}" class="btn btn-secondary py-2 ml-1">Details</a>
                            </p>



                      </div>

    				        </div>
                    @endforeach
    			      </div>


    	</div>
    </section>
@endsection


       
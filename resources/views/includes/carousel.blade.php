<img src="/img/logo.png" alt="logo" class="logo-image">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  	<ol class="carousel-indicators">
	  	@foreach ($carouselimages as $key => $image)
	    	<li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
	    @endforeach
 	</ol>

  	<div class="carousel-inner" role="listbox">
	  	@foreach ($carouselimages as $key => $image)
	    	<div class="item {{ $key == 0 ? 'active' : '' }}">
	      		<img src="/img/{{ $image->image_url }}">
	    	</div>
		@endforeach
  	</div>
</div>
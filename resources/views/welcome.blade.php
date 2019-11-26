@extends('layouts.main')

@section('content')
    <div class="py-1 bg-black top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+254 728 557 412</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">info@era.eat</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
						    <p class="mb-0 register-link"><span>Open hours:</span> <span>Monday - Sunday</span> <span>8:00AM - 9:00PM</span></p>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{ route('welcome') }}">ERA</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item"><a href="#" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="#" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="#" class="nav-link">Menu</a></li>
	        	<li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
	          <li class="nav-item cta "><a href="{{ route('welcome') }}" class="nav-link">Book a table</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2" style="background-image: url('https://image.shutterstock.com/image-photo/frame-organic-food-fresh-raw-260nw-506516848.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Reservation</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('welcome') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Reservation <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section">
    	<div class="container-fluid px-4">
    		<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Specialties</span>
            <h2 class="mb-4">Our Menu</h2>
          </div>
        </div>
        @foreach ($categories as $category)

            <div class="row">
                <div class="col-md-6 col-lg-4 menu-wrap">
                    <div class="heading-menu text-center ftco-animate">
                        <h3>{{ $category->category }}</h3>
                    </div>

                    @foreach ($menus as $menu)
                          @if ($menu->category == $category->category)
                           <div class="menus d-flex ftco-animate">
                               <div class="menu-img img" style="background-image: url(Storage/menus/{{ ($menu->image) }});"></div>
                               <div class="text">
                                   <div class="d-flex">
                                       <div class="one-half">
                                           <h3>{{ $menu->food_name }}</h3>
                                        </div>
                                        <div class="one-forth">
                                            <span class="price"><p><span>KES</span></p>{{ $menu->price }}</span>
                                        </div>
                                    </div>
                                    <p><span>{{ $menu->food_description }}</span></p>
                                </div>
                            </div>
                        @endif

                    @endforeach

                </div>
            </div>

        @endforeach
        </div>
        </section>

		<section class="ftco-section">
			<div class="container-fluid px-0">
				<div class="row d-flex no-gutters">
          <div class="col-md-12 order-md-last ftco-animate makereservation p-4 p-md-5 pt-5" >
          	<div class="py-md-5">
	          	<div class="col-md-12 text-center heading-section ftco-animate">
		          	<span class="subheading">Book a table</span>
		            <h2 class="mb-4">Make Reservation</h2>
		          </div>
                <form action="{{ route('payments.index') }}" method="POST">
                    @csrf
	              <div class="row">
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Name</label>
	                    <input type="text" class="form-control" placeholder="Your Name" name="name" required>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Email</label>
	                    <input type="text" class="form-control" placeholder="Your Email" name="email" required>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Phone Number</label>
	                    <input type="date" class="form-control" placeholder="Enter Your Phone Number" required>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Date</label>
	                    <input type="text" class="form-control" id="book_date" placeholder="Choose a Date" required>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Time</label>
	                    <input type="time" class="form-control" id="book_time" placeholder=" Set your Time" required>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Number of People for Table</label>
	                    <div class="select-wrap one-third">
	                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                      <select name="" id="" class="form-control">
	                        <option value="">People</option>
	                        <option value="1">1</option>
	                        <option value="2">2</option>
	                        <option value="3">3</option>
	                        <option value="4">4</option>
	                        <option value="5">5+</option>
	                      </select>
	                    </div>
	                  </div>
	                </div>
	                <div class="col-md-12">
	                  <div class="form-group">
	                    <label for="food_orders">Starter Options (Ctrl +Click to select more than one)</label>
	                    <div class="select-wrap one-third">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          <select name="food_orders" id="food_orders" class="form-control" multiple required>
                            @foreach ($menus as $menu)
                                @if ($menu->category == 'Starters')
                                    <option value="{{ $menu->fodname }}">{{ $menu->foodname }}</option>
                                @endif
                            @endforeach
                            <option value=""disabled >No more options Available</option>
                          </select>
	                    </div>
	                  </div>
                    </div>
                    <div class="col-md-12 mt-3">
	                  <div class="form-group">
	                    <input type="submit" value="Make a Reservation" class="btn btn-primary py-3 px-5">
	                  </div>
	                </div>
        </section>
@endsection

@push('scripts')
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/aos.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('frontend/js/scrollax.min.js') }}"></script>
    <script src="{{ asset('frontend/js/google-map.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/fabric.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    @endpush

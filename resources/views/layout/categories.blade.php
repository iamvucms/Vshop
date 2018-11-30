<!DOCTYPE html>
<html lang="en">
<head>
<title>Categories</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('styles/categories.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('styles/categories_responsive.css')}}">
</head>
<body>

<div class="super_container">

@include('layout.header')

	
	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url({{$cat_data->cat_cover}})"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">{{$cat_data->cat_name}}<span>.</span></div>
								<div class="home_text"><p>{{$cat_data->cat_description}}</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
			
		<div class="container">
			<div class="row">
				<div class="col">
					
					<!-- Product Sorting -->
					<div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
						<div class="results">Showing <span>{{count($products_list)}}</span> results</div>
						<div class="sorting_container ml-md-auto">
							<div class="sorting">
								<ul class="item_sorting">
									<li>
										<span class="sorting_text">Sort by</span>
										<i class="fa fa-chevron-down" aria-hidden="true"></i>
										<ul>
											<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default</span></li>
											<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
											<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "stars" }'><span>Name</span></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
					@if (count($products_list)==0)
					<style>
						.no-result{
						width: 100%

						}
					</style>
					<div class="no-result" >
						<button style="border:none; 
						
						color:red;
						display:block;
						margin: 15px auto;
						font-size:25px;	
						background:white"><span>Sorry! In current, this category doesn't have any products</span></button>
						<button style="display:block;margin:10px auto;
						border:none;
						border-radius: 5px;
						"><a href="{{url()->previous()}}" style="text-decoration: none;font-size: 30px;
						padding:5px 5px;"></span>Go back</a></button>
					</div>
				@endif
				<div class="col">
					
					<div class="product_grid">
							
                        <style>
                        .product_image:hover{
                            transform: scale(1.5);
                          
                        }
                        /* .img-box:hover {
                           border:2px solid black;
                          
                        } */
                        .product_image{
							max-width: 263px;
                            transition-duration: 0.5s;
							margin: 0 auto;
							display: inline-block;
                        }
						
                        .img-box{
							width: 100%;
							margin-top:10px;
							
                           max-height: 241.5px;
                            overflow: hidden;
							padding-bottom: 5px;
							/* border-bottom: 1px solid black; */
							text-align: center
                        }
						.product{
							border-radius:5px;
							transition-duration: 0.5s;
							box-shadow: 0 1px 3px -2px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
						}
						.product:hover{
							border-radius: 5px;
							-webkit-box-shadow: -1.5px 1.5px 20px 1.5px rgba(0,0,0,0.75);
							-moz-box-shadow: -1.5px 1.5px 20px 1.5px rgba(0,0,0,0.75);
							box-shadow: -1.5px 1.5px 20px 1.5px rgba(0,0,0,0.75);
						}
						.product_content{
							padding: 5px 10px;
							text-align: center;
						}
						.product_content{
							background: rgba(241, 242, 244, 1)
						}

                        </style>
						@foreach ($products_list as $product)
                            <!-- Product -->
                            
						<div class="product" style="border">
                            <div class="img-box" style="display:inline-block">
                                    <div class="product_image">
									<a href="{{url('/product/'.$product->slug.'-'.$product->product_id.'.html')}}"><img src="{{$product->images->first()->src_img ?? asset('images/no-image.png') }}" alt=""></a>
                                    </div>
                            </div>
							
							<div class="product_extra product_new"><a href="{{url('category/new')}}">New</a></div>
							<div class="product_content">
								<div class="product_name" style="display:none">{{$product->product_name}}</div>
                            <div class="product_title"><a href="{{url('/product/'.$product->slug.'-'.$product->product_id.'.html')}}">{{$product->product_name}}</a></div>
                            <div class="product_price">${{$product->price}}</div>
							</div>
						</div>
                        @endforeach
					</div>
                    {{$products_list->links()}}
						
				</div>
			</div>
		</div>
	</div>

	<!-- Icon Boxes -->

	<div class="icon_boxes">
		<div class="container">
			<div class="row icon_box_row">
				
				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="{{asset('images/icon_1.svg')}}" alt=""></div>
						<div class="icon_box_title">Free Shipping Worldwide</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="{{asset('images/icon_2.svg')}}" alt=""></div>
						<div class="icon_box_title">Free Returns</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="{{asset('images/icon_3.svg')}}" alt=""></div>
						<div class="icon_box_title">24h Fast Support</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

@include('layout.footer')

<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('plugins/easing/easing.js')}}"></script>
<script src="{{asset('plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('js/categories.js')}}"></script>
</body>
</html>
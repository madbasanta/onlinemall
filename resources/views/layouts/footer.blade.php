<footer id="footer">
	<section class="bg-info p-3">
		<div class="container md" style="border-bottom: 2px solid #fff;">
			<div class="row">
				<div class="col-md-4">
					<div class="mt-3">
						<span class="d-inline-block" style="width: 150px;height: 100px;background: url(favicon.png) no-repeat;background-size: 100% 100%;border-radius: 5px;"></span>
						{{-- <img src="favicon.png" alt="logo" class="img-thumbnail" style="max-width: 150px;"> --}}
						<span class="d-inline-block" style="width: 100px;height: 100px;background: url({{ asset('image/cod.png') }}) no-repeat;background-size: 100% 100%;"></span>
						<h3 class="h4 text-white mt-2" style="font-weight: 700;letter-spacing: 1px;">
						{{ config('app.name') }} | <small class="font-weight-normal h6">Grow with us <i class="fas fa-briefcase"></i></small>
						</h3>
						<div style="color: rgba(255,255,255,0.9);">
							<i class="fas fa-phone"></i> (01-456456), (01-123123) <br>
							<i class="far fa-envelope"></i> support@onlinemall.com
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="mt-3">
						<h3 class="h4 text-white">
						<span style="border-bottom: 2px solid #fff">
							Help & Care <i class="fas fa-cog"></i>
						</span>
						</h3>
						<br>
						<a href="javascript:void(0)" class="text-white d-block">Core Team</a>
						<a href="javascript:void(0)" class="text-white d-block">Management Team</a>
						<a href="javascript:void(0)" class="text-white d-block">Developer Team</a>
						<a href="javascript:void(0)" class="text-white d-block">Testing Team</a>
						<a href="javascript:void(0)" class="text-white d-block">Debugging Team</a>
						<a href="javascript:void(0)" class="text-white d-block">Hr Department</a>
					</div>
				</div>
				<div class="col-md-1">
					<div class="mt-3 text-center">
						<br> <br>
						<a href="javascript:void(0)" class="btn btn-sm"><i class="fab fa-2x text-white d-block fa-facebook"></i></a>
						<a href="javascript:void(0)" class="btn btn-sm"><i class="fab fa-2x text-white d-block fa-instagram"></i></a>
						<a href="javascript:void(0)" class="btn btn-sm"><i class="fab fa-2x text-white d-block fa-google-plus"></i></a>
						<a href="javascript:void(0)" class="btn btn-sm"><i class="fab fa-2x text-white d-block fa-twitter-square"></i></a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="text-white mt-3 text-right">
						<h3 class="h4">
						<span style="border-bottom: 2px solid #fff">
							Deals & Offers <i class="fas fa-gift text-danger"></i>
						</span>
						</h3>
						<br>
						We give you best deals & offers | ( No spam )
						<form action="javascript:void(0)" method="post">
							<div class="row">
								<div class="col-md-2 col-sm-12 col-12">
								</div>
								<div class="col-md-10 col-sm-12 col-12">
									<div><input type="text" class="form-control form-control-sm" placeholder="youremail@gamil.com"></div>
								</div>
							</div>
							<button type="submit" class="btn btn-sm btn-success mt-2 px-4">Subscribe</button>
						</form>
						<div class="mt-4 pt-2">
							<h6 class="initialism mb-0">Copyrights &copy; {{ config('app.name') }} 2018.</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</footer>
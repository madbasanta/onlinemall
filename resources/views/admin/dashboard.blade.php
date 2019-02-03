<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	Dashboard
	</h1>
	{{-- <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol> --}}
</section>
<section class="content">
	<!-- Info boxes -->
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-amazon"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Inventories</span>
					<span class="info-box-number inventories-text">0</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Processing Orders</span>
					<span class="info-box-number orders-text">0</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<!-- fix for small devices only -->
		<div class="clearfix visible-sm-block"></div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Sales</span>
					<span class="info-box-number sales-text">0</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">New Members</span>
					<span class="info-box-number users-text">0</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Latest Orders</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table class="table no-margin">
					<thead>
						<tr>
							<th>SN</th>
							<th>Customer</th>
							<th>Status</th>
							<th>Items</th>
						</tr>
					</thead>
					<tbody id="latestOrderBody">
						
					</tbody>
				</table>
			</div>
			<!-- /.table-responsive -->
		</div>
		<!-- /.box-body -->
		<div class="box-footer clearfix">
			{{-- <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left create-new-order">Place New Order</a> --}}
			<a href="{{ url('admin#mod-orders') }}" onclick="location.reload()" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
		</div>
		<!-- /.box-footer -->
	</div>
	<div class="row" id="shopInfo">
	</div>
</section>

@section('script')
<script>
	$(window).ready(e => {
		initiateDashboard();
	});
</script>
@endsection
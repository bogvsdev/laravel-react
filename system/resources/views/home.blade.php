@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body mac">
					Latest macbooks are here
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<form action="/" class="filtering">
					
				<p>
					<a href="{{ url('/') }}" id="reset" class="btn btn-default btn-sm btn-block">Reset</a>
				</p>

				<div class="panel panel-default">
					<div class="panel-heading">Company</div>
					<div class="panel-body">
						<div class="from-group">
							<div class="row company">
								<div class="col-md-4">
									<label><input type="checkbox" name="company[]" class="checkbox" value="apple"> Apple</label>
									<label><input type="checkbox" name="company[]" class="checkbox" value="asus"> Asus</label>
								</div>
								<div class="col-md-4">
									<label><input type="checkbox" name="company[]" class="checkbox" value="dell"> Dell</label>
									<label><input type="checkbox" name="company[]" class="checkbox" value="acer"> Acer</label>
								</div>
								<div class="col-md-4">
									<label><input type="checkbox" name="company[]" class="checkbox" value="samsung"> Samsung</label>
									<label><input type="checkbox" name="company[]" class="checkbox" value="msi"> MSI</label>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">Price</div>
					<div class="panel-body">
						<div class="from-group">
							<div class="row price">
								<div class="col-md-12">
									<input type="hidden" name="price[]" id="price-from" value="0">
									<input type="hidden" name="price[]" id="price-to" value="5000">
									<input id="range">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">Processor</div>
					<div class="panel-body">
						<div class="from-group">
							<div class="row processor">
								<div class="col-md-6">
									<label><input type="checkbox" name="processor[]" class="checkbox" value="intel"> Intel</label>
								</div>
								<div class="col-md-6">
									<label><input type="checkbox" name="processor[]" class="checkbox" value="athlon"> Athlon</label>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">Screen size</div>
					<div class="panel-body">
						<div class="from-group">
							<div class="row screen">
								<div class="col-md-4">
									<label><input type="checkbox" name="screen[]" class="checkbox" value="1"> 17+"</label>
									<label><input type="checkbox" name="screen[]" class="checkbox" value="4"> 10-11"</label>
								</div>
								<div class="col-md-4">
									<label><input type="checkbox" name="screen[]" class="checkbox" value="2"> 14-16"</label>
								</div>
								<div class="col-md-4">
									<label><input type="checkbox" name="screen[]" class="checkbox" value="3"> 12-13"</label>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">RAM</div>
					<div class="panel-body">
						<div class="from-group">
							<div class="row ram">
								<div class="col-md-4">
									<label><input type="checkbox" name="ram[]" class="checkbox" value="1"> 16+ Gb</label>
									<label><input type="checkbox" name="ram[]" class="checkbox" value="4"> less 2 Gb</label>
								</div>
								<div class="col-md-4">
									<label><input type="checkbox" name="ram[]" class="checkbox" value="3"> 5-15 Gb</label>
								</div>
								<div class="col-md-4">
									<label><input type="checkbox" name="ram[]" class="checkbox" value="2"> 2-4 Gb</label>
								</div>
							</div>
						</div>
					</div>
				</div>

			</form>
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Products</div>
				<div class="panel-body">
					<div class="container-fluid product-container">
						<?php $i = 1; $end = count($products)-1; ?>
						@forelse ($products as $k=>$product)
							@if($i==1)
								<div class="row">
							@endif
								<div class="col-md-4">
									<div class="product">
										<div class="image">
											<span>${{$product->price}}</span>
											<img src="{{'/images/'.$product->image}}" alt="{{$product->image}}">
										</div>
										<div class="info">
											<h2>{{$product->title}}</h2>
											<p class="desc">{{$product->description}}</p>
											<p><a href="#" class="btn btn-default">Buy</a></p>
										</div>
									</div>
								</div>
							@if($i==3 || $k == $end)
								<?php $i = 0; ?>
								</div>
							@endif
						<?php $i++; ?>
						@empty
						<h3>It's clean here..</h3>
						@endforelse
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

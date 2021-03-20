@extends('admin.layouts.appadmin')
@section('title')
Products
@endsection
@section('content')
{{Form::hidden('', $increment=1)}}

<div class="card">
	<div class="card-body">
		<h4 class="card-title">Products table</h4>
		 @if (Session::has('status'))
                  <div class="alert alert-success">

                    {{Session::get('status')}}

                </div>
         @endif
          @if (Session::has('status1'))
                  <div class="alert alert-danger">

                    {{Session::get('status1')}}

                </div>
         @endif
		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
					<table id="order-listing" class="table">
						<thead>
							<tr>

								<th>Order #</th>
								<th>Image</th>
								<th>Name</th>
								<th>Price</th>
								<th>Category</th>
								<th>Status</th>
								<th>Actions</th>

							</tr>
						</thead>
						@foreach ($products as $product)

						<tbody>
							<tr>
								<td>{{$increment}}</td>
								<td><img src="/storage/product_images/{{$product->product_image}}"></td>
								<td>{{$product->product_name}}</td>
								<td>KES{{$product->product_price}}</td>
								<td>{{$product->product_category}}</td>
								@if($product->status ==1)
								<td>
									<label class="badge badge-success">Activated</label>
								</td>
								@else
								<td>
									<label class="badge badge-danger">De-Activated</label>
								</td>
								@endif
								<td>
									<button class="btn-sm btn btn-outline-info" onclick="window.location ='{{url('/edit_product/'.$product->id)}}'">Edit</button> 
									<a href="/delete_product/{{$product->id}}" class="btn-sm btn-outline-danger" id="delete">Delete</a>

									@if($product->status==1)
									<button class="btn-sm btn btn-outline-warning" onclick="window.location ='{{url('/deactivate_product/'.$product->id)}}'">De-activate</button>
									@else
									<button class="btn-sm btn btn-outline-success" onclick="window.location ='{{url('/activate_product/'.$product->id)}}'">Activate</button>
									@endif


								</td>
							</tr>
							{{Form::hidden('', $increment=$increment+1)}}
							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{'backend/js/data-table.js'}}"></script> 
@endsection
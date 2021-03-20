@extends('admin.layouts.appadmin')
@section('title')
Sliders
@endsection
@section('content')
{{Form::hidden('', $increment=1)}}

<div class="card">
	<div class="card-body">
		<h4 class="card-title">Sliders table</h4>
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
								<th>Description one</th>
								<th>Description two</th>  
								<th>Status</th>
								<th>Actions</th>

							</tr>
						</thead>
						@foreach ($sliders as $slider)

						<tbody>
							<tr>
								<td>{{$increment}}</td>
								<td><img src="/storage/slider_images/{{$slider->slider_image}}"></td>
								<td>{{$slider->description1}}</td>
								<td>{{$slider->description2}}</td>
								
								@if($slider->status ==1)
								<td>
									<label class="badge badge-success">Activated</label>
								</td>
								@else
								<td>
									<label class="badge badge-danger">De-Activated</label>
								</td>
								@endif
								<td>
									<button class="btn-sm btn btn-outline-info" onclick="window.location ='{{url('/edit_slider/'.$slider->id)}}'">Edit</button> 
									<a href="/delete_slider/{{$slider->id}}" class="btn-sm btn-outline-danger" id="delete">Delete</a>

									@if($slider->status==1)
									<button class="btn-sm btn btn-outline-warning" onclick="window.location ='{{url('/deactivate_slider/'.$slider->id)}}'">De-activate</button>
									@else
									<button class="btn-sm btn btn-outline-success" onclick="window.location ='{{url('/activate_slider/'.$slider->id)}}'">Activate</button>
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
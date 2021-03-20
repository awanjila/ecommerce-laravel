@extends('admin.layouts.appadmin')
@section('title')
Mpesa Transactions
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

								<th>Transaction #</th>
								<th>Result Description</th>
								<th>Merchant Request ID</th>
								<th>Checkout Request ID</th>
								<th>Amount</th>
								<th>Date</th>
								<th>Phone Number</th>

							</tr>
						</thead>
						 @foreach ($mpesa_stk_pushes as $mpesa_stk_push) 

						<tbody>
							<tr>
								<td>{{$increment}}</td>
								<td>{{$mpesa_stk_push->result_desc}}</td>
								<td>{{$mpesa_stk_push->merchant_request_id}}</td>
								<td>{{$mpesa_stk_push->checkout_request_id}}</td>
								<td>{{$mpesa_stk_push->amount}}</td>
								<td>{{$mpesa_stk_push->mpesa_receipt_number}}</td>
								<td>{{$mpesa_stk_push->phone_number}}</td>
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

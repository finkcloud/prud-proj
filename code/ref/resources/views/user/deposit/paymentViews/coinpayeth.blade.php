@extends('front.layouts.master')
@section('content')

<div class="row my-5">
	<div class="col-md-12">
		<div class="panel panel-inverse padding-224">

			<div class="panel-body text-center">
				<h6> PLEASE SEND EXACTLY <span class="text-success"> {{ $bcoin }}</span> ETH</h6>
				<h5>TO <span class="text-success"> {{ $wallet}}</span></h5>
				{!! $qrurl !!}
				<h4 class="font-weight-bold" >SCAN TO SEND</h4>
			</div>
		</div>
	</div>
</div>

@endsection

@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Did you wake up rested?</div>

				<div class="card-body">
					
				<!-- Display Status Message -->
				@include('common.status')

				<textarea placeholder="Your anwser"></textarea>


				</div>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection
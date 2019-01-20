@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
        <div class="card-header">Task index</div>
				<div class="card-body">
					<!-- Display Status Message -->
					@include('common.status')
					
					<p>index</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
        <div class="card-header">Task Edit</div>
				<div class="card-body">
					<!-- Display Status Message -->
					@include('common.status')
					
          <p>edit</p>
          
					<!-- Display Validation Errors -->
					@include('common.errors')
					<form action="{{ route('tasks.store')}}" method="POST" class="form-horizontal">
						{{ csrf_field() }}
						<div class="form-row align-items-center">
							
							<!-- Task Name -->
							<div class="form-group col-md-6">
								<label for="task-name" class="sr-only">Task Name</label>
								<input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}" >
							</div>
							<!-- Task Description -->
							<div class="form-group col-md-4">
									<label for="task-description" class="sr-only">Task description</label>
									<input type="text" name="description" id="task-description" class="form-control" value="{{ $task->description }}" placeholder="Enter description">
								</div>
							<!-- Add Task Button -->
							<div class="form-group col-md-2">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>

						</div>
					</form>
          
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
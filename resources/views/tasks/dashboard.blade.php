@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
        <div class="card-header">New Task</div>
				<div class="card-body">
					<!-- Display Status Message -->
					@include('common.status')
					<!-- Display Validation Errors -->
					@include('common.errors')
					<form action="{{ route('tasks.store')}}" method="POST" class="form-horizontal">
						{{ csrf_field() }}
						<div class="form-row">
							<!-- Task Name -->
							<div class="form-group col-md-6">
								<label for="task-name" class="sr-only">Task Name</label>
								<input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}" placeholder="Enter name" autocomplete="off">
							</div>
							<!-- Task Description -->
							<div class="form-group col-md-4">
									<label for="task-description" class="sr-only">Task description</label>
									<input type="text" name="description" id="task-description" class="form-control" value="{{ old('task') }}" placeholder="Enter description" autocomplete="off">
								</div>
							<!-- Add Task Button -->
							<div class="form-group col-md-2">
								<button type="submit" class="btn btn-primary">Add</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br>
	<!-- Current Tasks -->
	@if (count($tasks) > 0)
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Current Tasks</div>
					<div class="card-body">							
						<table class="table table-striped">
							<thead>
								<th>ID</th>
								<th>Name</th>
								<th>Description</th>
								<th>Manage</th>
							</thead>
							<tbody>
								@foreach ($tasks as $task)
								<tr>
									<td class="table-text" style="vertical-align: none"><div>{{ $task->id }}</div></td>
									<td class="table-text"><div>{{ $task->name }}</div></td>
									<td class="table-text"><div>{{ $task->description }}</div></td>
									<!-- Task Delete Button -->
									<td>
										<form action="{{ url('tasks/'.$task->id) }}" method="POST">
											{{ csrf_field() }}
											<a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-info" role="button" aria-pressed="true">Edit</a>
											{{ method_field('DELETE') }}
											<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	@endif 


</div>
@endsection

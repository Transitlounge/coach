@extends('layouts.app')
@section('content')
<div class="container">

{{-- <tasks :tasks-data="{{ $tasks }}"></tasks> --}}
<todo :tasks-data="{{ $tasks }}"></todo>

</div>
@endsection
@section('scripts')
{{-- scripting --}}
<script>
	window.App = {!! 
		json_encode([
			'user'=> [
    		'authenticated' => auth()->check(),
        'id' => auth()->check() ? auth()->id() : tap(session())->put('id', uniqid())->get('id'),
        'username' => auth()->check() ? auth()->user()->username : "guest-".session()->get('id')
			]
		]); 
	!!};
</script>
@endsection


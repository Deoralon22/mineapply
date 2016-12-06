@extends('layouts.material')

@section('content')
<div class="section">
	<div class="container">
		
		<div class="card-panel">

			<form method="POST" action="{{ route('application-status-form') }}">	
			{{ csrf_field() }}
		      <div class="row">
		        <div class="input-field col s12">
		          <input id="token" name="token" type="text" class="validate">
		          <label for="token">Token</label>
		        </div>
		      </div>
			<button type="submit" class="btn green accent-4">Check status</button>
		    </form>
			
		</div>
	</div>
</div>
@endsection('content')
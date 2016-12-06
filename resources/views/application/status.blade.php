@extends('layouts.material')

@section('content')
<div class="section">
	<div class="container">




	@if($application->getStatus() == 0)
		<div class="card-panel">
			<small><span class="right">{{ $application->getLastUpdatedDiff() }}</span></small>
			<h5><i class="material-icons left">loop</i> Awaiting review</h5>
			<p>We haven't had the time to check your application, check back later.</p>
		</div>
	@endif
	@if($application->getStatus() == 1)
		<div class="card-panel">
			<small><span class="right">{{ $application->getLastUpdatedDiff() }}</span></small>
			<h5 class="green-text text-accent-4"><i class="material-icons left">check_circle</i> Accepted</h5>
			<p>You will receive further instructions via e-mail.</p>
		</div>
	@endif
	@if($application->getStatus() == 2)
		<div class="card-panel">
			<small><span class="right">{{ $application->getLastUpdatedDiff() }}</span></small>
			<h5 class="red-text text-accent-4"><i class="material-icons left">info</i> Rejected</h5>
			<p>Your application has been rejected.</p>
		</div>
	@endif
	
	@if(!is_null($application->staff_message))
	<br>
	<small>Message from the application reviewer:</small>
		<div class="card-panel">
			<p>{{ $application->staff_message }}</p>
		</div>
	@endif

  <br>
	<h5>Your application</h5>
	<br>
      <div class="row">
        <div class="input-field col s12">
          <input readonly id="username" type="text" value="{{ $application->username }}" required>
          <label for="username">Minecraft Username</label>
        </div>
      </div>
	      <div class="row">
	        <div class="input-field col s12">
	          <textarea id="message" class="materialize-textarea" readonly>{{$application->message}}</textarea>
	          <label for="message">Application message</label>
	        </div>
	      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" readonly value="{{ $application->email }}">
          <label for="email" >E-mail</label>
        </div>
      </div>

	</div>
</div>
@endsection('content')
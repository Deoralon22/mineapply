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

	</div>
</div>
@endsection('content')
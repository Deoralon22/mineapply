@extends('layouts.material')

@section('content')

<div class="section">
	<div class="container">
	  <nav>
	    <div class="nav-wrapper black grey-text steps" style="padding-left: 16px;">
	      <div class="col s12">
	        <a class="breadcrumb white-text">Username</a>
	        <a class="breadcrumb">Details</a>
	        <a class="breadcrumb" style="color: rgba(255,255,255,0.7);">Application</a>
	      </div>
	    </div>
	  </nav>
		
	  <br>
	  @if($user->get() == null)
		<div class="card-panel red white-text">
			<p>Sorry, we couldn't find your username.</p>
		</div>

		<div class="card-panel">
			<h5>Try again</h5>
			<form onSubmit="return userName();">
				<input type="text" name="username" id="username" placeholder="Minecraft Username"required>
				<button class="btn white black-text">Check</button>
			</form>
		</div>
	  @endif
	  @if($user->get() != null)
	  <h5>Is this you, {{ $username }}?</h5>

	  <div class="card-panel white black-text">
	  	<div class="row">
	  		<div class="col s12 m6">
	  			<div class="row">
	  				<div class="col s12 m6">
	  			<img src="https://minotar.net/cube/{{ $user->get()->name }}" height="64" width="64">
	  					
	  				</div>
	  				<div class="col s12 m6">
	  			<span class=""> {{ $user->get()->name }}<br>
	  			<code>{{ $user->get()->uuid }}</code></span>
	  					
	  				</div>
	  			</div>
	  		</div>
	  		<div class="col s12 m6">
	  		</div>
	  	</div>
	  </div>
	  			<form method="POST">
	  				{{ csrf_field() }}<center>
	  				<button type="submit" class="btn green accent-4">Yes, that's me</button>
	  				</center>
	  			</form>
	  @endif
		
	</div>
</div>

@endsection('content')
@extends('layouts.material')

@section('content')
<div class="section">
	<div class="container">
		
	  <nav>
	    <div class="nav-wrapper black grey-text steps" style="padding-left: 16px;">
	      <div class="col s12">
	        <a class="breadcrumb">Username</a>
	        <a class="breadcrumb white-text">Details</a>
	        <a class="breadcrumb" style="color: rgba(255,255,255,0.7);">Application</a>
	      </div>
	    </div>
	  </nav>

		<br>

	  <h5>You're almost done</h5>
		

		@if (count($errors) > 0)
	    <div class="card-panel">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	  <br>
	@else
	<br>
	@endif



	   <div class="row">
    <form class="col s12" method="POST" action="{{ route('application-form', $username) }}">
    {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s12">
          <input disabled id="username" type="text" class="validate" value="{{ $username }}" required>
          <label for="username">Minecraft Username</label>
        </div>
      </div>
	      <div class="row">
	        <div class="input-field col s12">
	          <textarea id="message" name="message" class="materialize-textarea" placeholder="Tell us a bit about yourself, what Minecraft things you like to do, and everything else you think it's important that we know about." length="500" required>{{ old('message') }}</textarea>
	          <label for="message">Application message</label>
	        </div>
	      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" name="email" type="email" class="validate" placeholder="name@example.com" required value="{{ old('email') }}">
          <label for="email" >E-mail</label>
          <p>We will update you about your application status via e-mail.</p>
        </div>
      </div>
      <button class="btn green accent-4">Continue</button>
    </form>
  </div>
	</div>
</div>
@endsection
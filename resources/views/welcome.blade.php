@extends('layouts.material')

@section('content')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center black-text">Apply for our server</h1>
      <div class="row center">
        <h5 class="header col s12 light">Just type your username below.</h5>
      </div>
      <div class="row center">
        
        <form onSubmit="return userName();">
        <div class="row">
        <div class="col s12 m6 offset-m3">
            <input id="username" name="username" type="text" class="validate" required>
        </div>
        </div>

        <button type="submit" id="download-button" class="btn waves-effect waves-light green accent-4">Get Started</button>
        </form>
      </div>

    </div>
  </div>
@endsection

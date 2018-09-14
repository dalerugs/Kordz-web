<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Kordz') }} - {{$subTitle}}</title>

    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Abel|Open+Sans+Condensed:300" rel="stylesheet">
    @yield('css')
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand header-text" href="{{ url("") }}">
        <img width="30px" src="{{ asset('img/logo-white.png') }}">
        <span style="margin-left:10px">{{ config('app.name', 'Kordz') }}</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto nav-bar">
          @if(Auth::guest())
          <li class="nav-item active">
            <a id="signInNav" class="nav-link body-text" href="#signInFormView">Sign In<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a id="signUpNav" class="nav-link body-text" href="#signUpFormView">Sign Up<span class="sr-only">(current)</span></a>
          </li>
          @else
          <li class="nav-item active">
            <a id="chordsNav" class="nav-link body-text" href="#signInFormView">Chords<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a id="luneupsNav" class="nav-link body-text" href="#signUpFormView">Lineups<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a id="settingsNav" class="nav-link body-text" href="#signUpFormView">Settings<span class="sr-only">(current)</span></a>
          </li>
          @endif
          <li class="nav-item active">
            <a id="aboutNav" data-toggle="modal" data-target="#aboutModal" class="nav-link body-text" href="#">About<span class="sr-only">(current)</span></a>
          </li>

        </ul>
      </div>
    </nav>

  <div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="aboutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">About</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <b>What is it all about?</b><br />
          Many musicians sometimes having a hard time transposing chords to a specific key.
          With Kordz you can now transpose a chords with just a click.
          You can create and edit a chord progression on how you want it to be look like,
          you can add some markers like 'Verse', 'Pre-Chorus', 'Chorus', etc.
          You can also create a lineup of chords and easily navigate trough that chords
          by just clicking the right side and left side of the screen.
          There is also a content management system where you can save a chord progression for future use.
          You just need to sign-up for an account so that you can use your saved chord progression
          on different android phones or in Kordz.com by just signing-in to your account.
          <br />
          <br />
          <b>About the Developer</b><br />
          Kordz was developed by Patrick Dale Rugayan a Computer Sciece graduate from Technological University of the Philippines,
          who is now working as a Sofware Engineer in one of the premiere software company in the world.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<div class="container-fluid landing">
@yield('content')
</div>

<script src="{{asset('/js/app.js')}}"></script>
@yield('js')
<script>
  $("#signInNav").click(function() {
       $( "#signInClickButton" ).trigger( "click" );
   });
  $("#signUpNav").click(function() {
       $( "#signUpClickButton" ).trigger( "click" );
   });
</script>

</body>

</html>

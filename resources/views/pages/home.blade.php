@extends('templates.default')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('content')


  <div class="row">
    <div class="col-md-6">
      <!-- <div class="img-logo">
        <img class="responsive" src="{{ asset('img/logo-white.png') }}">
      </div> -->
      <div class="title tahoma">
        Kordz
      </div>
      <div class="title-sub">
        Transpose your chords in just a click.
      </div>
      <div class="title-sub">
        Availble now on any android phones.
        <a class="white" target="_blank" href="https://drive.google.com/open?id=1sV8FjBtAM0K5SbMZ9L9gzhl2YPGtu5Z3">
          Click here to download the app.</a>
      </div>
      <div class="img-logo">
        <video class="responsive" autoplay muted loop >
          <source src="{{ asset('vid/demo.mp4') }}" type="video/mp4">
        </video>
      </div>

    </div>
    <div class="col-md-6">
      <div id="loginFormView" class="form">
        <form id="loginForm">
          <div class="form-group member-login">
            Member Sign In
          </div>
          <div class="form-group member-login">
            <p style="display:none" id="loginErrorsView" class="center alert alert-danger body-text">

            </p>
          </div>
          <div class="form-group">
            <input id="login" type="text" name="login" class="form-control" placeholder="Username or Email" />
          </div>
          <div class="form-group">
            <input id="password" type="password" name="password" class="form-control" placeholder="• • • • • •" />
          </div>
        </form>
          <div class="form-group">
            <button onclick="signInButton()" class="btn btn-primary btn-block">SIGN IN</button>
          </div>
          <div class="form-group center">
            <a class="default-text" href="#">Forgot password?</a>
          </div>
          <div class="form-group center default-text">
            Dont have an account? <a class="white" href="#signUpFormView" id='signUpClickButton' >Click here to Sign Up.</a>
          </div>
      </div>
      <div id="signUpFormView" style="display:none" class="form">
        <form action="" id="registerForm">
          <div class="form-group member-login">
            Sign Up
          </div>
          <div class="form-group member-login">
            <p id="errorsView" style="display:none" class="alert alert-danger body-text">
            </p>
          </div>
          <div class="form-group">
            <input type="text" name="first_name" class="form-control" placeholder="First Name" />
          </div>
          <div class="form-group">
            <input type="text" name="last_name" class="form-control" placeholder="Last Name" />
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Email" />
          </div>
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" />
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" />
          </div>
          <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" />
          </div>
        </form>
          <div class="form-group">
            <button onclick="signUpButton()" class="btn btn-success btn-block">SIGN UP</button>
          </div>
          <div class="form-group center default-text">
            Already have an account? <a class="white" href="#signInFormView" id='signInClickButton' >Click here to Sign In.</a>
          </div>

      </div>



    </div>
  </div>



@endsection

@section('js')
<script>
  $("#signUpClickButton").click(function() {
       $("#loginFormView").hide();
       $("#signUpFormView").fadeIn();
   });
  $("#signInClickButton").click(function() {
       $("#signUpFormView").hide();
       $("#loginFormView").fadeIn();
   });

   function signUpButton(){
     $.ajax({
          url: "{{ route('register') }}",
          type: 'POST',
          dataType: 'json',
          data: $("#registerForm").serialize(),
          encode:true,
          success:function(data) {
              console.log(data);
              if (data.success) {
                location.reload();
              }
              else{
                var html = "";
                $.each( data.errors, function( key, value ) {
                    html += "• "+value+"<br />";
                });
                $("#errorsView").html(html);
                $("#errorsView").fadeIn().delay(3000).fadeOut();
              }
          }
      });
   }

   function signInButton(){
     if (!$("#login").val() || !$("#password").val()) {
       $("#loginErrorsView").html("Please enter your username/email and password.");
       $("#loginErrorsView").fadeIn().delay(1000).fadeOut();
     }else{
       $.ajax({
            url: "{{ url('api/login') }}",
            type: 'POST',
            dataType: 'json',
            data: $("#loginForm").serialize(),
            encode:true,
            success:function(data) {
                console.log(data);
                if (data.success) {
                  location.reload();
                }
                else{
                  $("#loginErrorsView").html("Invalid username/email or password.");
                  $("#loginErrorsView").fadeIn().delay(3000).fadeOut();
                }
            }
        });
     }
   }



</script>
@endsection

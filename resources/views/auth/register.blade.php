<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="{{ asset('assets/folder_form_register_login/css/style.css') }}">  
</head>

<body>

  <div class="form">
  
    <div class="tab-content">
      <div id="signup">   
        <h1>Sign Up for Free</h1>
        
        <form method="POST">
          @csrf
          <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" name="username" required autocomplete="off" />
          </div>
          
        @if($errors->has('username'))
          <div class="alert alert-danger">
            {{ $errors->first('username') }}
          </div>
        @endif

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
          </div>

            @if($errors->has('password'))
              <div class="alert alert-danger">
                {{ $errors->first('password') }}
              </div>
            @endif

          <div class="field-wrap">
            <label>
              Confirm Password<span class="req">*</span>
            </label>
            <input type="password" name="confirmpassword" required autocomplete="off"/>
          </div>

            @if($errors->has('confirmpassword'))
              <div class="alert alert-danger">
                {{ $errors->first('confirmpassword') }}
              </div>
            @endif

          <div class="field-wrap">
            <label>
              Full Name<span class="req">*</span>
            </label>
            <input type="text" name="name" required autocomplete="off" />
          </div>

        @if($errors->has('name'))
          <div class="alert alert-danger">
            {{ $errors->first('name') }}
          </div>
        @endif

        <div class="field-wrap">
          <label>
            Email Address<span class="req">*</span>
          </label>
          <input type="email" name="email" required autocomplete="off"/>
        </div>
        
        @if($errors->has('email'))
          <div class="alert alert-danger">
            {{ $errors->first('email') }}
          </div>
        @endif
        
        <button type="submit" class="button button-block"/>Get Started</button>
        
        </form>

      </div>
      
    </div><!-- tab-content -->
      
  </div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="{{ asset('assets/folder_form_register_login/js/index.js') }}"></script>
</body>
</html>

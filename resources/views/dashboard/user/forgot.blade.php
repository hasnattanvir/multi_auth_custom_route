<!doctype html>
<html lang="en">
  <head>
    <title>Forgot Password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>
      <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px">
                <h4>Forgot Password</h4>
                <form action="{{route('user.forgot.password.link')}}" method="POST" autocomplete="off">
                  @csrf
                  @if (Session('success'))
                    <div class="alert alert-success">
                      {{ Session('success') }}
                    </div>
                  @endif
                  @if (Session('fail'))
                    <div class="alert alert-success">
                      {{ Session('fail') }}
                    </div>
                  @endif                 

                    <div class="form-group">
                        <label for="email">Enter your email address and we will send you a link to reset your password</label>
                        <input type="email" name="email" class="form-control" id="email" 
                        value="{{old('email')}}" aria-describedby="emailHelp">
                        <br>
                        @error('email')
                            <span class="text-danger">{{$message}}</span>                          
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="bn btn-primary">Send Reset Password Link</button>
                        
                        <a href="{{route('user.login')}}">Login</a>
                    </div>
                </form>
            </div>
        </div>
      </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>
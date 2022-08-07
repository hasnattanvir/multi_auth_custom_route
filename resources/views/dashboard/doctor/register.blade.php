<!doctype html>
<html lang="en">
  <head>
    <title>User Register</title>
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
                <h4>Doctor Register</h4>
                <form action="{{ route('doctor.create') }}" method="Post" autocomplete="off">
                    @csrf

                    @if (Session('success'))
                        <div class="alert alert-success">
                            {{ Session('success') }}
                        </div>
                    @endif
                    @if (Session('fail'))
                        <div class="alert alert-danger">
                            {{ Session('fail') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" value="{{old('name')}}">
                        <br>
                        <span class="text-danger">
                            @error('name')
                                {{$message}}                                
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{old('email')}}">
                        <br>
                        <span class="text-danger">
                            @error('email')
                                {{$message}}                                
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="hospital">hospital </label>
                        <input type="text" name="hospital" class="form-control" id="hospital" aria-describedby="hospitalHelp" value="{{old('hospital')}}">
                        <br>
                        <span class="text-danger">
                            @error('hospital')
                                {{$message}}                                
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="password">password </label>
                        <input type="password" name="password" class="form-control" id="password" aria-describedby="passwordHelp" value="{{old('password')}}">
                        <br>
                        <span class="text-danger">
                            @error('password')
                                {{$message}}                                
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm password </label>
                        <input type="password" name="cpassword" class="form-control" id="cpassword" aria-describedby="cpasswordHelp" value="{{old('cpassword')}}">                       
                        <br>
                        <span class="text-danger">
                            @error('cpassword')
                                {{$message}}                                
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="bn btn-primary">Register</button>
                        <a href="{{route('doctor.login')}}">i am alredy login</a>
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
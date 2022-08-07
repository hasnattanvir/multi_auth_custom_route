<!doctype html>
<html lang="en">
  <head>
    <title>Admin Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body class="bg-info">
      <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top:60px; ">
                <h4>Admin Login</h4>
               <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td scope="row">{{auth::guard('admin')->user()->name}}</td>
                      <td>{{auth::guard('admin')->user()->email}}</td>
                      <td>{{auth::guard('admin')->user()->phone}}</td>
                      <td>
                        <a href="{{route('admin.logout')}}">Logout</a>
                      </td>
                    </tr>
                   
                  </tbody>
               </table>
            </div>
        </div>
      </div>




    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>
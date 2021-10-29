<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Unistem Administration</title>
    <link id="favicon" rel="shortcut icon" href="{{url('_frontend/img/logo.png')}}" type="image/png">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/narrow-jumbotron/narrow-jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <div class="text-center ">
        <h3 class="text-purple">UNISTEM</h3>
        <p>Administrator</p>
      </div><br>

      <div class="d-flex justify-content-center">
        <div class="card border-default col-md-12" style="max-width: 20rem;">
          <div class="card-body text-default">
          <img src="{{url('_frontend/img/logo.png')}}" style=" width: 70px; height: 70px;">
          {{-- <h4 class="card-title text-center">Login</h4> --}}
          <hr>
          <form action="{{ route('login') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ old('email') }}" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-block btn-sm btn-outline-default">Login</button>
          </form>
          </div>
          <div class="card-footer bg-transparent border-default text-muted pull-right">
            <small>Copyright © 2017-2018 <br>Powered by <a href="#">SIMTAMA</a></small>
          </div>
        </div>
      </div>
    
      </div>


    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

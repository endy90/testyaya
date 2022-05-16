<!DOCTYPE html>
<html lang="en">

<head>

    @include('ClientPart.Partials.index.head')

</head>

<body>

  <!-- Navigation -->
  @include('ClientPart.Partials.index.nav')

  <!-- Page Content -->
  <div class="container">
    @include('flash::message')

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-3">Bienvenue sur MUSICALY !</h1>
      <p class="lead">Veuillez réserver des billets pour le concert !!</p>
    </header>

    <!-- Page Features -->
    <div class="row text-center">
    @foreach($products as $product)
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="{{ asset('storage/product/'.$product->photo) }}" alt="postImage">
          <div class="card-body">
            <h4 class="card-title">{{$product->nom}}</h4>
            <p class="card-text">{{$product->description}}</p>
          </div>
          <div class="card-footer">
            <a href="/product/{{$product->id}}" class="btn btn-primary">En savoir plus...</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  @include('ClientPart.Partials.index.footer')

  <!-- Bootstrap core JavaScript -->
  @include('ClientPart.Partials.index.footer-script')

</body>

</html>
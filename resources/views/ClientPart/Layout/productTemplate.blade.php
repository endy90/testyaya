<!DOCTYPE html>
<html lang="en">

<head>

    @include('ClientPart.Partials.product.head')

</head>

<body>

  <!-- Navigation -->
  @include('ClientPart.Partials.index.nav')

  <!-- Page Content -->
  <div class="container">
    @include('flash::message')

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{$product->nom}}</h1>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{ asset('storage/product/'.$product->photo) }}" alt="postImage">

        <hr>

        <!-- Post Content -->
        <p>{{$product->description}}</p>
        <!-- Comments Form -->
        @if(auth()->guest())
        <div class="card my-4">
          <h5 class="card-header">Ajoutez les commentaires :</h5>
          <div class="card-body">
            <form action="/comment" method="POST">
            {{csrf_field()}}
              <div class="form-group">
                <input type="hidden" name="id_product" placeholder="" label="Id" id="InputId" >
              </div>
              <div class="form-group">
                <input type="hidden" name="id_user" placeholder="" label="Id" id="InputId" >
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="comments" rows="3">
              </div>
              <input type="submit" class="btn btn-primary" value="Comment">
            </form>
          </div>
        </div>
        @else
        <div class="card my-4">
          <h5 class="card-header">Ajoutez un commentaire</h5>
          <div class="card-body">
            <form action="/comment" method="POST">
            {{csrf_field()}}
              <div class="form-group">
                <input type="hidden" name="id_product" placeholder="" value="{{$product->id}}" label="Id" id="InputId" >
              </div>
              <div class="form-group">
                <input type="hidden" name="id_user" placeholder="" value="{{$user->email}}" label="Id" id="InputId" >
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="comments" rows="3">
              </div>
              <input type="submit" class="btn btn-primary" value="Comment">
            </form>
          </div>
        </div>
        @endif
        <!-- Comment with nested comments -->
        @if(auth()->guest())
        @foreach($comments as $comment)
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{$comment->id_user}}</h5>
            <p>{{$comment->created_at}}</p>
            {{$comment->comments}}
          </div>
        </div>
        @endforeach
        @else
        @foreach($comments as $comment)
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{$comment->id_user}}</h5>
            <p>{{$comment->created_at}}</p>
            {{$comment->comments}}
          </div>
        </div>
        @endforeach
        @endif
      </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Side Widget -->
        <div class="card my-4 ml-5 w-50">
            <h5 class="card-header">Prix : {{$product->prix}} €</h5>
            <form action="{{ route('cart.add') }}" method="post" class="card-body align-self-center">
                {{csrf_field()}}
              <input name="id" type="hidden" value="{{$product->id}}">
              <button type="submit" class="btn-primary">Ajouter au panier</button>
            </form>
        </div>

        <!-- Search Widget -->
        <div class="card my-4 ml-5 w-50">
            <h5 class="card-header">Note :</h5>
            <div class="card text-center">
            <p>0/100</p>
            </div>
        </div>

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

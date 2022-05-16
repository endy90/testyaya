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
    <div class="jumbotron my-4">
      <h1 class="display-4">Mon compte</h1>
    </div>

    <!-- Page Feature -->
    <div class="text-center">

      <div class="mb-5">
        <div class="text-center">
          <div class="card-body">
            <p class="card-text">Nom : {{ $user->nom }}</p>
            <p class="card-text">Prenom : {{ $user->prenom }}</p>
            <p class="card-text">email : {{ $user->email }}</p>
            <p class="card-text">Date de naissance : {{ $user->date_de_naissance }}</p>
            <p class="card-text">Solde : {{ $user->solde }} €</p>
          </div>
            <a href="/updateprofile" class="btn btn-primary">Modifier les informations du compte</a> 
        </div>
      </div>

      <div>
          <!-- Jumbotron Header -->
        <div class="jumbotron my-4">
            <h1 class="display-5">Mes factures</h1>
        </div>
        <table class="table table-hover table table-bordered">
            <thead>
              <tr>
                <th scope="col">Numéro de commande</th>
                <th scope="col">Nom du concert</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix</th>
                <th scope="col">Code</th>
                <th scope="col">Date_achat</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($facturation as $facture)
              <tr>
                <th scope="row">{{$facture->id}}</th>
                <td>{{$facture->nom}}</td>
                <td>{{$facture->quantite}}</td>
                <td>{{$facture->prix}} €</td>
                <td>{{$facture->code}}</td>
                <td>{{$facture->date_achat}}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
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

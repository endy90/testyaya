<!DOCTYPE html>
<html lang="en">

<head>

    @include('ClientPart.Partials.index.head')

</head>

<body>
    <!-- Navigation -->
     @include('ClientPart.Partials.index.nav')

     <div class="">
        @include('flash::message')

        <div class="col-md-4 order-md-2 mb-4 mt-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Votre Panier</span>
            <span class="badge badge-secondary badge-pill">{{Cart::getContent()->count()}}</span>
          </h4>
            <ul class="list-group mb-3">
                @foreach(Cart::getContent() as $product)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{$product->name}}</h6>
                        <small class="text-muted">{{$product->quantity . ' x €' . $product->price}}</small>
                    </div>
                    <span class="text-muted">{{'€' . $product->price * $product->quantity}}</span>
                    {{-- <form>
                        <input id="moins" type="button" value="-" />
                        <input id="plus" type="button" value="+" />
                    </form> --}}
                </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (EUR)</span>
                    <strong>{{Cart::getSubTotal()}}</strong>
                </li>
            </ul>
            <form action="{{route('cart.clear')}}" method="POST" class="card p-2">
                @csrf
                <div class="input-group">
                    <div class="input-group">
                        <button type="submit" class="btn btn-danger">Vider le panier</button>
                    </div>
                </div>
            </form>

        </div>

            @if(Cart::getContent()->count() != 0)
            <div class="ml-auto mb-auto mt-auto card-header text-center">

                <h4 class="mb-3">Moyen de paiement</h4>

                    <div class="">
                        <label for="cc-name">Solde restant du compte :</label>
                        <div class="">
                            {{$user->solde}} €
                        </div>
                    </div>
            </div>
            <form action="{{route('cart.payment')}}" method="POST" class="card p-5">
                @csrf
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Payer avec votre solde</button>
            </form>
            @endif
        </div>
    </div>

</div>

  <!-- Footer -->
  @include('ClientPart.Partials.index.footer')

  <!-- Bootstrap core JavaScript -->
  @include('ClientPart.Partials.index.footer-script')

</body>

</html>


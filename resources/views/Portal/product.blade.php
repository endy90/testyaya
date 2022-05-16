@extends('Layout.app')
@section('contenu')
<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">L'information des produits.</p>
                    <a href="{{url('/createproduct')}}" class="btn btn-primary btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Créer d'un produit</span>
                    </a>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Produits</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Description</th>
                                            <th>Quantité</th>
                                            <th>Prix</th>
                                            <th>Code</th>
                                            <th>Photo</th>
                                            <th>Avis et note moyenne</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->nom}}</td>
                                            <td>{{$product->description}}</td>
                                            <td>{{$product->quantite}}</td>
                                            <td>{{$product->prix}}</td>
                                            <td>{{$product->code}}</td>
                                            <td><img src="{{ asset('storage/product/'.$product->photo) }}" alt="postImage" width="100px"></td>
                                            <td><a href="/product/{{$product->id}}">Ici(vers la page d'un product détaillé)</a></td>
                                            <td>
                                                <a href="{{route('update.Product',['id'=>$product->id])}}" class="btn btn-info btn-circle btn-sm">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            </td>
                                            <td>
                                            <form action="/deleteproduct/{{$product->id}}" method="POST">
                                                {{csrf_field()}}
                                                {{method_field('delete')}}
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="hidden" name="id"
                                                        placeholder="" value="{{$product->id}}" label="Id" id="InputId" >
                                                </div>
                                                <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
@endsection

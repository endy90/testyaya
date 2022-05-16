<!DOCTYPE html>
<html lang="en">

<head>

    @include('Partials.head')

</head>
<body class="bg-gradient-primary">

    <div class="container">
        @include('flash::message')

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Modifier Compte d'utilisateur</h1>
                            </div>
                            <form class="user" action="/updatemembre" method="POST">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="hidden" name="id"
                                            placeholder="" value="{{$user->id}}" label="Id" id="InputId" >
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="InputNom">Nom: </label>
                                        <input type="text" name="nom" class="form-control form-control-user"
                                            placeholder="" value="{{$user->nom}}" label="Nom" id="InputNom" aria-describedby="nomHelp">
                                        @if($errors->has('nom'))
                                        <small id="nomHelp" class="form-text text-muted">{{$errors->first('nom')}}</small>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="InputPrenom">Prenom: </label>
                                        <input type="text" name="prenom" class="form-control form-control-user"
                                            placeholder="" value="{{$user->prenom}}" label="Prenom" id="InputPrenom" aria-describedby="prenomHelp">
                                        @if($errors->has('prenom'))
                                        <small id="prenomHelp" class="form-text text-muted">{{$errors->first('prenom')}}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="">Date de naissance: </label>
                                        <input type="date" name="date_de_naissance" class="form-control form-control-user"
                                            placeholder="" value="{{$user->date_de_naissance}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="InputEmail">Email: </label>
                                    <input type="email" name="email" class="form-control form-control-user"
                                        placeholder="" value="{{$user->email}}" label="Email" id="InputEmail" aria-describedby="emailHelp">
                                    @if($errors->has('email'))
                                    <small id="emailHelp" class="form-text text-muted">{{$errors->first('email')}}</small>
                                    @endif
                                </div>
                                <input type="submit" value="Mettre à jour" class="btn btn-primary btn-user btn-block">
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @include('Partials.footer-script')

</body>

</html>

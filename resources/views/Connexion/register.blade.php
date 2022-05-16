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
                                <h1 class="h4 text-gray-900 mb-4">Créer un compte!</h1>
                            </div>
                            <form class="user" action="/register" method="POST">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="InputNom">Nom: </label>
                                        <input type="text" name="nom" class="form-control form-control-user"
                                            placeholder="" value="{{old('nom')}}" label="Nom" id="InputNom" aria-describedby="nomHelp">
                                        @if($errors->has('nom'))
                                        <small id="nomHelp" class="form-text text-muted">{{$errors->first('nom')}}</small>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="InputPrenom">Prenom: </label>
                                        <input type="text" name="prenom" class="form-control form-control-user"
                                            placeholder="" value="{{old('prenom')}}" label="Prenom" id="InputPrenom" aria-describedby="prenomHelp">
                                        @if($errors->has('prenom'))
                                        <small id="prenomHelp" class="form-text text-muted">{{$errors->first('prenom')}}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="">Date de naissance: </label>
                                        <input type="date" name="date_de_naissance" class="form-control form-control-user"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="InputEmail">Email: </label>
                                    <input type="email" name="email" class="form-control form-control-user"
                                        placeholder="" value="{{old('email')}}" label="Email" id="InputEmail" aria-describedby="emailHelp">
                                    @if($errors->has('email'))
                                    <small id="emailHelp" class="form-text text-muted">{{$errors->first('email')}}</small>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="InputPassword">Password: </label>
                                        <input type="password" name="password" class="form-control form-control-user"
                                            placeholder=""  label="Password" id="InputPassword" aria-describedby="passwordlHelp">
                                        @if($errors->has('password'))
                                        <small id="passwordlHelp" class="form-text text-muted">{{$errors->first('password')}}</small>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="InputConfirmPassword">Password Confirmation : </label>
                                        <input type="password" name="confirm-password" class="form-control form-control-user"
                                            placeholder=""  label="ConfirmPassword" id="InputConfirmPassword" aria-describedby="confirmpasswordlHelp">
                                        @if($errors->has('confirm-password'))
                                        <small id="confirmpasswordlHelp" class="form-text text-muted">{{$errors->first('confirm-password')}}</small>
                                        @endif
                                    </div>
                                </div>
                                <input type="submit" value="Créer votre compte" class="btn btn-primary btn-user btn-block">
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{url('/forgotpassword')}}">Mot de passe oublié?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{url('/login')}}">Vous avez déjà un compte? S'identifier!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @include('Partials.footer-script')

</body>

</html>

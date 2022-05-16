<!DOCTYPE html>
<html lang="en">

<head>

    @include('Partials.head')

</head>
<body class="bg-gradient-primary">

    <div class="container">
        @include('flash::message')

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenue!</h1>
                                    </div>
                                    <form class="user" action="/login" method="post">
                                    {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="InputEmail">Email: </label>
                                            <input type="email" name="email" class="form-control form-control-user"
                                                placeholder="" label="Email" id="InputEmail" aria-describedby="emailHelp">
                                            @if($errors->has('email'))
                                            <small id="emailHelp" class="form-text text-muted">{{$errors->first('email')}}</small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="InputPassword">Password: </label>
                                            <input type="password" name="password" class="form-control form-control-user"
                                                placeholder=""  label="Password" id="InputPassword" aria-describedby="passwordlHelp">
                                            @if($errors->has('password'))
                                            <small id="passwordlHelp" class="form-text text-muted">{{$errors->first('password')}}</small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type="submit" value="Connecter" class="btn btn-primary btn-user btn-block">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{url('/forgotpassword')}}">Mot de passe oublié?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{url('/register')}}">Créez un compte!</a>
                                    </div>
                                </div>
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

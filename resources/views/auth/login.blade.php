<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>Login - La Ramada</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">

                    <div style="text-align: center;">
                        <img class="img-fluid" src="vendor/adminlte/dist/img/logoRamada.png" alt="">
                    </div>

            </div>

            <div class="col-lg-6 col-md-12">
                <div>
                    <x-guest-layout>
                        <x-authentication-card>
                                    <x-slot name="logo">
                                    </x-slot>

                                    <x-validation-errors class="mb-4" />

                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif


                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div style="text-align: center;">
                                            <img class="img-fluid" src="vendor/adminlte/dist/img/person-icon-blue.png" alt="">
                                        </div>
                                        <div>
                                            <label for="email">{{ __('Email') }}</label>
                                            <input id="email" class="block mt-1 w-full" type="email" name="email"
                                            :value="old('email')" required autofocus autocomplete="username">
                                        </div>

                                        <div class="mt-4">
                                            <label for="password">Password</label>
                                            <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <button class="btn btn-dark rounded">
                                                Log in
                                            </button>
                                        </div>
                                    </form>
                                </x-authentication-card>
                    </x-guest-layout>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

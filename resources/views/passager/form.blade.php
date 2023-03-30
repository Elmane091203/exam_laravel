<x-app-layout>
    <div class="container p-6 ">
        <div class="row d-flex justify-content-around">
            <div class="card col-md-5 bg-light">
                <div class="center-wrap">
                    <div class="section">
                        <h4 class="bordered h2" style="margin: 0; padding:0;">Inscription</h4>
                        <span>Votre chauffeur en unclic!</span> <br>
                        <br>
                        <form>
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" id="email" name="email" id="email" class="form-control"
                                    required placeholder="Email">
                            </div>
                            <div class="form-group mt-2">
                                <label for="email">{{ __('Mot de Passe') }}</label>
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                    required>
                            </div>
                            <div class="form-group d-flex justify-content-around">
                                <button class="btn btn-default" type="reset"><a
                                        href="{{ route('login') }}">{{ __('J\'ai déjà un compte') }} </a></button>
                                <input type="button" id="envoyer"class="btn btn-warning" value="{{ __('Envoyer') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card col-md-5 bg-light">
                <div class="center-wrap">
                    <div class="section">
                        <h4 class="bordered h2" style="margin: 0; padding:0;">Bienvenue</h4>
                        <span>Finalisez votre compte en renseignant les informations manquantes!</span> <br>
                        <br>
                        <form method="POST" action="{{ route('compte.storep') }}">
                            @csrf
                            <div class="row d-flex justify-content-around mb-6">
                                <input readonly id="emailS" name="email" class="form-control" required
                                    placeholder="Email">
                                <input readonly type="password" id="passwordS" name="password" class="form-control"
                                    required placeholder="Mot de Passe">
                                <div class="form-group">
                                    <label for="nom">{{ __('Nom') }}</label>
                                    <input disabled type="nom" id="nom" name="nom" class="form-control"
                                        required placeholder="Nom">
                                </div>
                                <div class="form-group">
                                    <label for="prenom">{{ __('Prenom') }}</label>
                                    <input disabled type="prenom" id="prenom" name="prenom" class="form-control"
                                        required placeholder="Prenom">
                                </div>
                            </div>
                            <div class="form-group mt-6 d-flex justify-content-around">
                                <button id="inscrire" disabled class="btn btn-primary text-warning"
                                    type="submit">{{ __('S\'inscrire') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <img src="{{ asset('images/im.png') }}" alt="Image">
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $("#envoyer").on('click', function() {
            if ($('#email').val() == "" || $('#password').val() == "") {
                alert("veuillez remplir tous les champs!")
            } else {
                email = $('#email').val();
                clients = <?= $clients ?>;
                clients.forEach(element => {
                    if (email == element.email) {
                        alert("Cet adresse existe deja!");
                        $('#email').val("");

                    }
                });
                if ($('#email').val() != "") {

                    $('#emailS').val($('#email').val());
                    $('#email').val("");
                    $('#email').attr('disabled', true);
                    $('#password').attr('disabled', true);
                    $('#nom').attr('disabled', false);
                    $('#prenom').attr('disabled', false);
                    $('#inscrire').attr('disabled', false);
                    $('#passwordS').val($('#password').val());
                    $('#password').val("");
                }

            }
        })
    </script>
</x-app-layout>

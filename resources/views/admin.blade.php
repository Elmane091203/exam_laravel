<x-app-layout>
    <div class="m-4">
        <div class=" row w-100 mb-3">
            <div class="card w-auto">
                <div class="card-header">
                    <h1>Enregistrer un nouvel itinéraire</h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('enregistrer_itineraire') }}">
                        @csrf
                        <div class="row mt-2">
                            <label class="h6 col-md-6" for="region_depart">Région de départ :</label>
                            <select name="region_depart" class="form-control col-md-5" id="region_depart">
                                <option value="">Sélectionner une région</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->nom }}</option>
                                @endforeach
                            </select><br>
                        </div>
                        <div class="row mt-2">

                            <label class="h6 col-md-6" for="departement_depart">Département de départ :</label>
                            <select name="departement_depart" class="form-control col-md-5" id="departement_depart">
                                <option value="">Sélectionner un département</option>
                            </select><br>
                        </div>
                        <div class="row mt-2">
                            <label class="h6 col-md-6" for="ville_depart">Ville de départ :</label>
                            <select class="form-control col-md-5" name="ville_depart" required id="ville_depart">
                                <option value="">Sélectionner une ville</option>
                            </select><br>
                        </div>
                        <div class="row mt-2">

                            <label class="h6 col-md-6" for="region_arrivee">Région d'arrivée :</label>
                            <select name="region_arrivee" class="form-control col-md-5" id="region_arrivee">
                                <option value="">Sélectionner une région</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->nom }}</option>
                                @endforeach
                            </select><br>
                        </div>
                        <div class="row mt-2">

                            <label class="h6 col-md-6" for="departement_arrivee">Département d'arrivée :</label>
                            <select name="departement_arrivee" class="form-control col-md-5" id="departement_arrivee">
                                <option value="">Sélectionner un département</option>
                            </select><br>
                        </div>
                        <div class="row mt-2">
                            <label class="h6 col-md-6" for="ville_arrivee">Ville d'arrivée :</label>
                            <select class="form-control col-md-5" name="ville_arrivee" required id="ville_arrivee">
                                <option value="">Sélectionner une ville</option>
                            </select><br>
                        </div>
                        <div class="row mt-2">
                            <label class="h6 col-md-6" for="distance">Distance :</label>
                            <input type="number" min="1" placeholder="distance en km" id="distance"
                                class="form-control col-md-5" name="distance" required><br>
                        </div>
                        <div class="row mt-2">
                            <label class="h6 col-md-6" for="tarif">Tarif :</label>
                            <input type="number" readonly placeholder="distance fois 500" id="tarif"
                                class="form-control col-md-5" name="tarif" required><br>
                        </div>
                        <div class="card-footer text-center mt-2">
                            <input type="submit" value="Enregistrer l'itinéraire">
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive w-50 offset-2 bg-white">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Ville de départ</th>
                            <th>Ville d'arrivée</th>
                            <th>Tarif</th>
                            <th>Distance</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($itineraires as $itineraire)
                            <tr>
                                <td>{{ $itineraire->depart->nom }}</td>
                                <td>{{ $itineraire->arrivee->nom }}</td>
                                <td>{{ $itineraire->tarif }}</td>
                                <td>{{ $itineraire->distance }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="container">
            <div class="card h-50 mt-2">
                <div class="card-header bg-primary text-center h5 text-white">
                    <h2>Listes des Chauffeurs</h2>
                </div>
                <div class="table-responsive w-auto bg-white">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $chauffeur)
                                @if ($chauffeur->hasRole('chauffeur'))
                                    <tr>
                                        <td>{{ $chauffeur->nom }}</td>
                                        <td>{{ $chauffeur->prenom }}</td>
                                        <td>{{ $chauffeur->email }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card h-50 mt-2">
                <div class="card-header bg-primary text-center h5 text-white">
                    <h2>Listes des passagers</h2>
                </div>
                <div class="table-responsive w-auto bg-white">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $chauffeur)
                                @if ($chauffeur->hasRole('client'))
                                    <tr>
                                        <td>{{ $chauffeur->nom }}</td>
                                        <td>{{ $chauffeur->prenom }}</td>
                                        <td>{{ $chauffeur->email }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#region_depart').on('change', function() {
            <?php
                foreach ($regions as $value) { ?>
            if ($('#region_depart').val() == <?= $value->id ?>) {
                departements = <?= $value->departements ?>
            }
            <?php } ?>
            $('#departement_depart').empty();
            $('#departement_depart').append($('<option>', {
                value: '',
                text: 'Sélectionner un département'
            }));
            departements.forEach(element => {
                $('#departement_depart').append($('<option>', {
                    value: element.id,
                    text: element.nom
                }));
            });
        });
        $('#region_arrivee').on('change', function() {
            <?php
                foreach ($regions as $value) { ?>
            if ($('#region_arrivee').val() == <?= $value->id ?>) {
                departements = <?= $value->departements ?>
            }
            <?php } ?>
            $('#departement_arrivee').empty();
            $('#departement_arrivee').append($('<option>', {
                value: '',
                text: 'Sélectionner un département'
            }));
            departements.forEach(element => {
                $('#departement_arrivee').append($('<option>', {
                    value: element.id,
                    text: element.nom
                }));
            });
        });

        $('#departement_depart').on('change', function() {
            <?php
                foreach ($departements as $value) { ?>
            if ($('#departement_depart').val() == <?= $value->id ?>) {
                villes = <?= $value->villes ?>
            }
            <?php } ?>
            $('#ville_depart').empty();
            $('#ville_depart').append($('<option>', {
                value: '',
                text: 'Sélectionner une ville'
            }));
            villes.forEach(element => {
                $('#ville_depart').append($('<option>', {
                    value: element.id,
                    text: element.nom
                }));
            });
        });
        $('#departement_arrivee').on('change', function() {
            <?php
                foreach ($departements as $value) { ?>
            if ($('#departement_arrivee').val() == <?= $value->id ?>) {
                villes = <?= $value->villes ?>
            }
            <?php } ?>
            $('#ville_arrivee').empty();
            $('#ville_arrivee').append($('<option>', {
                value: '',
                text: 'Sélectionner un département'
            }));
            villes.forEach(element => {
                if (element.id != $('#ville_depart').val()) {
                    $('#ville_arrivee').append($('<option>', {
                        value: element.id,
                        text: element.nom
                    }));
                }
            });
        });
        $('#distance').on('blur', function() {
            $('#tarif').val($('#distance').val() * 500);
        })
    </script>

</x-app-layout>

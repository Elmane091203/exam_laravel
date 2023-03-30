<x-app-layout>
    
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
</x-app-layout>
<x-master title="Profils">
    <div class="container mt-5">
        <div class="row">
            @foreach ($profils as $profil)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="{{ route('Profil.show', $profil->id) }}" class="post-link">
                            <img src="{{ asset($profil->image) }}" style="width: 100%; height: 200px;" class="card-img-top" alt="Photo de couverture">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $profil->nom }}</h5>
                            <p class="card-text"></p>
                            <a href="{{ route('Profil.show', $profil->id) }}" class="stretched-link"></a>
                        </div>
                        @if(Auth::user()->id==$profil->id)
                        <div class="card-footer" style="z-index: 9">
                            <form action="{{ route('Profil.destroy', $profil->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger float-end ms-2">Supprimer</button>
                            </form>
                            <a href="{{ route('Profil.edit', $profil->id) }}" class="btn btn-primary float-end">Modifier</a>
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <a class="mt-3 btn btn-primary float-end" href="{{ route('Profil.create') }}">Inscrivez-vous</a>
    </div>

    {{ $profils->links('pagination::bootstrap-5') }}
</x-master>

<x-master title="Profil">

    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <img src="{{ asset($profil->image) }}" style="width: 100px; height: 100px;" alt="{{ $profil->nom }}" class="card-img-top mx-auto d-block rounded-circle">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $profil->nom }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">A propos:</li>
                        <li class="list-group-item">Depuis: {{ $profil->created_at->format('M/Y') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h6>Journal</h6>
    <div class="container">
        <div class="row justify-content-center">
            @if ($profil->publication->isEmpty())
                <p>Aucune publication à afficher</p>
            @else
                @foreach ($profil->publication as $pub)
                     <!-- Added margin bottom for spacing -->
                        <div class="show-profil">
                            <div class="post">
                                <div class="post-header">
                                    <div class="post-title">
                                        <img src="{{ asset($pub->profil->image) }}" style="width: 50px; height: 50px;" alt="user picture" class="rounded-circle"> <!-- Added rounded-circle class for consistency -->
                                        <h3>{{ $pub->profil->nom }}</h3><span>. {{ $pub->created_at->diffForHumans() }}</span>
                                    </div>
                                    @if($profil->id == Auth::user()->id)
                                        <div class="post-options">
                                            <i class="fas fa-ellipsis-h options-icon"></i>
                                            <ul class="options-menu">
                                                <li><a href="{{ route('Publication.edit', $pub->id) }}">Modifier</a></li>
                                                <form action="{{ route('Publication.destroy', $pub->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Supprimer">
                                                </form>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <a href="{{ route('Publication.show', $pub->id) }}" class="post-link">
                                    <div class="post-content">
                                        <h5>{{ $pub->titre }}</h5>
                                        <p>{{ $pub->text }}</p>
                                    </div>
                                    <div class="post-images">
                                    @if ($pub->image)
                                        <div class="post-images1"> <!-- Added margin top for spacing -->
                                            <img src="{{ asset($pub->image) }}"  alt="post images">
                                        </div>
                                    @endif
                                </div>
                                </a>
                            </div>
                        </div>
                    
                @endforeach
            @endif
        </div>
    </div>

</x-master>

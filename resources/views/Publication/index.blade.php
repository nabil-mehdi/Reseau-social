<x-master title="Publications">
    
    <div class="home">
        <a href="{{ route('Publication.create') }}" id="loadPublicationForm">
            <i class="ajoutpub fa-solid fa-plus"></i>
        </a>
        @if (isset($message))
    <div class="alert alert-info">
        {{ $message }}
    </div>
@endif
        <div class="container">
            <div class="home-wrapper">
                <div class="home-center">
                    <div class="home-center-wrapper">
                        @foreach ($publications as $pub)
                        <div class="fb-post1">
                            <div class="fb-post1-container">
                                <div class="fb-p1-main">
                                    <div class="post">
                                        <div class="post-header">
                                         <a href="{{ route('Profil.show', $pub->Profil->id) }}" class="post-link">
                                            <div class="post-title">
                                                <img src="{{ asset($pub->Profil->image) }}" alt="user picture">
                                                <h3>{{ $pub->profil->nom }}</h3><span>. {{ $pub->created_at->diffForHumans() }}</span>
                                            </div>
                                          </a>
                                            @if($pub->profil_id == Auth::user()->id)
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
                                                <div class="post-images1">
                                                    <img src="{{ asset($pub->image) }}" alt="post images">
                                                </div>
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                    <div class="like-comment">
                                        <div class="mb-3">
                                            <form action="{{ route('Commentaire.store') }}" method="POST" style="display: flex; align-items: center;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $pub->id }}">
                                                <input type="text" name="text" class="form-control" placeholder="Écrire un commentaire..." style="flex: 1; margin-right: 10px;" required>
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-paper-plane"></i> <!-- Icône d'envoi -->
                                                </button>
                                            </form>
                                        </div>
                                        <h6>Commentaires ({{count($pub->comments)}})</h6>
                                        @foreach ($pub->comments as $comment)
                                        <div class="d-flex align-items-center mb-3">
                                            <a href="{{ route('Profil.show', $comment->Profil->id) }}" class="post-link">
                                            <img src="{{ asset($comment->profil->image) }}" alt="User" class="rounded-circle mx-3" style="width: 40px; height: 40px;">
                                            </a>
                                            <div>
                                                <h6 class="mt-0 mb-1">{{ $comment->profil->nom }}</h6>
                                                <div class="comment_txt">{{ $comment->text }}</div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>

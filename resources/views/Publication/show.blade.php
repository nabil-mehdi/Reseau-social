<x-master title="Publication Details">
    <div class="publication-details">
       
        <div class="post">

            <div class="post-title">
            <img src="{{ asset($publication->Profil->image) }}" alt="user picture">
            <h3>{{ $publication->profil->nom }}</h3><span>. {{ $publication->created_at->diffForHumans() }}</span>
            </div>
            <div class="post-content">
                @foreach ($publication->tags as $tag)
                <a href="">#{{$tag->description}}</a>
                 @endforeach
                <h1>{{ $publication->titre }}</h1>
                <p>{{ $publication->text }}</p>
                @if ($publication->image)
                <div class="post-images">
                    <img src="{{ asset($publication->image) }}" style="width: 100%" alt="post images">
                </div>
                @endif
            </div>
        </div>
       
        <div class="coment-detail">
            <h6>Commentaires</h6>
            @foreach ($publication->comments as $comment)
            <div class="comment">
                <img src="{{ asset($comment->profil->image) }}" alt="User" class="rounded-circle comment-avatar">
                <div>
                    <h6>{{ $comment->profil->nom }}</h6>
                    <div class="comment_txt">{{ $comment->text }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-master>

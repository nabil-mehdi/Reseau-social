@guest
<div class="logoBox">
    <a class="navbar-brand" href="/" title="Accueil">Accueil</a>
</div>
@endguest

@auth
<div class="header-container">
    <script src="{{ asset('script/script.js') }}"></script>
    <div class="header-wrapper">
        <a href="{{ route('Publication.index') }}"> <img src="{{ asset('logo.png') }}" alt="Logo" style="width: 40px"></a>
        <div class="search-box">
            <form class="form-inline" action="{{ route('Publication.search') }}" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Chercher une place" aria-label="Chercher une place" name="query" value="{{ request('query') }}">
                <button  type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="icon-box1">
           
            <a href="{{ route('Profil.index') }}"><i class="fas fa-users"></i></a>
        </div>
        <div class="icon-box2">
            <div class="user-info">
             <a href="{{ route('Profil.show', Auth::user()->id) }}" class="post-link">
                <img src="{{ asset(Auth::user()->image) }}" class="rounded-circle" alt="Utilisateur">
                <span class="username">{{ Auth::user()->nom }}</span>
             </a>
                <div class="dropdown">
                    <i class="fas fa-caret-down"></i>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('logout') }}">Déconnexion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth

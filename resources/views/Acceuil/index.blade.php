<x-master title="login">
    <div class="container">
        
        <div class="row">
            <div class="col-logo">
                <img src="{{ asset('logo.png') }}" alt="Logo">
                <h2>Vous pouvez partagez et Chercher des endroit.</h2>
            </div>
            <div class="col-form">
                <h2 class="text-center mb-4">Bienvenue</h2>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <input id="email" type="text" name="email" placeholder="Adresse e-mail" value="{{old('email')}}" required>
                    <input id="password" type="password" name="password" placeholder="Mot de passe" required>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <button class="btn-login">Se connecter</button>
                  <div class="lien"><a href="{{ route('Profil.create') }}">Créer nouveau compte</a></div>  
                  <h1>hello</h1>
                </form>
            </div>
        </div>
    </div>
    
</x-master>

<x-master title="Modifier">
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Modifier</h5>
                <form action="{{route('Profil.update',$profils->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$profils->id}}" required><!-- old si lavaleur est exacte est les autres pas elle n'eface pas -->

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{$profils->nom}}" required><!-- old si lavaleur est exacte est les autres pas elle n'eface pas -->
                    </div>
    
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email"  value="{{$profils->email}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Photo</label>
                        <input type="file" class="form-control"  name="image" value="{{$profils->image}}">
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" id="delete_image" name="delete_image">
                        <label for="delete_image">Supprimer l'image</label>
                    </div>
    
                    <div class="mb-3">
                        <label for="mot_de_passe" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password">
                 
                    </div>
                    <div class="mb-3">
                        <label for="mot_de_passe" class="form-label">Confirmation mot de passe</label>
                        <input type="password" class="form-control"  name="password_confirmation">
                        <div class="text-danger">
                            @error('motdepass')<!--il se base sur le validateur -->
                            {{$message}}
                        @enderror</div>  
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
    
    
    </x-master>
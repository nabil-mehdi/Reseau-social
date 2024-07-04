<x-master title="S'inscrire">
    <div class="container custom-margin-top">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="mb-0">S'inscrire</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Profil.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
                            </div>
    
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
    
                            <div class="form-group mb-3">
                                <label for="image" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
    
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
    
                            <div class="form-group mb-3">
                                <label for="password_confirmation" class="form-label">Confirmation mot de passe</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                <div class="text-danger">
                                    @error('motdepass')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
    
                            <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-master>
    
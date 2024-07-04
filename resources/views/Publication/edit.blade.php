<x-master title="Modifier Publication">
   
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Modifier Publication</h5>
    <form action="{{route('Publication.update',$publication->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="hashtags">Titre</label>
            <input type="text" class="form-control" id="hashtags" name="titre" placeholder="Titre" value="{{$publication->titre}}">
        </div>
        <div class="text-danger">
            @error('titre')<!--il se base sur le validateur -->
            {{$message}}
        @enderror</div>  
        <div class="form-group">
            <label for="content">Contenu de la publication:</label>
            <textarea class="form-control" id="content" name="text" rows="4" placeholder="Que voulez-vous partager ?">{{$publication->text}}</textarea>
        </div>


        <div class="form-group">
            <label >Image:</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="URL de l'image" accept=".png, .jpg, .jpeg">
        </div>
        <div class="mb-3">
            <input type="checkbox" id="delete_image" name="delete_image">
            <label for="delete_image">Supprimer l'image</label>
        </div>
        <div class="text-danger">
            @error('image')
            {{$message}}
        @enderror</div>  

       
<div class="m-3">
    <button type="submit" class="btn btn-primary">Modifier</button>
</div>
       
    </form>
            </div>
        </div>
    </div>

</x-master>
 
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="text-center mb-4">Create Publication</h2>
                    <form action="{{ route('Publication.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="titre">Title:</label>
                            <input type="text" class="form-control" id="titre" name="titre" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="text">Text:</label>
                            <textarea class="form-control" id="text" name="text" rows="4" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <div class="form-group mb-3">
                            <label for="tags">Tags:</label>
                            <select class="form-control" id="tags" name="tags[]" multiple="multiple"></select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tags').select2({
            tags: true,
            tokenSeparators: [',', ' '],
            placeholder: "Add tags",
            width: '100%'
        });
    });
</script>

  
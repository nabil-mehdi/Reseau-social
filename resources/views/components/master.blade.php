<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href={{asset('css/style.css')}}>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
   


    <title> {{$title}}</title>
    @include('include/nav')
</head>
<body>
   
    @if (session()->has('success'))
   
    
      
      @endif
      <main>
        <div class="container">
           
        
            {{$slot}}
        </div>
    </main>
    <div id="publicationModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="publicationFormContainer"></div>
        </div>
    </div>

    <script>
      
    </script>
     
   
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title> Sistema Asistente de Versiones </title>
</head>
<body>
    <nav class="navbar bg-body-tertiary" data-bs-theme="dark">  
        <div class="container-fluid">        
            <a class="navbar-brand" href="#">    
                <h4> Asistente de Versiones <i class="fa-solid fa-code-compare"></i> </h4>
            </a>
        </div>
    </nav>
    <div class="container">
        <div class="row d-flex justify-content-center mt-5 ">
            <div class="col-md-8">
                <div class="card">  
                    <form action="puntoscambio.php" method="post" enctype="multipart/form-data">         
                        <div  class="input-group mb-3">
                            <label class="input-group-text" for="fileTest">Upload</label>
                            <input type="file" class="form-control" id="fileTest" name="fileTest" value="">  
                        </div>      
                        <button type="submit" class="btn-submit">Guardar</button>
                    </form>
                </div>
            </div>   <!-- Col md - 8 -->
        </div>       <!-- Row d - flex -->
    </div> <!-- Container -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous">
    </script>
</body>
</html>
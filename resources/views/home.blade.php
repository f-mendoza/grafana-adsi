<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Twitter</title>
    <style>
        #post {
            height: 150px;
        }
    </style>
</head>

<body class="bg-dark d-flex justify-content-center text-light">
    <main class="d-flex flex-column col-11 col-md-6 col-lg-4 mt-5">
        <h1 class="text-light">Publica algo</h1>
        <form action="{{url('/post')}}" method="post" class="d-flex flex-column align-items-end">
            @csrf
            <input type="hidden" name="ip_address" value="{{$_SERVER['REMOTE_ADDR']}}">
            <div class="form-floating w-100">
                <textarea class="form-control bg-dark text-light" placeholder="Escribe algo para publicar" id="texto"
                    name="texto" required></textarea>
                <label for="texto" class="text-light">Post</label>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Publicar</button>
        </form>
        @if($errors->any())
            <span>Ha ocurrido un error:</span>
            <ul class="text-light list-unstyled ms-1">
                @foreach($errors->all() as $error)
                    <li class="">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @if(count($posts))
            <div class="d-flex flex-column gap-3 mt-5">
                @foreach($posts as $post)
                    <x-post :$post></x-post>
                @endforeach
            </div>
        @else
            <p class="mt-5 text-light text-center">No hay publicaciones</p>
        @endif
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
</body>

</html>
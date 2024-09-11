<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Intranet</title>
        <meta http-equiv="Refresh" content="900"> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/f1a2cb49c0.js" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="owlcarousel/owl.theme.default.css">
        <link rel="stylesheet" href="css/muro.css">
        <link rel="stylesheet" href="css/cumples.css">
        <link rel="stylesheet" href="css/links.css">
        <link rel="stylesheet" href="css/valores.css">

        @livewireStyles
        <video autoplay muted loop id="videoFondo">
            <source src="{{ asset('img/invertec-video.webm') }}" type="video/webm">
        </video>
    </head>
    <body>
        @livewireScripts
        <div class="container mt-2" style="width: 200% !important; padding-left: 0 !important; padding-right: 0 !important;">
            <div class="row"  style="position: relative;">
                <div class="col-3">
                    @livewire('cumples')
                </div>
                
                <div class="col-6">
                    @livewire('muro')
                </div>

                <div class="col-3">
                    @livewire('links')
                    @livewire('valores')
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="owlcarousel/owl.carousel.min.js"></script>
    </body>
</html>
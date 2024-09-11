<!-- COMPONENTE PÁGINA DE GESTION -->
<div>
    <div class="row">
        <div class="col-3">
            <!-- LOGO INVERTEC-->
            <a href="http://intranet.invertec.cl/gestiondeposts">
                <picture><img src="../img/invertec-img.png" alt="Logo" width="90%"></picture>
            </a>
            <br>
            <!-- BOTONES NUEVA PUBLICACION Y GESTION DE LINKS-->
            <div style=" margin: 0; position: absolute; top: 50%; -ms-transform: translateY(-50%); transform: translateY(-50%);">
                <button class="btn btn-success button-verde-invertec btn-sm m-2 " wire:click.prevent="$emit('showModalNuevaPublicacion')" style="font-size: 1.3em;">Nueva publicación</button>
                <br>
                <button class="btn btn-primary btn-sm m-2 " wire:click.prevent="$emit('showModalLinks')" style="font-size: 1.3em;">Gestionar Links</button>
            </div>
        </div>
        <!-- CAROUSEL PUBLICACIONES--> 
        <div class="col-9">
            @if (count($publicaciones))
                <div id="carouselPosts" class="carousel slide shadow" data-bs-pause="true" data-bs-ride="carousel" data-bs-interval="false">
                    <div class="carousel-inner">
                        <?php $pagina = 1; ?>
                        @foreach ($publicaciones as $publicacion)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <!-- CARD POR CADA PUBLICACIÓN-->
                                <div class="card text-dark" style="height: 98vh; overflow-y: auto; scroll-behavior: smooth; background-color: rgb(255,255,255, 0.95)">
                                    <div class="card-body">
                                        <!-- "HEADER" MODAL-->
                                        <div class="card-title">
                                            <div class="row">
                                                <!-- TÍTULO PUBLICACIÓN-->
                                                <div class="col-9">
                                                    <h3 style="color: rgb(21, 103, 46, 1);">{{$publicacion->titulo}}</h3>
                                                </div>
                                                <div class="col-3" align="right">
                                                    <!-- FECHA PUBLICACIÓN -->
                                                    <!-- BOTÓN ELIMINAR-->
                                                    <button type="button" class="btn btn-secondary button-verde-invertec" wire:click.prevent="$emit('showModalEditarPublicacion', {{$publicacion->id}})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    </button>
                                                    <button type="button" class="btn btn-secondary button-rojo-invertec" wire:click.prevent="$emit('showModalEliminarPublicacion', {{$publicacion->id}})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash " viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                        </svg>
                                                    </button>
                                                    <div class="btn btn-secondary" > 
                                                        {{$pagina}}&frasl;{{count($publicaciones)}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- TEXTO PUBLICACIÓN -->
                                        <div class="card-text">
                                            <?php
                                                echo html_entity_decode($publicacion->texto);
                                            ?>
                                        </div>
                                        <!-- IMAGENES PUBLICACIONES-->
                                        @if (count($publicacion->imagenes))
                                            <div class="owl-carousel owl-theme ">
                                                @foreach ($publicacion->imagenes as $imagen)
                                                    <!-- IMAGEN CON LINK-->
                                                    @if ($imagen->link != null && $imagen->imagen != null)
                                                        <a href="{{$imagen->link}}" target="_blank"><img src="storage/{{$imagen->imagen}}" style="height: 50vh; width: auto;"></a> 
                                                    <!-- IMAGEN SIN LINK-->
                                                    @elseif ($imagen->imagen != null)
                                                        <img src="storage/{{$imagen->imagen}}"style="height: 50vh; width: auto;" >
                                                    @endif                                   
                                                @endforeach
                                            </div>
                                        @endif
                                        <!-- VIDEO PUBLICACIÓN -->
                                        @if (count($publicacion->imagenes))
                                            @if ($publicacion->imagenes[0]->imagen == null && $publicacion->imagenes[0]->link != null)
                                                <video src="{{$publicacion->imagenes[0]->link}}" autoplay="true" muted="true" controls="false"
                                                style="height: 80vh; display: block; margin: 0 auto;"></video>
                                            @endif  
                                        @endif
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <?php $pagina += 1; ?>
                        @endforeach
                    </div>
                    <!-- CONTROLES CAMBIAR DE PÁGINA-->
                    @if (count($publicaciones) > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselPosts" data-bs-slide="prev">
                            <i class="fa-solid fa-circle-left fa-2xl" style="color: rgb(192, 28, 36, 1); font-size:250%;"></i>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselPosts" data-bs-slide="next">
                            <i class="fa-solid fa-circle-right fa-2xl" style="color: rgb(192, 28, 36, 1); font-size:250%;"></i>
                        </button>
                    @endif
                </div> 
            @endif
        </div>
    </div>
    <!-- MODALS-->
    <livewire:modals.modal-nueva-publicacion />
    <livewire:modals.modal-eliminar-publicacion />
    <livewire:modals.modal-imagenes />
    <livewire:modals.modal-links />
    <livewire:modals.modal-editar-link />
    <livewire:modals.modal-editar-publicacion />

    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- SCRIPT OWL-CAROUSEL (IMAGENES PUBLICACIÓN)-->
    <script> 
        document.addEventListener('livewire:load', function () {
            $('.owl-carousel').owlCarousel({
                items:1,
                loop:true,
                autoplay:true,
                autoplayTimeout:4500,
                autoplayHoverPause:true,
                dots:false,
            });
        });
    </script>
    <!-- SCRIPT VIDEO (REPRODUCIR DE CERO AL ACTIVAR SU MODAL)-->
    <script>
        var carousel = document.getElementById('carouselPosts');

        carousel.addEventListener('slide.bs.carousel', function (event) {
            var video = event.relatedTarget.querySelector('video');
            if (video) {
                video.currentTime = 0;
            }
        });
    </script>
</div>
<div>
    @if (count($publicaciones))
    <!-- MOSTRAR SÓLO SI EXISTEN PUBLICACIONES -->
    <div id="carouselPosts" class="carousel slide shadow" data-bs-ride="carousel" data-bs-interval="20000">
        <div class="carousel-inner">
            @foreach ($publicaciones as $publicacion)
            <!-- SLIDES  -->
            <div class="carousel-item @if($loop->first) active @endif" wire:key="slide-{{ $publicacion->id }}" data-bs-interval="{{ $intervals[$publicacion->id] }}">
                    <div class="card text-dark" style="height: 90vh; overflow-y: scroll; scroll-behavior: smooth; background-color: rgb(255,255,255, 0.95)">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-9">
                                        <h5 style="color: rgb(21, 103, 46, 1);">{{$publicacion->titulo}}</h5>
                                    </div>
                                    <div class="col-3" align="right">
                                        <small class="text-muted" >{{date('d-m-Y', strtotime($publicacion->fecha))}}</small>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!-- TEXTO DE LA PUBLICACIÓN -->
                            <div class="card-text">
                                <?php
                                    echo html_entity_decode($publicacion->texto);
                                ?>
                            </div>
                            <br>
                            <!-- CAROUSEL DE IMÁGENES -->
                            @if (count($publicacion->imagenes))
                                <div class="owl-carousel owl-theme ">
                                    @foreach ($publicacion->imagenes as $imagen)
                                        @if ($imagen->link != null && $imagen->imagen != null)
                                            <a href="{{$imagen->link}}" target="_blank"><img src="storage/{{$imagen->imagen}}" style="height: 60vh; width: auto;"></a> 
                                        @elseif ($imagen->imagen != null)
                                            <img src="storage/{{$imagen->imagen}}" style="height: 60vh; width: auto;">
                                        @endif                                   
                                    @endforeach
                                </div>
                            @endif
                            <!-- VIDEO-->
                            @if (count($publicacion->imagenes))
                                @if ($publicacion->imagenes[0]->imagen == null && $publicacion->imagenes[0]->link != null)
                                    <video src="{{$publicacion->imagenes[0]->link}}" autoplay="true" muted="true" controls="false"
                                    style="max-height: 70vh; display: block; margin: 0 auto;"></video>
                                @endif  
                            @endif
                            <br>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- CONTROLES DE CAROUSEL EN CASO DE EXISTIR MÁS DE UNA PUBLICACIÓN -->
        @if (count($publicaciones) > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselPosts" data-bs-slide="prev">
                <i class="fa-solid fa-circle-left fa-2xl" style="color: rgb(192, 28, 36, 1); font-size:250%;"></i>
                <span class="text-white"> Publicación anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselPosts" data-bs-slide="next">
                <span class="text-white"> Publicación siguiente</span>
                <i class="fa-solid fa-circle-right fa-2xl" style="color: rgb(192, 28, 36, 1); font-size:250%;"></i>
            </button>
        @endif
    </div> 
    @endif
    <!-- OWL CAROUSEL -->
    <script> 
        document.addEventListener('livewire:load', function () {
            $('.owl-carousel').owlCarousel({
                items:1,
                loop:true,
                autoplay:true,
                autoplayTimeout:4000,
                autoplayHoverPause:true,
                dots:true,
            });
        });
    </script>
    <!-- REINICIO DE VIDEO AL ENTRAR SU SLIDE -->
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
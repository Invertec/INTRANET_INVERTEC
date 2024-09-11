<div>
    <!-- COMPONENTE DE PUBLICACIONES PARA MOSTRAR EN "MURAL" -->
    @if (count($publicaciones))
        <div id="carouselPosts" class="carousel slide shadow" data-bs-pause="false" data-bs-ride="carousel" data-bs-interval="35000">
            <div class="carousel-inner">
                @foreach ($publicaciones as $publicacion)
                    <div class="carousel-item @if($loop->first) active @endif" wire:key="slide-{{ $publicacion->id }}" data-bs-interval="{{ $intervals[$publicacion->id] }}">
                        <!-- CARD POR CADA PUBLICACIÓN -->
                        <div class="card text-dark" style="height: 98vh; overflow-y: hidden; scroll-behavior: smooth; background-color: rgb(255,255,255, 0.95)">
                            <div class="card-body">
                                <div class="card-title">
                                    <div class="row">
                                        <!-- TÍTULO PUBLICACIÓN -->
                                        <div class="col-9">
                                            <h3 style="color: rgb(21, 103, 46, 1);">{{$publicacion->titulo}}</h3>
                                        </div>
                                        <!-- FECHA PUBLICACIÓN -->
                                        <div class="col-3" align="right">
                                            <small class="text-muted" >{{date('d-m-Y', strtotime($publicacion->fecha))}}</small>
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
                                <!-- IMÁGENES PUBLICACIÓN -->
                                @if (count($publicacion->imagenes))
                                    <div class="owl-carousel owl-theme ">
                                        @foreach ($publicacion->imagenes as $imagen)
                                            @if ($imagen->link != null && $imagen->imagen != null)
                                                <a href="{{$imagen->link}}" target="_blank"><img src="storage/{{$imagen->imagen}}" style="height: 60vh; width: auto;"></a> 
                                            @elseif ($imagen->imagen != null)
                                                <img src="storage/{{$imagen->imagen}}"style="height: 60vh; width: auto;" >
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
                @endforeach
            </div>
        </div> 
    @endif
    <!-- SCRIPT OWL-CAROUSEL (IMAGENES PUBLICACIÓN)-->
    <script> 
        document.addEventListener('livewire:load', function () {
            $('.owl-carousel').owlCarousel({
                items:1,
                loop:true,
                autoplay:true,
                autoplayTimeout:4000,
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
<div>
    <!-- MODAL IMÁGENES-->
    <div class="modal fade @if($show === true) show @endif"
         id="modalImagenes"
         style="display: @if($show === true)
                 block
         @else
                 none
         @endif;
         "
         tabindex="-1"
         role="dialog"
         aria-labelledby="Imagenes"
         aria-hidden="true">
         @if ($publicacion)

            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document" >
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(21, 103, 46, 1);">
                        <h5 class="modal-title" id="detalleUsuario" style="color: white;">Imáges de "{{$publicacion->titulo}}"</h5>
                    </div>
                    <div class="modal-body" style="height: 90vh; overflow-y: auto;">
                        @if ($publicacion->imagenes)
                            <p>Total: {{count($publicacion->imagenes)}}<p>
                            <div id="carouselImagenes" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($publicacion->imagenes as $imagen)
                                        <div class="carousel-item @if($loop->first) active @endif">
                                            @if ($imagen->link != null)
                                                <a href="{{$imagen->link}}" target="_blank"><img src="storage/{{$imagen->imagen}}" class="mx-auto d-block" style="max-width: 70%; height: auto;"></a> 
                                            @else
                                                <img src="storage/{{$imagen->imagen}}" class="mx-auto d-block" style="max-width: 60%; height: auto;">
                                            @endif   
                                        </div>
                                    @endforeach
                                </div>
                                @if (count($publicacion->imagenes) > 1)
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselImagenes" data-bs-slide="prev">
                                        <i class="fa-solid fa-circle-left fa-xl" style="color: #000000; font-size:250%;"></i><span class="visually-hidden">Siguiente</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselImagenes" data-bs-slide="next">
                                        <i class="fa-solid fa-circle-right fa-xl" style="color: #000000; font-size:250%;"></i>
                                    </button>
                                @endif
                            </div>
                        @endif
                        <br>
                    </div>
                <!-- BOTONES MODAL-->
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" wire:click.prevent="doClose()">Volver</button>
                    </div>
                </div>
            </div>
        </div>
        @endif

    <div class="modal-backdrop fade show"
         id="backdrop"
         style="display: @if($show === true)
                 block
         @else
                 none
         @endif;">
    </div>
</div>
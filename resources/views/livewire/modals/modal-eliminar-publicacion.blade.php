<div>
    <!-- MODAL ELIMINAR PUBLICACIÓN-->
    <div class="modal fade @if($show === true) show @endif"
         id="modalEliminarPublicacion"
         style="display: @if($show === true)
                 block
         @else
                 none
         @endif;"
         tabindex="-1"
         role="dialog"
         aria-labelledby="eliminarPublicacion"
         aria-hidden="true">
         @if ($publicacion)
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    
                <div class="modal-header" style="background-color: rgb(189, 28, 36)">
                    <h5 class="modal-title" id="detalleUsuario" style="color: white;">¿Eliminar la publicación <b>"{{$publicacion->titulo}}"</b></h5>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger button-rojo-invertec" type="button" wire:click.prevent="eliminarPublicacion()">Confirmar</button>
                    <button class="btn btn-secondary" type="button" wire:click.prevent="doClose()">Cancelar</button>
                </div>
                </div>
            </div>
        @endif
    </div>

    <div class="modal-backdrop fade show"
         id="backdrop"
         style="display: @if($show === true)
                 block
         @else
                 none
         @endif;">
    </div>
</div>
<div>
    <!-- MODAL EDITAR LINK-->
    <div class="modal fade @if($show === true) show @endif"
         id="modalEditarLink"
         style="display: @if($show === true)
                 block
         @else
                 none
         @endif;"
         tabindex="-1"
         role="dialog"
         aria-labelledby="editarLink"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(21, 103, 46, 1);">
                    <h5 class="modal-title" id="editarLink" style="color: white">Editar Link<b></b></h5>
                </div>
                <div class="modal-body">

                    <x-form wire:submit.prevent="editarLink()">
                        @wire
                            <!-- DATOS DE NUEVOS LINKS -->
                                <div>
                                    <div class="row">
                                        <div class="col-6">
                                            <x-form-input label="Texto" name="link_texto" wire:model="link_texto" placeholder="Texto a mostrar en lugar del enlace"/>
                                        </div>
                                        <div class="col-6">
                                            <x-form-input label="Link" name="link" wire:model="link"/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6" >
                                            <h4> Imagen actual: </h4><br>
                                            @if ($imagen_elegida)
                                                <img class="mx-auto d-block border border-dark" src="storage/{{$imagen_elegida}}" style="max-width: 130px; height: auto;">
                                            @else
                                                    <p align="center">Sin Imagen</p>
                                            @endif
                                        </div>  
                                        <div class="col-6" >
                                            @if ($imagen)
                                                <h4> Imagen nueva: </h4><br>
                                                <img class="mx-auto d-block border border-dark" id="image-preview" src="{{ $imagen->temporaryUrl() }}" style="max-width: 130px; height: auto;">
                                            @endif
                                        </div>  
                                    </div>
                                    <br><br>

                                    <x-form-input label="Si desea cambiar la imagen actual, seleccione una a continuación:" type="file" accept="image/*" id="imagen" name="imagen" wire:model="imagen"/>
                                    
                                    <div wire:loading wire:target="imagen" >
                                        <br>
                                        <div class="spinner-grow spinner-grow-sm text-success"  role="status"></div>
                                        Subiendo imagen...
                                    </div>
                                        

                                </div>
                            <br>
                        @endwire        
                    </x-form>
                </div>
                <div class="modal-footer">
                    <button wire:loading.remove wire:target="imagen" class="btn btn-success" type="button" wire:click.prevent="editarLink()">Guardar Cambios</button>
                    <button wire:loading wire:target="imagen" class="btn btn-success" type="button" wire:click.prevent="editarLink()" disabled>Guardar Cambios</button>
                    <button class="btn btn-secondary" type="button" wire:click.prevent="doClose()">Cancelar</button>
                </div>
            </div>
        </div>
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
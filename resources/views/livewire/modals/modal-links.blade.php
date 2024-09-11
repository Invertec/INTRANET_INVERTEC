<div>
    <!-- MODAL LINKS-->
    <div class="modal fade @if($show === true) show @endif"
         id="modalNuevoLink"
         style="display: @if($show === true)
                 block
         @else
                 none
         @endif;"
         tabindex="-1"
         role="dialog"
         aria-labelledby="nuevoLink"
         aria-hidden="true">
         
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(21, 103, 46, 1);">
                    <h5 class="modal-title" id="links" style="color: white;">Links de interés</h5>
                </div>
                <div class="modal-body">
                <h4><u>Agregar nuevo link</u></h4>

                    <x-form wire:submit.prevent="agregarLink()">
                        @wire
                            <!-- DATOS DE NUEVOS LINKS -->
                                <div>
                                    <div class="row">
                                        <div class="col-6">
                                            <x-form-input label="Texto" name="textos" wire:model="textos" placeholder="Texto a mostrar en lugar del enlace"/>
                                        </div>
                                        <div class="col-6">
                                            <x-form-input label="Link" name="links" wire:model="links"/>
                                        </div>
                                    </div>
                                    <br>
                                    <x-form-input label="Imagen" type="file" accept="image/*" name="imagenes" wire:model="imagenes"/>

                                    <div wire:loading wire:target="imagenes" >
                                        <br>
                                        <div class="spinner-grow spinner-grow-sm text-success"  role="status"></div>
                                        Subiendo imagen...
                                    </div>
                                </div>
                            <br>
                        @endwire        
                    </x-form>

                    <div style="text-align:center">  
                        <button wire:loading.remove wire:target="imagenes" class="btn btn-success button-verde-invertec " wire:click.prevent="agregarLink"> Guardar Nuevo Link </button>
                        <button wire:loading wire:target="imagenes" class="btn btn-success button-verde-invertec " wire:click.prevent="agregarLink" disabled> Guardar Nuevo Link </button>                    
                    </div>
                    <hr>
                    <h4><u>Links actuales</u></h4>
                    <br>
                    @if ($links_ingresados)
                        @foreach ($links_ingresados as $link)
                                <div class="row">
                                    <div class="col-3">
                                        <div class="card border-secondary mb-3" style="width: 100%; height: auto;">
                                            <a href="{{$link->link}}" target="_blank" style="color: black; text-decoration: none;" target="_blank">
                                                @if ($link->imagen)
                                                    <img src="storage/{{$link->imagen}}" class="card-img-top" style="width: 100%; height: 100px; object-fit: contain;"/>
                                                @endif
                                                <div class="card-body">
                                                    <p class="card-text">{{$link->texto}}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <p> Link: <a href="{{$link->link}}" target="_blank">{{$link->link}}</a></p>
                                        <button class="btn btn-success button-verde-invertec btn-sm m-2 " wire:click.prevent="editarLink({{$link->id}})">Editar</button>
                                        <button class="btn btn-danger button-rojo-invertec btn-sm m-2 " wire:click.prevent="eliminarLink({{$link->id}})">Eliminar</button>
                                    </div>
                                </div>
                                <hr><br>
                        @endforeach
                    @endif
                </div>
                <!-- BOTONES MODAL-->
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" wire:click.prevent="doClose()">Volver</button>
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
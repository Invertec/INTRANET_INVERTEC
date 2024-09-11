<div>
    <!-- MODAL NUEVA PUBLICACIÓN-->
    <div class="modal fade @if($show === true) show @endif"
         id="modalEditarPublicacion"
         style="display: @if($show === true)
                 block
         @else
                 none
         @endif;"
         tabindex="-1"
         role="dialog"
         aria-labelledby="editarPublicacion"
         aria-hidden="true">
         
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(21, 103, 46, 1);">
                    <h5 class="modal-title" id="datosPublicacion" style="color: white">Editar Publicación</h5>
                </div>
                <div class="modal-body">
                    
                    <x-form wire:submit.prevent="editarPublicacion()">
                        @wire
                            <!-- DATOS DE NUEVA PUBLICACIÓN -->
                            <div class='row'>
                                <div class='col-6'>
                                    <x-form-input name="titulo" label="Titulo"/>
                                </div>
                                <div class='col-6'>
                                </div>
                            </div>
                            <br>
                            @if ($edit)
                                <div wire:ignore>
                                    <div name="texto_editar" label='Cuerpo del Post' id="texto_editar"></div>
                                </div>
                                @if ($errors->any())
                                    <small style="color: red;">{{$errors->first('texto')}}</small>
                                @endif
                            @endif
                            <br>
                            @if ($video)
                                <x-form-input name="link_video" label="Link de Onedrive del Video"/> <br>
                                <div class="row">
                                    <div class="col-4">
                                    </div>
                                    <div class="col-4">
                                        <x-form-input name="duracion_video" label="Duración (minutos:segundos)" type="time" value="00:30:00"/>
                                    </div>
                                        <div class="col-4">
                                    </div>
                                </div>
                            @else
                                @foreach($imagenes_elegidas as $key => $imagen)
                                    <div>
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="mx-auto d-block border border-dark" src="storage/{{$imagen}}" style="max-width: 90%; height: auto;" onerror="this.onerror=null; this.hidden='true'">
                                            </div>
                                            <div class="col-8">
                                                <p> Cambiar Imagen: </p>
                                                <x-form-input type="file" accept="image/*" name="imagenes_elegidas.{{ $key }}" wire:model="imagenes_elegidas.{{ $key }}" wire:loading.attr="disabled"/>
                                                <button class="btn btn-danger button-rojo-invertec mt-2" wire:click.prevent="removeImagenElegida({{ $key }})">Quitar imagen</button>
                                            </div>
                                        </div>
                                        <x-form-input label="Link" name="links_elegidos.{{ $key }}" wire:model="links_elegidos.{{ $key }}" placeholder="En caso de que se requiera abrir un enlace al clickear la imagen, indicar URL en este campo."/>
                                        <div wire:loading wire:target="imagenes_elegidas.{{ $key }}" >
                                            <br>
                                            <div class="spinner-grow spinner-grow-sm text-success"  role="status"></div>
                                            Subiendo imagen...
                                        </div>
                                    </div>
                                    <br><br><br>
                                @endforeach
                                @foreach($imagenes as $key => $imagen)
                                    <div>
                                        <div class="row">
                                            <div class="col-6">
                                                <x-form-input type="file" accept="image/*" name="imagenes.{{ $key }}" wire:model="imagenes.{{ $key }}" wire:loading.attr="disabled"/>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-danger button-rojo-invertec" wire:click.prevent="removeImagen({{ $key }})">Quitar imagen</button>
                                            </div>
                                        </div>
                                        <x-form-input label="Link" name="links.{{ $key }}" wire:model="links.{{ $key }}" placeholder="En caso de que se requiera abrir un enlace al clickear la imagen, indicar URL en este campo."/>
                                        <div wire:loading wire:target="imagenes.{{ $key }}" >
                                            <br>
                                            <div class="spinner-grow spinner-grow-sm text-success"  role="status"></div>
                                            Subiendo imagen...
                                        </div>
                                    </div>
                                    <br><br><br>
                                @endforeach

                            @endif
                            <br><br>
                        @endwire        
                    </x-form>
                    <div style="text-align:center">  
                        @if ($video)
                            <button class="btn btn-secondary" wire:click.prevent="removeVideo" >Quitar video</button>
                        @else
                            <button class="btn btn-secondary" wire:click.prevent="addImagen" >Agregar imagen</button>
                            <button class="btn btn-secondary" wire:click.prevent="addVideo" >Agregar video</button>
                        @endif
                    </div>
                </div>
                <!-- BOTONES MODAL-->
                <div class="modal-footer">
                    <button wire:loading.remove wire:target="imagenes_elegidas.*" class="btn btn-success button-verde-invertec" wire:click.prevent="editarPublicacion"> Confirmar </button>
                    <button wire:loading wire:target="imagenes_elegidas.*" class="btn btn-success button-verde-invertec" wire:click.prevent="editarPublicacion" disabled> Confirmar </button>
                    <button class="btn btn-secondary " type="button" wire:click.prevent="doClose()">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
         
    <!-- SCRIPT WYSIWYG-->
    @if ($edit)
        <script type="text/javascript">
            var Size = Quill.import('attributors/style/size');
            Size.whitelist = ['16px', '21px', '26px', '31px'];
            Quill.register(Size, true);

            var toolbarOptions = [ 
                [{ 'size': ['16px', '21px', '26px', '31px'] }],
                [{ 'color': [] }, { 'background': [] }],
                ['bold', 'italic', 'underline'], 
                [{ 'list': 'ordered'}, { 'list': 'bullet' }], 
                ['link']];
            var quill = new Quill('#texto_editar', {
                        theme: 'snow',
                        modules: {
                            toolbar: toolbarOptions
                        }
                    });
            quill.root.innerHTML = @this.get('texto_editar');
            quill.on('text-change', function() {
                @this.set('texto_editar', quill.root.innerHTML);
            });
        </script>
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
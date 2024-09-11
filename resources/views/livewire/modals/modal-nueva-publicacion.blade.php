<div>
    <!-- MODAL NUEVA PUBLICACIÓN-->
    <div class="modal fade @if($show === true) show @endif"
         id="modalNuevaPublicacion"
         style="display: @if($show === true)
                 block
         @else
                 none
         @endif;"
         tabindex="-1"
         role="dialog"
         aria-labelledby="nuevaPublicacion"
         aria-hidden="true">
         
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(21, 103, 46, 1);">
                    <h5 class="modal-title" id="detalleUsuario" style="color: white">Nueva Publicación</h5>
                </div>
                <div class="modal-body">
                    
                    <x-form wire:submit.prevent="agregarPublicacion()">
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
                            <div wire:ignore>
                                <div name="texto" wire:model="texto" label='Cuerpo del Post' id="texto"></div>
                            </div>
                            @if ($errors->any())
                                <small style="color: red;">{{$errors->first('texto')}}</small>
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
                    <button wire:loading.remove wire:target="imagenes.*" class="btn btn-success button-verde-invertec" wire:click.prevent="agregarPublicacion"> Agregar </button>
                    <button wire:loading wire:target="imagenes.*" class="btn btn-success button-verde-invertec" wire:click.prevent="agregarPublicacion" disabled> Agregar </button>
                    <button class="btn btn-secondary " type="button" wire:click.prevent="doClose()">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
         
    <!-- SCRIPT WYSIWYG-->
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
        var quillD = new Quill('#texto', {
                    theme: 'snow',
                    modules: {
                        toolbar: toolbarOptions
                    }
                });

        quillD.on('text-change', function() {
            @this.set('texto', quillD.root.innerHTML);
        });

        Livewire.on('myComponentUpdated', function() {
            quillD.root.innerHTML = @this.get('texto');
        });

        Livewire.on('modalClosed', function() {
            quillD.root.innerHTML = "null";
        });
    </script>

    <div class="modal-backdrop fade show"
         id="backdrop"
         style="display: @if($show === true)
                 block
         @else
                 none
         @endif;">
    </div>
</div>
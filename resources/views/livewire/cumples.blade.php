<div>
    <!-- COMPONENTE CUMPLEAÑOS -->
    <div wire:init="loadCumples">
        <div class="card text-dark mb-3 shadow" style="height: 90vh; overflow-y: auto; background-color: rgb(255,255,255, 0.95)">
            <div class="card-header card-cumples" style="background-color: rgb(21, 103, 46, 1);"><b style="color: white">Cumpleaños de {{$mes_nombre}}</b></div>
            <div class="card-body">
                <div id="carouselCumplesAlto" class="carousel slide" data-bs-ride="carousel" data-bs-interval="10000">
                    <div class="carousel-inner">
                        @if ($this->datos)
                            <div class="carousel-item active">
                                @if (array_key_exists(0, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[0][2])
                                                <img src="{{$this->datos[0][2]}}" class="foto-perfil" />
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[0][0]}}<br> 
                                                @if ($this->datos[0][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[0][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if (array_key_exists(1, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[1][2])
                                                <img src="{{$this->datos[1][2]}}" class="foto-perfil"/>
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[1][0]}}<br> 
                                                @if ($this->datos[1][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[1][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if (array_key_exists(2, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[2][2])
                                                <img src="{{$this->datos[2][2]}}" class="foto-perfil"/>
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[2][0]}}<br> 
                                                @if ($this->datos[2][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[2][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if (array_key_exists(3, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[3][2])
                                                <img src="{{$this->datos[3][2]}}" class="foto-perfil"/>
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[3][0]}}<br> 
                                                @if ($this->datos[3][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[3][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if (array_key_exists(4, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[4][2])
                                                <img src="{{$this->datos[4][2]}}" class="foto-perfil"/>
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[4][0]}}<br> 
                                                @if ($this->datos[4][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[4][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if (array_key_exists(5, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[5][2])
                                                <img src="{{$this->datos[5][2]}}" class="foto-perfil"/>
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[5][0]}}<br> 
                                                @if ($this->datos[5][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[5][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if (array_key_exists(6, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[6][2])
                                                <img src="{{$this->datos[6][2]}}" class="foto-perfil"/>
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[6][0]}}<br> 
                                                @if ($this->datos[6][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[6][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if (array_key_exists(7, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[7][2])
                                                <img src="{{$this->datos[7][2]}}" class="foto-perfil"/>
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[7][0]}}<br> 
                                                @if ($this->datos[7][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[7][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if (array_key_exists(8, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[8][2])
                                                <img src="{{$this->datos[8][2]}}" class="foto-perfil"/>
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[8][0]}}<br> 
                                                @if ($this->datos[8][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[8][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if (array_key_exists(9, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[9][2])
                                                <img src="{{$this->datos[9][2]}}" class="foto-perfil"/>
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[9][0]}}<br> 
                                                @if ($this->datos[9][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[9][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if (array_key_exists(10, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[10][2])
                                                <img src="{{$this->datos[10][2]}}" class="foto-perfil"/>
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[10][0]}}<br> 
                                                @if ($this->datos[10][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[10][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @for ($i = 11; $i <= sizeof($this->datos); $i+= 11)
                                <div class="carousel-item">
                                    @if (array_key_exists($i, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i][2])
                                                    <img src="{{$this->datos[$i][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i][0]}}<br> 
                                                @if ($this->datos[$i][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                    @if (array_key_exists($i+1, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i+1][2])
                                                    <img src="{{$this->datos[$i+1][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i+1][0]}}<br> 
                                                @if ($this->datos[$i+1][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i+1][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                    @if (array_key_exists($i+2, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i+2][2])
                                                    <img src="{{$this->datos[$i+2][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i+2][0]}}<br> 
                                                @if ($this->datos[$i+2][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i+2][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                    @if (array_key_exists($i+3, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i+3][2])
                                                    <img src="{{$this->datos[$i+3][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i+3][0]}}<br> 
                                                @if ($this->datos[$i+3][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i+3][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                    @if (array_key_exists($i+4, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i+4][2])
                                                    <img src="{{$this->datos[$i+4][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i+4][0]}}<br> 
                                                @if ($this->datos[$i+4][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i+4][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                    @if (array_key_exists($i+5, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i+5][2])
                                                    <img src="{{$this->datos[$i+5][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i+5][0]}}<br> 
                                                @if ($this->datos[$i+5][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i+5][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                    @if (array_key_exists($i+6, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i+6][2])
                                                    <img src="{{$this->datos[$i+6][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i+6][0]}}<br> 
                                                @if ($this->datos[$i+6][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i+6][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                    @if (array_key_exists($i+7, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i+7][2])
                                                    <img src="{{$this->datos[$i+7][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i+7][0]}}<br> 
                                                @if ($this->datos[$i+7][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i+7][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                    @if (array_key_exists($i+8, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i+8][2])
                                                    <img src="{{$this->datos[$i+8][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i+8][0]}}<br> 
                                                @if ($this->datos[$i+8][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i+8][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                    @if (array_key_exists($i+9, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i+9][2])
                                                    <img src="{{$this->datos[$i+9][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i+9][0]}}<br> 
                                                @if ($this->datos[$i+9][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i+9][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                    @if (array_key_exists($i+10, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i+10][2])
                                                    <img src="{{$this->datos[$i+10][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i+10][0]}}<br> 
                                                @if ($this->datos[$i+10][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i+10][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                </div>
                            @endfor
                        @else
                            <div class="container">
                                <br><br><br><br><br><br>
                                <div class="text-center">
                                    <div class="spinner-border text-primary mb-2" style="text-align:center;" role="status"></div>
                                    <div class="">Cargando contenido...</div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div> 

                <div id="carouselCumplesBajo" class="carousel slide" data-bs-ride="carousel" data-bs-interval="10000">
                    <div class="carousel-inner">
                        @if ($this->datos)

                            <div class="carousel-item active">
                                @if (array_key_exists(0, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[0][2])
                                                <img src="{{$this->datos[0][2]}}" class="foto-perfil"/>
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[0][0]}}<br> 
                                                @if ($this->datos[0][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[0][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if (array_key_exists(1, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[1][2])
                                                <img src="{{$this->datos[1][2]}}" class="foto-perfil"/>
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[1][0]}}<br> 
                                                @if ($this->datos[1][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[1][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if (array_key_exists(2, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[2][2])
                                                <img src="{{$this->datos[2][2]}}" class="foto-perfil"/>
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[2][0]}}<br> 
                                                @if ($this->datos[2][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[2][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if (array_key_exists(3, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[3][2])
                                                <img src="{{$this->datos[3][2]}}" class="foto-perfil"/>
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[3][0]}}<br> 
                                                @if ($this->datos[3][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[3][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if (array_key_exists(4, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[4][2])
                                                <img src="{{$this->datos[4][2]}}" class="foto-perfil"/>
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[4][0]}}<br> 
                                                @if ($this->datos[4][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[4][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if (array_key_exists(5, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[5][2])
                                                <img src="{{$this->datos[5][2]}}" class="foto-perfil"/>
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[5][0]}}<br> 
                                                @if ($this->datos[5][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[5][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if (array_key_exists(6, $this->datos))
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($this->datos[6][2])
                                                <img src="{{$this->datos[6][2]}}" class="foto-perfil"/>
                                            @else
                                                <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                {{$this->datos[6][0]}}<br> 
                                                @if ($this->datos[6][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[6][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                
                            </div>
                            @for ($i = 7; $i <= sizeof($this->datos); $i+= 7)
                                <div class="carousel-item">
                                    @if (array_key_exists($i, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i][2])
                                                    <img src="{{$this->datos[$i][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i][0]}}<br> 
                                                @if ($this->datos[$i][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                    @if (array_key_exists($i+1, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i+1][2])
                                                    <img src="{{$this->datos[$i+1][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i+1][0]}}<br> 
                                                @if ($this->datos[$i+1][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i+1][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                    @if (array_key_exists($i+2, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i+2][2])
                                                    <img src="{{$this->datos[$i+2][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i+2][0]}}<br> 
                                                @if ($this->datos[$i+2][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i+2][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                    @if (array_key_exists($i+3, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i+3][2])
                                                    <img src="{{$this->datos[$i+3][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i+3][0]}}<br> 
                                                @if ($this->datos[$i+3][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i+3][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                    @if (array_key_exists($i+4, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i+4][2])
                                                    <img src="{{$this->datos[$i+4][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i+4][0]}}<br> 
                                                @if ($this->datos[$i+4][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i+4][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                    @if (array_key_exists($i+5, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i+5][2])
                                                    <img src="{{$this->datos[$i+5][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i+5][0]}}<br> 
                                                @if ($this->datos[$i+5][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i+5][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                    @if (array_key_exists($i+6, $this->datos))
                                        <div class="row">
                                            <div class="col-3">
                                                @if ($this->datos[$i+6][2])
                                                    <img src="{{$this->datos[$i+6][2]}}" class="foto-perfil"/>
                                                @else
                                                    <img src="https://thefocusgroup.com/wp-content/uploads/2017/12/portrait_placeholder.gif" class="foto-perfil"/>
                                                @endif
                                            </div>
                                            <div class="col-9">
                                            <p>
                                                {{$this->datos[$i+6][0]}}<br> 
                                                @if ($this->datos[$i+6][1] == $this->dia)
                                                    <small class="verde-invertec"><b>
                                                        <i class="fa fa-birthday-cake" aria-hidden="true"> </i>
                                                    Hoy
                                                    </b></small>
                                                @else
                                                    <small class="text-muted">{{$this->datos[$i+6][1]}} de {{$mes_nombre}}</small>
                                                @endif
                                            </p>
                                        </div>
                                        </div>
                                    @endif
                                </div>
                            @endfor
                        @else
                            <div class="container">
                                <br><br><br><br><br><br>
                                <div class="text-center">
                                    <div class="spinner-border text-primary mb-2" style="text-align:center;" role="status"></div>
                                    <div class="">Cargando contenido...</div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
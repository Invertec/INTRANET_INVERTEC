<!-- COMPONENTE DE LINKS -->
<div>
    <div class="card text-dark shadow" style="height: 70vh; width: 375px; overflow-y: auto; background-color: rgb(255,255,255, 0.95)">
        <div class="card-header card-links" style="background-color: rgb(21, 103, 46, 1);">
            <b style="color: white">Links de interés</b>
        </div>
        <div class="card-body">
            @for ($i = 0; $i < count($links_ingresados); $i += 2)
                <div class="row">
                    <div class="col-6">
                        @if ($links_ingresados->has($i))
                            <div class="card border-secondary mb-3" style="width: 100%; height: auto;">
                                @if (!str_starts_with($links_ingresados[$i]->link, 'http://') && !str_starts_with($links_ingresados[$i]->link, 'https://'))
                                    <?php $links_ingresados[$i]->link = '//' . $links_ingresados[$i]->link; ?>
                                @endif
                                <a href="{{$links_ingresados[$i]->link}}" class="a-black" target="_blank">
                                    @if ($links_ingresados[$i]->imagen)
                                        <img src="storage/{{$links_ingresados[$i]->imagen}}" class="card-img-top card-link"/>
                                    @endif
                                    <div class="card-body">
                                        <p class="card-text">{{$links_ingresados[$i]->texto}}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="col-6">
                        @if ($links_ingresados->has($i+1))
                            <div class="card border-secondary mb-3" style="width: 100%; height: auto;">
                                @if (!str_starts_with($links_ingresados[$i+1]->link, 'http://') && !str_starts_with($links_ingresados[$i+1]->link, 'https://'))
                                    <?php $links_ingresados[$i+1]->link = '//' . $links_ingresados[$i+1]->link; ?>
                                @endif
                                <a href="{{$links_ingresados[$i+1]->link}}" class="a-black" target="_blank">
                                    @if ($links_ingresados[$i+1]->imagen)
                                        <img src="storage/{{$links_ingresados[$i+1]->imagen}}" class="card-img-top card-link"/>
                                    @endif

                                    <div class="card-body">
                                        <p class="card-text">{{$links_ingresados[$i+1]->texto}}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
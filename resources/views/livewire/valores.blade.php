<div>
<div class="card text-dark shadow mt-2" style="height: 19vh; width: 375px; overflow-y: hide; background-color: rgb(255,255,255, 0.95)">
<div class="card-header card-valores" style="background-color: rgb(21, 103, 46, 1);">
<b style="color: white">Indicadores Económicos</b>
</div>
<div class="card-body">
<div class="row row-top">
<div class="col-6">
<p><b>UF:</b> ${{ number_format(floatval($uf), 2, ',', '.') }}</p>
</div>
<div class="col-6">
<p><b>UTM:</b> ${{ number_format(floatval($utm), 2, ',', '.') }}</p>
</div>
</div>
<div class="row row-bot">
<div class="col-6">
<p><b>DOLAR:</b> ${{ number_format(floatval($dolar), 2, ',', '.') }}</p>
</div>
<div class="col-6">
<p><b>EURO:</b> ${{ number_format(floatval($euro), 2, ',', '.') }}</p>
</div>
</div>
</div>
</div>
</div>
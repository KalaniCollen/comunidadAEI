<div class="group">
    <p class="w-100 label">Imagen del servicio</p>
    <label for="imagen-servicio" class="file">
        <i class="file__icon ion-md-cloud-upload"></i>
        <input type="file" class="input" name="imagen" id="imagen-servicio" accept="image/*" onchange="previewImage(this, 'js-img-preview', 'js-file-text');">
    </label>
    <span class="file__text" id="js-file-text"></span>
</div>
{!! Form::inText('nombre', null, 'Nombre del producto') !!}
{!! Form::inTextArea('descripcion', null, 'Descripción del producto') !!}
{!! Form::inNumber('costo', null, 'Costo del producto') !!}
{!! Form::inNumber('descuento', null, 'Descuento a socios', '', ['max' => 100]) !!}
{!! Form::inText('tipo', null, 'Tipo de producto') !!}

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach

@endif


<div class="form__file">
    <input type="file" name="imagen" id="imagen-upload" class="form__file-input" accept="image/*" onchange="previewImage(this, js-img-preview)">
    <label for="imagen-upload" class="form__file-label"><i class="ion-ios-cloud-upload"></i></label>
    <span class="form__error"></span>
</div>

<div class="form__input form__input--column">
    <label for="nombre" class="form__input-label">Nombre del servicio</label>
    <input type="text" name="nombre" value="{{ $nombre }}" id="nombre" class="form__input-input">
    <span class="form__error ">¡El nombre del servicio no se puede repetir!</span>
</div>

{{-- <div class="form__input">
    <label for="nombre">Nombre del servicio</label>
    <input type="text" name="nombre" id="nombre" value="{{ $nombre }}">
</div> --}}

<div class="form__text form__text--column">
    <label for="descripcion">Descripción del servicio</label>
    <textarea name="descripcion" id="descripcion" class="form__text-input">{{ $descripcion }}</textarea>
</div>


<div class="form__input form__input--column">
    <label for="tipo" class="form__input-label">Tipo de servicio</label>
    <input type="text" name="tipo" value="{{ $tipo }}" id="tipo" class="form__input-input">
    <span class="form__error ">¡El nombre del servicio no se puede repetir!</span>
</div>

{{-- <div class="form__input">
    <label for="tipo">Tipo de Servicio</label>
    <input type="text" name="tipo" id="tipo" value="{{ $tipo }}">
</div> --}}

<div class="form__input form__input--column">
    <label for="descuento" class="form__input-label">Descuento para socios</label>
    <input type="number" min="0" max="100" name="descuento" id="descuento" value="{{ $descuento }}" class="form__input-input">
    <span class="form__error ">¡El nombre del servicio no se puede repetir!</span>
</div>

{{-- <div class="form__input">
    <label for="descuento">Descuento del Servicio</label>
    <input type="number" min="0" max="100" name="descuento" id="descuento" value="{{ $descuento }}">
</div> --}}

<div class="form__input form__input--column">
    <label for="hora_inicio">Horario de atención:</label>
    <input type="time" name="horario_inicio" id="hora_inicio" value="{{ $hora_i }}" class="form__input-input">
    <label for="hora_cierre"> a </label>
    <input type="time" name="horario_cierre" id="hora_cierre" value="{{ $hora_c }}" class="form__input-input">
</div>

<input type="submit" class="btn" value="{{ $btnTitle }}">

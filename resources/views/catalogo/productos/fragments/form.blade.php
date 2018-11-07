<label for="file-image" class="form__file">
    <input class="form-file" type="file" name="imagen" id="file-image" accept="image/*">
</label>

<div class="form__input">
    <label for="nombre-producto">Nombre del producto</label>
    <input type="text" name="nombre" id="nombre-producto" value="{{ $nombre }}">
</div>

<div class="form__input">
    <label for="costo-producto">Costo del producto</label>
    <input type="number" name="costo" id="costo-producto" min="1" value="{{ $costo }}">
</div>

<div class="form__input">
    <label for="descripcion-producto">Descripción del producto</label>
    <textarea name="descripcion" id="descripcion-producto">{{ $descripcion }}</textarea>
</div>

<div class="form__input">
    <label for="tipo-producto">Tipo de producto</label>
    <input type="text" name="tipo" id="tipo-producto" value="{{ $tipo }}">
</div>

<div class="form__input">
    <label for="descuento-socios">Descuento para asociados:</label>
    <input type="number" min="0" max="100" name="descuento" id="descuento-socios" value="{{ $descuento }}">
</div>

<input class="btn" type="submit" value="{{ $btnTitle }}">

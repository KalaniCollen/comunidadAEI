@if($dato->name=="descripcion")Esta descripcion será mostrada en la página de inicio de la asociacion @endif
<input type="{{$dato->tipo  }}" min="0" name="{{ $dato->name}}" id="{{ $dato->name }}data" value="{{ $dato->dato}}" class="form-control" style="width:auto;">
<input type="button" name="{{$dato->name  }}" id="{{ $dato->id }}"  class="btn btn-success" value="Guardar"/>
<input type="button" class="btn btn-danger" name="{{$dato->name  }}" value="Cancelar"/>

<div class="mensaje">{{ $dato->mensaje }}</div>

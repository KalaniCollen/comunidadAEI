<select id="{{ $dato->name }}data" name="{{ $dato->name}}" class="form-control" style="width:auto;">
    <option value="{{ $dato->dato}}" selected > {{ $dato->dato}}</option>
    <option  value=" @if($dato->dato=="PRIVADA")PUBLICA @else PRIVADA @endif">@if($dato->dato=="PRIVADA")PUBLICA @else PRIVADA @endif</option>
</select>
<input type="button" name="{{$dato->name  }}" id="{{ $dato->id }}"  class="btn btn-success" value="Guardar"/>
<input type="button" class="btn btn-danger" name="{{$dato->name  }}" value="Cancelar"/>
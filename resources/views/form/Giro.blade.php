
<select id="{{ $dato->name }}data" name="{{ $dato->name}}" class="form-control" style="width:auto;" >
    <option value="{{ $dato->dato}}" selected > {{ $dato->dato}}</option>
    <option  value="@if($dato->dato=="COMERCIAL")INDUSTRIAL @else @if($dato->dato=="SERVICIO")INDUSTRIAL  @else @if($dato->dato=="INDUSTRIAL")COMERCIAL @endif @endif @endif ">@if($dato->dato=="COMERCIAL")INDUSTRIAL @else @if($dato->dato=="SERVICIO")INDUSTRIAL  @else @if($dato->dato=="INDUSTRIAL")COMERCIAL @endif @endif @endif</option>
    <option  value="@if($dato->dato=="COMERCIAL")SERVICIO @else @if($dato->dato=="SERVICIO")COMERCIAL @else @if($dato->dato=="INDUSTRIAL")SERVICIO @endif @endif @endif">@if($dato->dato=="COMERCIAL")SERVICIO @else @if($dato->dato=="SERVICIO")COMERCIAL @else @if($dato->dato=="INDUSTRIAL")SERVICIO @endif @endif @endif</option>
</select>
<input type="button" name="{{$dato->name  }}" id="{{ $dato->id }}"  class="btn btn-success" value="Guardar"/>
<input type="button" class="btn btn-danger" name="{{$dato->name  }}" value="Cancelar"/>

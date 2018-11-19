{{-- VENTANA MODAL --}}
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Album</h4>
      </div>
      <div class="modal-body">

    <div id='message-error' class="alert alert-danger danger" role='alert' style="display: none">
      <strong id="error"></strong>
    </div>

        <form role="form" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="js-album-token">
          <input type="hidden" id="id">
            <div class="group">
                <label for="js-album-name" class="label">Nombre del album</label>
                <input type="text" class="input" id="js-album-name" placeholder="Ej. Mi album"/>
            </div>
            <button type="button" class="btn btn--accent"  id="js-album-create">Crear</button>
        </form>
      </div>
      <div class="modal-footer">

      {{-- {!!link_to('#', $title='Actualizar', $attributes = ['id'=>'actualizar', 'class'=>'btn btn-primary'])!!} --}}
      </div>
    </div>
  </div>
</div>

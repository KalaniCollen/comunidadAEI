<!-- Button to trigger modal -->
<button class="btn btn-success btn-lg" id="abrir" data-toggle="modal" data-target="#modalForm">
    Nuevo Album
</button>

<!-- Modal -->
<div class="modal" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Nuevo album</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form">
                    <div class="form-group">
                        <label for="inputName">nombre del album</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Album" accept="image/*"/>
                    </div>

                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">Crear</button>
            </div>
        </div>
    </div>
</div>

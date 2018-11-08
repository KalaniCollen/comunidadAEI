<button class="btn btn-success btn-lg" id="abrir" data-toggle="modal" data-target="#modalForm">
    Nuevo Video
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
                <h4 class="modal-title" id="myModalLabel">Nuevo Video</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form">
                    <div class="form-group">
                        <label for="inputName">Link de video Youtube</label>
                        <input type="text" class="form-control" id="inputName" placeholder="https://www.youtube.com/watch?v=tJrdAPZXN6I"/>
                    </div>

                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default clos" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">Agregarr</button>
            </div>
        </div>
    </div>
</div>

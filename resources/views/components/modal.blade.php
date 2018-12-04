<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <img id="croppie-img" src="{{ $imagen }}" alt="Logotipo de la empresa">
                </div>
                <div class="group">
                    <p class="w-100 label">{{ $label }}</p>
                    <label for="js-input-file" class="file">
                        <i class="file__icon ion-md-cloud-upload"></i>
                        <input type="file" class="input" name="imagen" accept="image/*" size="2000000" onchange="previewImageOnlyText(this, 'js-file-text');" id="js-input-file">
                    </label>
                    <span class="file__text" id="js-file-text"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" id="js-btn-save">Guardar imagen</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        let crImagen = document.getElementById('croppie-img');
        let croppie = new Croppie(crImagen, croppieConfig);
        let modal = $('#{{ $id }}');
        $('#js-input-file').on('change', function() { bindCroppie(this, croppie); });

        $('#js-btn-cancel').on('click', function() { modal.modal('hide'); });

        $('#js-btn-save').on('click',function() {
            croppie.result(croppieResults)
                .then(response => {
                    axios.put('{{ route($url, $perfil) }}' ,{
                    imagen: response
                }).then(data => {
                    beforeCroppie(crImagen, modal, data);
                    iziToast.success({
                        title: data.data,
                        timeout: 800,
                        displayMode: 'once',
                        onClosing: function() {
                            location.reload();
                        }
                    });
                });
            });
        });
        modal.on('shown.bs.modal', function(){
            croppie.bind({
                url: crImagen.src
            });
        });
    </script>
@endpush

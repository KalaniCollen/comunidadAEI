

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
                <h4 class="modal-title" id="myModalLabel">Redes Sociales</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <div class="row">
                  <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
                  <div>
                      &nbsp;<label id="Pag_Web_Empresadato" data="Empresa"><p id="Pag_Web_Empresacampo" data= "Pag Web">Pag Web:</p> </label>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <div id="pag_web_empresa" class="eff" data="boton12">
                    <label id="Pag_Web_Empresadata" data="{{ $perfilE->pag_web_empresa }}" class="Empresa">{{ $perfilE->pag_web_empresa }}</label>
                    <input type="button" name="pag_web_empresa" id="boton12" class="boton01" value="Editar">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
                  <div>
                    &nbsp;<label id="Red_Social_Twitter_Empresadato" data="Empresa"><p id="Red_Social_Twitter_Empresacampo" data= "Twitter">Twitter:</p> </label>
                  </div>
                </div>
                    <div class="col-md-4 col-sm-6">
                    <div id="red_social_twitter_empresa" class="eff" data="boton13">
                      <label id="Red_Social_Twitter_Empresadata" data="{{ $perfilE->red_social_twitter_empresa }}" class="Empresa">{{ $perfilE->red_social_twitter_empresa }}</label>
                    <input type="button" name="red_social_twitter_empresa" id="boton13" class="boton01" value="Editar">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6" style="text-align:left;left:100px;">
                  <div>
                      &nbsp;<label id="Red_Social_Facebook_Empresadato" data="Empresa"><p id="Red_Social_Facebook_Empresacampo" data= "Facebook">Facebook:</p> </label>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <div id="red_social_facebook_empresa" class="eff" data="boton14">
                    <label id="Red_Social_Facebook_Empresadata" data="{{ $perfilE->red_social_facebook_empresa }}" class="Empresa">{{ $perfilE->red_social_facebook_empresa }}</label> &nbsp;
                    <input type="button" name="red_social_facebook_empresa" id="boton14" class="boton01" value="Editar">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
                  <div>
                    &nbsp;<label id="Red_Social_Instagramdato" data="Empresa" ><p id="Red_Social_Instagramcampo" data="Instagram">Instagram:</p> </label>
                  </div>
                </div>
                  <div class="col-md-4 col-sm-6">
                    <div id="red_social_instagram" class="eff" data="boton16">
                      <label id="Red_Social_Instagramdata" data="{{ $perfilE->red_social_instagram }}" class="Empresa">{{ $perfilE->red_social_instagram }}</label> &nbsp;
                    <input type="button" name="red_social_instagram" id="boton16" class="boton01" value="Editar">
                    </div>
                  </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">Crear</button>
            </div>
        </div>
    </div>
</div>

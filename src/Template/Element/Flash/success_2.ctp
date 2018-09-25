

<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="modal modal-success fade in" id="modal-success" style="display: block; padding-right: 17px;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
                <p id="url" style="display: none;"><?= $message ?></p>
                <p>Proceso Exitoso!</p>
              </div>
              <div class="modal-footer">
                <button id="cerrar" type="button" class="btn btn-outline pull-right" data-dismiss="modal" onclick="cerrarModal()">Cerrar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>

<script>
  $('#myform').on('submit', function(ev) {
    $('#modal-success').fadeIn(); 
   
});


 function cerrarModal(){
      $('#modal-success').fadeOut();
      
       window.location.href = $("#url").text();
    }
</script>
<?php
  require_once ("include_dao.php");
?>
 <!-- AREA DE MODEL LOGIN -->
  <div class="modal fade" id="editGarcom" tabindex="-1" role="dialog" aria-labelledby="editGarcomLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editGarcomLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="contact-form-area contact-page-form contact-form text-right" method="post">
          <input type="hidden" class="form-control" id="cod" name="cod">
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="endereco" name="endereco">
                </div>
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="telefone" name="telefone">
                </div>
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="escolaridade" name="escolaridade">
                </div>
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="dataNasc" name="dataNasc">
                </div>
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="cpf" name="cpf">
                </div>
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="login" name="login">
                </div>
                <div class="form-group col-md-12">
                  <input type="password" class="form-control" id="senha" name="senha">
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-success" value="Editar" name="editar">
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
    $('#editGarcom').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Editar')
  modal.find('.modal-body input').val(recipient)
})
</script>
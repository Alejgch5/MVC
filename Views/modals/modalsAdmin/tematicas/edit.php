<!-- Modal -->
<div class="modal fade" id="editThematicModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Temática</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEditThematic">
            <div class="form-group">
                <label for="nombre_thematic_edit">Nombre Temática</label>
                <input type="text" class="form-control" name="nombre" id="nombre_thematic_edit" value="">
                <input type="hidden" value="" name="codigo" id="codigo_thematic_edit">
            </div>
            <a type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
            <button class="btn btn-primary">Guardar</button>
        </form>
      
      </div>
    </div>
  </div>
</div>
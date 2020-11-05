<script>
  $(document).ready(function(){

    $('#id_grupo').val($('#idg').val());
    alert($('#id_grupo').val());
    $('#exampleModalLong').modal("show");
  });
</script>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cear Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('guardaPost') }}" action="POST" enctype='multipart/form-data'>
          @csrf()

              @if($errors->first('titulo')) 
              <div class="alert alert-danger"><i> {{ $errors->first('titulo') }} </i></div>
              @endif
          <div class="form-group label-floating">
            <label class="control-label">Titulo del Post</label>
            <input type="text" name="titulo" class="form-control">
          </div>

          <div class="form-group label-floating">
            <label class="control-label">Descripción:</label>
            <textarea name="cuerpo_post" cols="30" rows="10" class="form-control"></textarea>
          </div>
          <input type="hidden" name="id_grupo" id="id_grupo">
          <input type="submit" value="Enviar">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

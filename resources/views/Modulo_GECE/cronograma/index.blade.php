@extends('layouts.app')
@extends('adminlte::page')
@section('content')

<div class="container">
    <div id="agenda">
        
    </div>
</div>

<!-- Modal trigger button -->
<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#evento">
  Launch
</button>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="evento" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">

                    {!! csrf_field() !!}

                    <div class="mb-3">
                      <label for="id" class="form-label">ID</label>
                      <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                      <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                    </div>

                    <div class="mb-3">
                      <label for="title" class="form-label">Título</label>
                      <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el título del evento">
                      <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                    </div>

                    <div class="mb-3">
                      <label for="descripcion" class="form-label">Descripción del evento</label>
                      <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                      <label for="start" class="form-label">start</label>
                      <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                      <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                    </div>

                    <div class="mb-3">
                      <label for="end" class="form-label">end</label>
                      <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                      <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                    </div>
                </form>
            </div>
            <div class="modal-footer">


                <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                <button type="button" class="btn btn-warning" id="btnModficar">Modificar</button>
                <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<!-- <script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

</script> -->

@endsection
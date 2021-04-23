<!-- Button trigger modal -->


<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
          
          <div class="form-group">
            <label for="">Nombres</label>
            <input 
            wire:model = "nombres"
            type="text" 
            name="nombres"
            class="form-control" 
            placeholder="Escriba sus nombres"
            />
            @error('nombres')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

           <div class="form-group">
            <label for="">Apellidos</label>
            <input 
            wire:model = "apellidos"
            type="text" 
            name="apellidos" 
            class="form-control" 
            placeholder="Escriba sus apellidos"
            />
            @error('apellidos')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

           <div class="form-group">
            <label for="">Direccion</label>
            <input 
            wire:model = "direccion"
            type="text" 
            name="direccion" 
            class="form-control" 
            placeholder="Escriba su direccion"
            />
            @error('direccion')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

           <div class="form-group">
            <label for="">Telefono</label>
            <input 
            wire:model = "telefono"
            type="text" 
            name="telefono" 
            class="form-control" 
            placeholder="Escriba su telefono"
            />
            @error('telefono')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

           <div class="form-group">
            <label for="">email</label>
            <input 
            wire:model = "email"
            type="email" 
            name="email" 
            class="form-control" 
            placeholder="Escriba su email"
            />
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button 
        wire:click.prevent="store()"
        type="button" 
        class="btn btn-primary"
        >
         Agregar Cliente
      </button>
      </div>
    </div>
  </div>
</div>

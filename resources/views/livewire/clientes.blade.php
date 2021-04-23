<div>
	<style type="text/css">
		nav svg{
			height: 20px;
		}
	</style>
@include('livewire.create')
@include('livewire.edit')
	<section>
		<div class="container">
<!-- agregar datos excel -->
			<div class="row">
				<div class="col-lg-12">

					 <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if(count($errors) > 0)
					    <div class="alert alert-danger">
					     Error al subir la informacion<br><br>
					     <ul>
					      @foreach($errors->all() as $error)
					      <li>{{ $error }}</li>
					      @endforeach
					     </ul> 
					    </div>
					@endif


      				<form 
                  	action="{{ route('cliente.store') }}"
                  	method="post"
                  	enctype="multipart/form-data" 
                  	>
                  	@csrf
	                  	<div class="form-group">
	                  		<input type="file" name="select_file">
	                  		<button type="submit" class="btn btn-primary">
	                  			Import
	                  		</button>
	                  	</div>	
                    </form>

                    <a href="{{ route('cliente.export')}}" class="btn btn-warning">Exportar</a>
			<!-- terminar de agregar datos excel -->					
					</div>
			</div>
		</div>		
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header bg-light text-dark rounded">
							<h3>Lista de Clientes</h3>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmodal">
							  Agregar Cliente
							</button>

						</div>

						<div class="card-body bg-light text-dark rounded">
							<table class="table table-striped table-hover table-responsive">
								<thead class="thead-ligth">
									<tr>
										<th>Nombres </th>
	                                    <th>Apellidos</th>
	                                    <th>Direccion</th>
	                                    <th>Telefono</th>
	                                    <th>Email </th>
	                                    <th>Accion</th>
									</tr>
								</thead>
								<tbody>
									 @foreach($clientes as $row) 
	                            	<tr>
	                                	<td>{{ $row->nombres }}</td>
	                                    <td>{{ $row->apellidos }}</td>
	        							<td>{{ $row->direccion }}</td>
	        							<td>{{ $row->telefono }}</td>
	        							<td>{{ $row->email }}</td>
	        							<td>
	        								<button 
	        								wire:click.prevent = "edit({{ $row->id }})"
	        								type="button"
	        								class="btn btn-warning"
	        								data-toggle="modal"
	        								data-target="#updatemodal" 	
	        								>
	        									Editar
	        								</button>

	        								<button 
	        								wire:click.prevent = "destroy({{ $row->id }})"
	        								type="button"
	        								class="btn btn-danger"

	        									
	        								>
	        									Eliminar
	        								</button>
	        							</td>	
	       							</tr>
	       							@endforeach
								</tbody>
							</table>
							{{ $clientes->links() }}
						</div>
					</div>
				</div>
					
			</div>
		</div>
	</section>	
</div>

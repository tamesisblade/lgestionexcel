<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;
use Livewire\WithPagination;
class Clientes extends Component
{
      public  $ids;
	 		public  $nombres = '';
			public	$apellidos = '';
			public	$direccion = '';
			public	$telefono = '';
			public	$email = ''; 

	   public function resetInputs()
     {
        $this->nombres = '';
  			$this->apellidos = '';
  			$this->direccion = '';
  			$this->telefono = '';
  			$this->email = ''; 
      }	

       public function store()
       {

        $datos = 
          [
          "nombres" =>  'required',
    			"apellidos" => 'required',
    			"direccion" => 'required',
    			"telefono" =>  'required',
    			"email" =>     'required |email'
         	];
         	$validateData = $this->validate($datos);
         	Cliente::create($validateData);
         	session()->flash('status','Cliente creado con exito');
         	$this->resetInputs();
         	//ocultar modal
         	$this->emit('addcliente');
       }

       public function edit($id)
       {
        $cliente = Cliente::findOrfail($id);
        $this->ids    = $cliente->id;
        $this->nombres = $cliente->nombres;
         $this->apellidos = $cliente->apellidos;
          $this->direccion = $cliente->direccion;
           $this->telefono = $cliente->telefono;
            $this->email = $cliente->email;

       }

       public function update()
       {
        
          $datos = 
          [
            "nombres" =>   'required',
            "apellidos" => 'required',
            "direccion" => 'required',
            "telefono" =>  'required',
            "email" =>     'required |email'
          ];
         $this->validate($datos);
        $cliente = Cliente::findOrfail($this->ids);

           $cliente->nombres = $this->nombres;
           $cliente->apellidos = $this->apellidos;
           $cliente->direccion = $this->direccion;
           $cliente->telefono = $this->telefono;
           $cliente->email = $this->email;
           $cliente->save();

           session()->flash('status','Cliente actualizado con exito');
            $this->resetInputs();
          //ocultar modal
           $this->emit('updatecliente');
       }

       public function destroy($id){
        Cliente::findorFail($id)->delete();
       
        return back()->with(['status' => 'Cliente eliminado con exito']);
       }

    use WithPagination;
    public function render()
    {
    	   
    	$clientes =  Cliente::orderBy('id','desc')->paginate(3);
        return view('livewire.clientes', ['clientes' => $clientes]);


    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Imports\ClientesImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\ClientesExport;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cliente::orderBy('id','desc')->get();
        return view('cliente.index',compact('data'));
    }

   
    public function store(Request $request)
    {
           $datos =
            [
             'select_file'  => 'required|mimes:xls,xlsx'
             ];
            $this->validate($request, $datos);

          $path = $request->file('select_file'); 
          Excel::import(new ClientesImport,$path);
          return back()->withStatus('Se agrego los datos correctamente');
    }

   
    public function destroy(Cliente $cliente)
    {
        //
    }
    public function export(){

      return Excel::download(new ClientesExport, 'clientes.csv');
    }
}

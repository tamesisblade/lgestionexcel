<?php

namespace App\Imports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cliente([
           'nombres'     => $row[0],
           'apellidos'    => $row[1], 
            'direccion'     => $row[2],
           'telefono'    => $row[3], 
           'email'    => $row[4], 
        ]);
    }
}

<?php

namespace App\Imports;

use App\Models\usuario;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UsersImport implements ToCollection,  WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $Errors = array();
        $booleanErrors = false;
        $booleanErrorsMaster = false;
        $position = 0;
        foreach ($rows as $row) {
            $position += 1;
            $booleanErrors = false;

            $Error = "Error en la fila " . $position . " de la tabla, en las Casillas :";

            if (!$row->has(['nombre', 'apellido','rut','correo'])) {
                $Titulos_sin_identificar = 'No comple con los siguientes titulos predefinidos que tienen que tener las tablas: ';
                if (!$row->has(['nombre'])) $Titulos_sin_identificar = $Titulos_sin_identificar . ' nombre';
                if (!$row->has(['apellido'])) $Titulos_sin_identificar = $Titulos_sin_identificar . ' apellido';
                if (!$row->has(['rut'])) $Titulos_sin_identificar = $Titulos_sin_identificar . ' rut';
                if (!$row->has(['correo'])) $Titulos_sin_identificar = $Titulos_sin_identificar . ' correo';
                array_push($Errors, $Titulos_sin_identificar);
                array_unshift($Errors,count((array)$Errors));
            return back()->withErrors($Errors);
            } 

                if ($row['nombre'] == null || !is_string($row['nombre'])){
                    $Error = $Error .' nombre: Sin nombre o tipo numerico.';
                    $booleanErrors = true;
                }
                if ($row['apellido'] == null || !is_string($row['apellido'])){
                    $Error = $Error .' apellido: Sin apellido o tipo numerico.';
                    $booleanErrors = true;
                }
                if ($row['correo'] == null || !is_string($row['correo'])){
                    $Error = $Error .' correo: Sin correo o tipo numerico.';
                    $booleanErrors = true;
                }

                if (str_contains($row['rut'],'.') || str_contains($row['rut'],'-')) {
                    $rut = str_replace(".", "", $row['rut']);
                    // sepparamos la parte numerica del digito verificador 
                    $rutSeparado = explode("-", $rut);
                    if (sizeof($rutSeparado) != 2) {
                        $Error = $Error .' Rut: El rut no esta bien formado.';
                        $booleanErrors = true;
                    } else {
                        // Not A Number
                        if (!is_numeric($rutSeparado[0]) || !is_numeric($rutSeparado[1])) {
                                $Error = $Error .' Rut: El rut no esta bien formado.';
                                $booleanErrors = true;
                        }
                    }
                    $numero = intval($rutSeparado[0]);
                    $digitoCalculado = $this->generarDV($numero);
                    if ($digitoCalculado != $rutSeparado[1]) {
                            $Error = $Error .' Rut: El rut ingresado no es valido.';
                            $booleanErrors = true;
                    }
                    // añade los puntos al rut
                    $rut = number_format($numero, 0, ",", ".") . '-' . $digitoCalculado;
                }else{
                    $Error = $Error .' Rut: Falta algun "." o "-".';
                    $booleanErrors = true;
                }
                if($booleanErrors){
                    $Error = $Error . '.';
                    array_push($Errors, $Error);
                    $booleanErrorsMaster = true;
                }
        }  
        array_unshift($Errors,count((array)$Errors));

        if($booleanErrorsMaster) return back()->withErrors($Errors);

        foreach ($rows as $row) {
         $nombre = $row["nombre"];
         $apellido = $row["apellido"];
         $correo = $row["correo"];

         $rut = str_replace(".", "", $row["rut"]);
         $rutSeparado = explode("-", $rut);
         $numero = intval($rutSeparado[0]);
         $digitoCalculado = $this->generarDV($numero);
         $rut = number_format($numero, 0, ",", ".") . '-' . $digitoCalculado;

         $pass = bcrypt($rut);

        if(!usuario::where('rut', $rut)->exists()){

            $data = [
                'Nombre' => $nombre,
                'Apellido' => $apellido,
                'Rut' => $rut,
                'Email' => $correo,
                'ID_Rol' => 2,
                'Contraseña' => $pass,
            ];
            Usuario::create($data);
            }
        } 
        return;

    }

        public function generarDV($numero)
    {
        $numero = abs($numero);
        $i = 0;
        $suma = 0;
        while ($numero > 0) {
            $digito = $numero % 10;
            $factor = $i % 6 + 2;
            $suma += $digito * $factor;
            $numero = intval($numero / 10);
            $i++;
        }
        $numDV = 11 - ($suma % 11);
        switch ($numDV) {
            case 11:
                return '0';
            case 10:
                return 'K';
            default:
                return strval($numDV);
        }
    }
}

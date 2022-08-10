<?php

namespace App\Http\Controllers;

use App\Imports\ImportDataSet;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportDataSetController extends Controller
{
    public function show()
    {
        return view('ImportDataSet.Import');
    }

    public function store(Request $request)
    {
        /*$request->validate([
            'excel_file' =>'required|mimes:xlsx'
        ]);*/

        if ($request->hasFile('file')){
            $updateFile = $request->file('file');
            
            $path = $updateFile->getRealPath();
            $fileExtension = $updateFile->getClientOriginalExtension();
            
            $formats = ['xls', 'xlsx', 'ods', 'csv'];
            if (! in_array($fileExtension, $formats)) {
                return back()->withErrors('Solo se soportan archivos .xlsx, .xls.');
            } 
        }
            
        Excel::import(new ImportDataSet, $request->file('file'));
        return back()->withStatus('La importacion del archivo resulto un exito.');


    }
}

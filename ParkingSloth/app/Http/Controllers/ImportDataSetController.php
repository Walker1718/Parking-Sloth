<?php

namespace App\Http\Controllers;

use App\Imports\ImportDataSet;
use App\Imports\UsersImport;
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
                    $Errors = array();
                    $Error = 'Solo se soportan archivos .xlsx, .xls.';
                    array_push($Errors, $Error);        
                    array_unshift($Errors,count((array)$Errors));
                    return back()->withErrors($Errors);
            } 
        
            
        Excel::import(new ImportDataSet, $request->file('file'));
        return back()->withStatus('La importacion del archivo resulto un exito.');
        }


    }

    public function userstore(Request $request)
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
                $Errors = array();
                $Error = 'Solo se soportan archivos .xlsx, .xls.';
                array_push($Errors, $Error);        
                array_unshift($Errors,count((array)$Errors));
                return back()->withErrors($Errors);
            } 
        }
            
        Excel::import(new UsersImport, $request->file('file'));
        return back()->withStatus('La importacion del archivo resulto un exito.');


    }
}

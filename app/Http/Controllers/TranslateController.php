<?php

namespace App\Http\Controllers;

use App\Services\SpreadsheetTranslate;
use Illuminate\Http\Request;

class TranslateController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $fileInput = $request->file('file');
        $output = SpreadsheetTranslate::translate($fileInput);
        return response()->download($output)->deleteFileAfterSend(true);
    }
}

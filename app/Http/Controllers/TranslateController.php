<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shishima\TranslateSpreadsheet\Facades\TranslateSpreadsheet;

class TranslateController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $fileInput = $request->file('file');
        $output = TranslateSpreadsheet::translate($fileInput);
        return response()->download($output)->deleteFileAfterSend(true);
    }
}

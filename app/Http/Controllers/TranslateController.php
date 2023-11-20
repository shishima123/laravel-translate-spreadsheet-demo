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
        $output = TranslateSpreadsheet::setTransSource($request->source)
            ->setTransTarget($request->target)
            ->translate($request->file('file'));
        return response()->download($output)->deleteFileAfterSend(true);
    }
}

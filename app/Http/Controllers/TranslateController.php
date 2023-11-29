<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shishima\TranslateSpreadsheet\Facades\TranslateSpreadsheet;
set_time_limit(0);
class TranslateController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $output = TranslateSpreadsheet::setTransSource($request->source)
            ->setTransTarget($request->target)
            ->translate($request->file('file'));
        return response()->download($output)->deleteFileAfterSend(true);
    }
}

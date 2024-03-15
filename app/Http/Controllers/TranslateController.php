<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shishima\TranslateSpreadsheet\Facades\TranslateSpreadsheet;
use Shishima\TranslateSpreadsheet\Enumerations\TranslateEngine;

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
            ->highlightSheet((bool) $request->isHighlightSheet)
            ->translateSheetName((bool) $request->isTranslateSheetName)
            ->setTranslateEngine(TranslateEngine::from($request->translateEngine))
            ->translate($request->file('file'));

        return response()->download($output)->deleteFileAfterSend(true);
    }
}

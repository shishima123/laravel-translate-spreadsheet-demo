<?php

use Illuminate\Support\Facades\Route;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Stichoza\GoogleTranslate\GoogleTranslate;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $file = public_path('demo.xlsx');

    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);

    $worksheet = $spreadsheet->getActiveSheet();
    $highestRow = $worksheet->getHighestRow(); // e.g. 10
    $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn); // e.g. 5

    for ($row = 1; $row <= $highestRow; ++$row) {
        for ($col = 1; $col <= $highestColumnIndex; ++$col) {
            $cellCoordinate = Coordinate::stringFromColumnIndex($col) . $row;
            $value = $worksheet->getCell($cellCoordinate)->getValue();
            if ($value) {
                $textTranslated = GoogleTranslate::trans($value, 'vi', null);
                $spreadsheet->getActiveSheet()->setCellValue($cellCoordinate, $textTranslated);
            }
        }
    }
    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $writer->save("translated.xlsx");
});

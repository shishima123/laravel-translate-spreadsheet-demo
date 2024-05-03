<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Spreadsheet file translate</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    body {
        background-color: rgb(241 245 249)
    }

    .content-height {
        height: auto;
    }

    @media only screen and (max-width: 767px) {
        .content-height {
            height: 100%;
        }
    }
</style>
<body>
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="p-5 bg-white rounded flex-grow-1 content-height flex-md-grow-0 md-shadow">
        <h2 class="text-center fw-bold mb-5 text-primary text-uppercase">Spreadsheet translate</h2>
        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="source" class="form-label fw-bold">Source</label>
                <input type="text" id="source" name="source" class="form-control" placeholder="E.g: vi, en, ja">
                <div class="form-text">※Leave blank if wanna auto detect language</div>
            </div>
            <label for="source" class="form-label d-block mb-1 fw-bold">Target</label>
            <div class="mb-3 form-check form-check-inline">
                <input id="target1" type="checkbox" name="target[]" value="vi" checked class="form-check-input">
                <label class="form-check-label" for="target1">VI</label>
            </div>
            <div class="mb-3 form-check form-check-inline">
                <input id="target2" type="checkbox" name="target[]" value="en" checked class="form-check-input">
                <label class="form-check-label" for="target2">EN</label>
            </div>

            <label for="source" class="form-label d-block mb-1 fw-bold">Engine</label>
            <select class="form-select mb-3" name="translateEngine" aria-label="Default select example">
                <option value="google" selected>Google Translate</option>
                <option value="gemini">Gemini AI</option>
            </select>

            <label for="source" class="form-label d-block mb-1 fw-bold">Options</label>
            <div class="form-check form-switch">
                <input class="form-check-input" id="isHighlightSheet" type="checkbox" name="isHighlightSheet" value="1" checked>
                <label class="form-check-label" for="isHighlightSheet">Highlight Sheet</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" id="isTranslateSheetName" type="checkbox" name="isTranslateSheetName" value="1">
                <label class="form-check-label" for="isTranslateSheetName">Translate Sheet Name</label>
            </div>

            <div class="mb-5 mt-3">
                <input class="form-control" type="file" name="file" accept=".xls,.xlsx">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-2">Submit</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

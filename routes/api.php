<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use SaltLike\Controllers\ApiNestedResourcesController;

use SaltLike\Controllers\ReactionsResourcesController;

$version = config('app.API_VERSION', 'v1');

Route::middleware(['api'])
    ->prefix("api/{$version}")
    ->group(function () {

    // API: REACTIONS RESOURCES
    Route::get("reactions", [ReactionsResourcesController::class, 'index']); // get entire collection
    Route::post("reactions", [ReactionsResourcesController::class, 'store']); // create new collection

    Route::get("reactions/trash", [ReactionsResourcesController::class, 'trash']); // trash of collection

    Route::post("reactions/import", [ReactionsResourcesController::class, 'import']); // import collection from external
    Route::post("reactions/export", [ReactionsResourcesController::class, 'export']); // export entire collection
    Route::get("reactions/report", [ReactionsResourcesController::class, 'report']); // report collection

    Route::get("reactions/{id}/trashed", [ReactionsResourcesController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+'); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("reactions/{id}/restore", [ReactionsResourcesController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+'); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("reactions/{id}/delete", [ReactionsResourcesController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+'); // hard delete collection by ID

    Route::get("reactions/{id}", [ReactionsResourcesController::class, 'show'])->where('id', '[a-zA-Z0-9-]+'); // get collection by ID
    Route::put("reactions/{id}", [ReactionsResourcesController::class, 'update'])->where('id', '[a-zA-Z0-9-]+'); // update collection by ID
    Route::patch("reactions/{id}", [ReactionsResourcesController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+'); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("reactions/{id}", [ReactionsResourcesController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+'); // soft delete a collection by ID

});

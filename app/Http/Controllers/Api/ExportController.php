<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\JsonResponseFormat;
use Illuminate\Http\Request;
use App\Services\ExportService;


class ExportController extends Controller
{
    use JsonResponseFormat;

    protected ExportService $exportService;

    public function __construct(ExportService $exportService)
    {
        $this->exportService = $exportService;
    }

    public function getSites(Request $request)
    {

        return $this->exportService->getSites($request);
    }

    public function getSearchSite($search, $min = null, $max = null, Request $request)
    {

        return $this->exportService->getSearchSite($search, $min = null, $max = null, $request);
    }

    public function getRentPlaces(Request $request)
    {

        return $this->exportService->getRentPlaces($request->user()->id);
    }

    public function getRentPlaceBySite(Request $request)
    {

        return $this->exportService->getRentPlaceBySite($request->user()->id);
    }
}
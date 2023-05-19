<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\JsonResponseFormat;
use App\Http\Requests\SitesRequest;
use App\Http\Requests\HideSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Http\Requests\AdvertisePositionRequest;
use App\Http\Requests\RentPlaceRequest;
use Illuminate\Http\Request;
use App\Services\ImportService;

class ImportController extends Controller
{
    use JsonResponseFormat;

	protected ImportService $importService;

    public function __construct(ImportService $importService)
    {
        $this->importService = $importService;
    }

    public function setSites(Request $request, SitesRequest $requestValid)
    {

        if ($errors = $this->importService->setSites($requestValid->validated(), $request->user()->id)) {
            return $this->error('Some data wrong', 200, $errors);
        }

        return $this->success([], 'Data added successfully');

    }

    public function setHideSite($id, HideSiteRequest $requestValid)
    {

        if ($errors = $this->importService->setHideSite($id, $requestValid->validated())) {
            return $this->error('Some data wrong', 200, $errors);
        }

        return $this->success([], 'Data updated successfully');

    }

    public function setUpdateSite($id, UpdateSiteRequest $requestValid)
    {
        if ($errors = $this->importService->setUpdateSite($id, $requestValid->validated())) {
            return $this->error('Some data wrong', 200, $errors);
        }

        return $this->success([], 'Data updated successfully');

    }


    public function setAdvertisePosition($id, AdvertisePositionRequest $requestValid)
    {

        if ($errors = $this->importService->setAdvertisePosition($id, $requestValid->validated())) {
            return $this->error('Some data wrong', 200, $errors);
        }

        return $this->success([], 'Data added successfully');

    }

    public function setRentPlace($id, Request $request, RentPlaceRequest $requestValid)
    {
        
        if ($errors = $this->importService->setRentPlace($id, $request->user()->id, $requestValid->validated())) {
            return $this->error('Some data wrong', 200, $errors);
        }

        return $this->success([], 'Data added successfully');

    }
}

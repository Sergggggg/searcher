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

    	$validatedData = $requestValid->validated();

        if ($errors = $this->importService->setSites($validatedData, $request->user()->id)) {
            return $this->error('Some data wrong', 200, $errors);
        }

        return $this->success([], 'Data added successfully');

    }

    public function setHideSite($id, HideSiteRequest $requestValid)
    {

    	$validatedHideSite = $requestValid->validated();

        if ($errors = $this->importService->setHideSite($id, $validatedHideSite)) {
            return $this->error('Some data wrong', 200, $errors);
        }

        return $this->success([], 'Data updated successfully');

    }

    public function setUpdateSite($id, UpdateSiteRequest $requestValid)
    {

    	$validatedUpdateSite = $requestValid->validated();

        if ($errors = $this->importService->setUpdateSite($id, $validatedUpdateSite)) {
            return $this->error('Some data wrong', 200, $errors);
        }

        return $this->success([], 'Data updated successfully');

    }


    public function setAdvertisePosition($id, AdvertisePositionRequest $requestValid)
    {

    	$validatedAdvertisePosition = $requestValid->validated();

        if ($errors = $this->importService->setAdvertisePosition($id, $validatedAdvertisePosition)) {
            return $this->error('Some data wrong', 200, $errors);
        }

        return $this->success([], 'Data added successfully');

    }

    public function setRentPlace($id, Request $request, RentPlaceRequest $requestValid)
    {

    	$validatedRentPlace = $requestValid->validated();

        if ($errors = $this->importService->setRentPlace($id, $request->user()->id, $validatedRentPlace)) {
            return $this->error('Some data wrong', 200, $errors);
        }

        return $this->success([], 'Data added successfully');

    }
}
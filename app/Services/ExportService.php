<?php

namespace App\Services;

use App\Models\Site;
use App\Models\Rent;
use App\Http\Resources\SiteResource;
use App\Http\Resources\SearchSiteResource;
use App\Http\Resources\getRentPlacesResource;
use App\Http\Resources\getRentPlaceBySiteResource;


class ExportService
{

    public function getSites($request)
    {

        $site = Site::where('user_id', $request->user()->id)->get();

        return new SiteResource($site);
    }
    public function getSearchSite($search, $min = null, $max = null, $request)
    {

        $searchSite = Site::where(function ($q) 
                            use ($search, $min, $max)
                            {
                            $q->where('link', 'like', "%$search%")
                              ->orWhereBetween('attendance', [$min, $max]);
                            })->with('advertisements')
                              ->get();


        return new SearchSiteResource($searchSite);

    }
    public function getRentPlaces($id)
    {
     
        $rent = Rent::where('user_id', $id)->get();

        return new getRentPlacesResource($rent);

    }
    public function getRentPlaceBySite($id)
    {
     
        $rentPlace = Site::where('user_id', $id)
                        ->with('rents')
                        ->get();

        return new getRentPlaceBySiteResource($rentPlace);

    }
}
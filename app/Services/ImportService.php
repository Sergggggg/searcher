<?php

namespace App\Services;

use App\Models\Site;
use App\Models\Advertisement;
use App\Models\Rent;


class ImportService
{

	public function setSites($request, $user_id){

		$dataSite = [

		    'link' => $request['link'],
		    'language' => $request['language'],
		    'attendance' => $request['attendance'],
		    'user_id' => $user_id

		];

		Site::insert($dataSite);

        return $errors ?? [];
	}


	public function setHideSite($id, $request){

		$dataSite['hide_site'] = $request['hide_site'];

		Site::whereId($id)->update($dataSite);

        return $errors ?? [];
	}

	public function setUpdateSite($id, $request){

        foreach ($request as $key => $site) {
        	
        	$siteUpdated[$key] = $site;
        }

		Site::whereId($id)->update($siteUpdated);

        return $errors ?? [];
	}

	public function setAdvertisePosition($id, $request){

        foreach ($request as $key => $advertise) {
        	
        	$dataAdvertise[$key] = $advertise;
        }

	 	$advertisement = new Advertisement($dataAdvertise);

    		Site::whereId($id)
                        ->firstOrFail()
                        ->advertisements()
                        ->save($advertisement);

        return $errors ?? [];
	}

	public function setRentPlace($id, $user_id, $request){


        foreach ($request as $key => $rentPlace) {
        	
        	$rentData[$key] = $rentPlace;
        }

        $rentData['user_id'] = $user_id;

	 	$rentDataPlace = new Rent($rentData);

        		Site::whereId($id)
                        ->firstOrFail()
                        ->rents()
                        ->save($rentDataPlace);

        return $errors ?? [];

	}
}
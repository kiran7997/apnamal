<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Core\Zones;
use App\Models\Core\Pincodes;
use App\Models\Core\Countries;
use App\Tax_class;
use App\Tax_rate;
use App\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;

class ZonesController extends Controller
{
    //
    public function __construct( Zones $zones, Countries $countries, Pincodes $pincodes){
        $this->Countries = $countries;
        $this->Zones = $zones;
        $this->Pincodes = $pincodes;
    }

    public function index(Request $request){
      $title = array('pageTitle' => Lang::get("labels.ListingZones"));
      $zones = $this->Zones->paginator();
      return view("admin.zones.index",$title)->with('zones', $zones);
    }

    public function add(Request $request){
        $title = array('pageTitle' => Lang::get("labels.AddZone"));
        $result = array();
        $message = array();
        $countries = $this->Countries->getter();
        $result['countries'] = $countries;
        $result['message'] = $message;
        return view("admin.zones.add", $title)->with('result', $result);
    }

    public function insert(Request $request){
        $this->Zones->insert($request);
        $message = Lang::get("labels.ZoneAddedMessage");
        return Redirect::back()->with('message',$message);
    }

    public function edit(Request $request){
        $title = array('pageTitle' => Lang::get("labels.EditZone"));
        $result = array();
        $result['message'] = array();

        $zones = $this->Zones->edit($request);
        $countries = $this->Countries->getter();
        $result['countries'] = $countries;
        $result['zones'] = $zones;
        return view("admin..zones.edit",$title)->with('result', $result);
    }

    public function update(Request $request){
        $this->Zones->updaterecord($request);
        $countryData['message'] = 'Zone has been updated successfully!';
        $message = Lang::get("labels.Zone has been updated successfully");
        return Redirect::back()->with('message',$message);
    }

    public function delete(Request $request){
        $this->Zones->deleterecord($request);
        return redirect()->back()->withErrors([Lang::get("labels.ZoneDeletedTax")]);
    }

    public function filter(Request $request){
        $name = $request->FilterBy;
        $param = $request->parameter;
        $title = array('pageTitle' => Lang::get("labels.ListingZones"));
        $zones = $this->Zones->filter($request);
        return view("admin.zones.index",$title)->with('zones', $zones)->with('name', $name)->with('param', $param);
    }

    public function pincodesindex(Request $request){
      $title = array('pageTitle' => Lang::get("labels.ListingPinCodes"));
      $pincodes = $this->Pincodes->paginator();
      return view("admin.pincodes.index",$title)->with('pincodes', $pincodes);
    }

    public function pincodesadd(Request $request){
        $title = array('pageTitle' => Lang::get("labels.AddPinCode"));
        $result = array();
        $message = array();
        $result['message'] = $message;
        return view("admin.pincodes.add", $title)->with('result', $result);
    }

    public function pincodesimport(Request $request){
        return view("admin.pincodes.import");
    }

    public function pincodes_import(Request $request){
        $this->Pincodes->import($request);
        $message = Lang::get("labels.PinCodesImportedMessage");
        return Redirect::back()->with('message',$message);
    }

    public function pincodesinsert(Request $request){
        $this->Pincodes->insert($request);
        $message = Lang::get("labels.PinCodeAddedMessage");
        return Redirect::back()->with('message',$message);
    }

    public function pincodesedit(Request $request){
        $title = array('pageTitle' => Lang::get("labels.EditPinCode"));
        $result = array();
        $result['message'] = array();
        $pincodes = $this->Pincodes->edit($request);
        $result['pincodes'] = $pincodes;
        return view("admin.pincodes.edit",$title)->with('result', $result);
    }

    public function pincodesupdate(Request $request){
        $this->Pincodes->updaterecord($request);
        $countryData['message'] = 'Pin Code has been updated successfully!';
        $message = Lang::get("labels.Pin Code has been updated successfully");
        return Redirect::back()->with('message',$message);
    }

    public function pincodesdelete(Request $request){
        $this->Pincodes->deleterecord($request);
        return redirect()->back()->withErrors([Lang::get("labels.PinCodeDeletedTax")]);
    }

    public function pincodesfilter(Request $request){
        $name = $request->FilterBy;
        $param = $request->parameter;
        $title = array('pageTitle' => Lang::get("labels.ListingPinCodes"));
        $pincodes = $this->Pincodes->filter($request);
        return view("admin.pincodes.index",$title)->with('pincodes', $pincodes)->with('name', $name)->with('param', $param);
    }
}
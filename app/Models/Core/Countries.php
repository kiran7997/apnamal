<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\DB;

class Countries extends Model
{

    use Sortable;
    public $sortable = ['state_id','state_name','district','sub_district'];

    public function getter(){
      $countries = Countries::sortable(['state_id'=>'ASC'])->get();
        return $countries;
    }

    public function paginator(){
      $countries = Countries::sortable(['state_id'=>'ASC'])->paginate(30);
        return $countries;
    }

    public function filter($data){

        $name = $data['FilterBy'];
        $param = $data['parameter'];

        $countryData = array();
        $message = array();
        $errorMessage = array();

        switch ( $name ) {
            case 'state_name':
                 $countries = Countries::sortable(['state_id'=>'ASC'])->where('state_name', 'LIKE', '%' . $param . '%')
                    ->orderBy('state_id','ASC')
                    ->paginate(30);
                break;
            case 'district':
                $countries = Countries::sortable(['state_id'=>'ASC'])->where('district', 'LIKE', '%' . $param . '%')
                    ->paginate(30);
                break;
            case 'sub_district':

                $countries = Countries::sortable(['state_id'=>'ASC'])->where('sub_district', 'LIKE', '%' . $param . '%')
                    ->paginate(30);
                break;
           default :
             $countries = Countries::sortable(['state_id'=>'ASC'])->paginate(30);
              break;
        }
        return $countries;
    }

    public function insert($request){
        $state_id = DB::table('countries')->insertGetId([
            'state_name'  		 =>   $request->state_name,
            'district'	 =>   $request->district,
            'sub_district'	 =>   $request->sub_district,
            'address_format_id'	 =>   1
        ]);
        return $state_id;
    }

    public function edit($id){
      $country = Countries::where('state_id', $id)->first();
      return $country;
    }

    public function updaterecord($request){
        $countryUpdate = DB::table('countries')->where('state_id', $request->id)->update([
            'state_name'  		 =>   $request->state_name,
            'district'	 =>   $request->district,
            'sub_district'	 =>   $request->sub_district
        ]);
        return $countryUpdate;
    }

    public function deleterecord($request){
      $deletecountry = DB::table('countries')->where('state_id', $request->id)->delete();
    }

    public function getcountry($request){
      $country = DB::table('countries')->where('state_id', $request->id)->get();
      return $country;
    }





}

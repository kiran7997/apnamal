<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\DB;

class Pincodes extends Model
{
    //

    use Sortable;

    public $sortable = ['id','code'];

    public function getter(){
      $pincodes = Pincodes::sortable(['id'=>'ASC'])
        ->get();
      return $pincodes;
    }

    public function paginator(){
      $pincodes = Pincodes::sortable(['id'=>'ASC'])
        ->paginate(30);
      return $pincodes;
    }

    public function filter($data){
        $name = $data['FilterBy'];
        $param = $data['parameter'];

        $result = array();
        $message = array();
        $errorMessage = array();

        switch ( $name ) {
            case 'Code':
                $pincodes = Pincodes::sortable(['id'=>'ASC'])->where('code', 'LIKE', '%' . $param . '%')
                    ->paginate(30);
                break;
            default:
                $pincodes = Pincodes::sortable(['id'=>'ASC'])
                    ->paginate(30);
                break;
        }

        return $pincodes;
    }

    public function insert($request){
        $pincode_id = DB::table('pincodes')->insertGetId([
            'code'	 		=>   $request->code
        ]);
        return $pincode_id;
    }

    public function import($request){
        $filename = $request->file('codes');
        $file = fopen($filename, "r");
        $flag = true;
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE){
            if($flag) { $flag = false; continue; }
            $chk_pincode =  DB::table('pincodes')->where('code', $getData[0])->get();
            if(count($chk_pincode)==0){
                DB::table('pincodes')->insert(['code'=>$getData[0]]);
            }
        }
        fclose($file);
    }

    public function edit($request){
        $pincodes =  DB::table('pincodes')->where('id', $request->id)->first();
        return $pincodes;
    }


    public function updaterecord($request){
        DB::table('pincodes')->where('id', $request->id)->update([
            'code'			 =>   $request->code
        ]);
    }

    public function deleterecord($request){
      DB::table('pincodes')->where('id', $request->id)->delete();
    }
}
<?php
namespace App\Http\Controllers\AdminControllers;

use App\Models\Core\Images;
use App\Models\Core\Setting;
use App\Models\Core\Languages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Exception;
use Kyslik\ColumnSortable\Sortable;

class FaqController extends Controller
{

    public function display()
    {
        $title = array('pageTitle' => Lang::get("labels.ListingCustomers"));
        $language_id = '1';

        $faqs = DB::table('faqs')->paginate(10);
        return view("admin.faq.index", $title)->with('faqs', $faqs);
    }

    public function add(Request $request)
    {
        $title = array('pageTitle' => 'Add FAQ');
        return view("admin.faq.add", $title);
    }


    //add faq data and redirect to faq's
    public function insert(Request $request)
    {
        $validator = Validator::make(
                        array(
                    'title' => $request->title,
                    'description' => $request->description
                        ), array(
                    'title' => 'required',
                    'description' => 'required'
                        )
        );
        if ($validator->fails()) {
            return redirect('admin/faq/add')->withErrors($validator)->withInput();
        }
        $faq_id = DB::table('faqs')->insertGetId(['title'=>$request->title,'description'=>$request->description]);
        return redirect('admin/faq/edit/' . $faq_id)->with('update', 'FAQ added successfully!');
    }

    //editcustomers data and redirect to address
    public function edit(Request $request){
      $title            = array('pageTitle' => Lang::get("labels.EditCustomer"));
      $language_id      =   '1';
      $id               =   $request->id;
      $faq = DB::table('faqs')->where('id',$id)->first();
      return view("admin.faq.edit",$title)->with('faq', $faq);
    }

    //add addcustomers data and redirect to address
    public function update(Request $request){
        $validator = Validator::make(
                        array(
                    'title' => $request->title,
                    'description' => $request->description
                        ), array(
                    'title' => 'required',
                    'description' => 'required'
                        )
        );
        if ($validator->fails()) {
            return redirect('admin/faq/edit/' . $request->faq_id)->withErrors($validator)->withInput();
        }
        DB::table('faqs')->where('id',$request->faq_id)->update(['title'=>$request->title,'description'=>$request->description]);
        return redirect('admin/faq/edit/' . $request->faq_id)->with('update', 'FAQ Updated successfully!');
    }

    public function delete(Request $request) {
        DB::table('faqs')->where('id', $request->users_id)->delete();
        return redirect()->back()->with('update', 'FAQ Removed successfully!');
    }

}
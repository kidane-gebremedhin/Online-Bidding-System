<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tender;
use App\tender_like;
use App\tender_pin;
use Auth;
use DB;
use File;

class tenderController extends Controller
{
    public $paginationSize;

    public function __construct(){
        $this->middleware('auth:web');
    
     $this->paginationSize=DB::table('settings')->first()!=null? DB::table('settings')->first()->paginationSize: 10;        

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function like($tenderId, Request $request)
    {
    $userId=Auth::guard('web')->user()->id;
    $tender_like=tender_like::where('tenderId', $tenderId)->where('userId', $userId)->first();
    if($tender_like!=null){
        $message="You already liked this tender";
        if($request->ajax())
            return ["danger", $message];

        \Session::flash('danger', $message);
        return back();
    }

    $tender_like=new tender_like;
    $tender_like->userId=$userId;
    $tender_like->tenderId=$tenderId;
    $tender_like->date=(new \App\Date_class)->getCurrentDate();
    $tender_like->save();

    \App\Global_var::logAction($request, 'Liked tender ID '.$tenderId);

    $message="You liked this tender";
    if($request->ajax())
        return ["success", $message];

    \Session::flash('success', $message);
    return back();
    }

    public function pin($tenderId, Request $request)
    {
    $userId=Auth::guard('web')->user()->id;
    $tender_pin=tender_pin::where('tenderId', $tenderId)->where('userId', $userId)->first();
    if($tender_pin!=null){
        $message="You already pined this tender";
        if($request->ajax())
            return ["danger", $message];

        \Session::flash('danger', $message);
        return back();
    }

    $tender_pin=new tender_pin;
    $tender_pin->userId=$userId;
    $tender_pin->tenderId=$tenderId;
    $tender_pin->date=(new \App\Date_class)->getCurrentDate();
    $tender_pin->save();

    \App\Global_var::logAction($request, 'pined tender ID '.$tenderId);

    $message="You pined this tender";
    if($request->ajax())
        return ["success", $message];

    \Session::flash('success', $message);
    return back();
    }

    public function index(Request $request)
    {
    $currentUser=Auth::guard('web')->user();
       $tenders=tender::orderBy("id", "desc");
       if($currentUser->isSubscriber())
            $tenders=$tenders->where('businessCategoryId', $currentUser->businessCategoryId);
       $tenders=$tenders->paginate($this->paginationSize);

    \App\Global_var::logAction($request, 'Tenders list viewed');
    if($request->ajax())
        return view("tenders.ajax.index")->with('tenders', $tenders);

       return view("tenders.http.index")->with('tenders', $tenders);
    }

    public function pinedTenders(Request $request)
    {
    $currentUser=Auth::guard('web')->user();
    $tenders=tender::whereIn('id', $currentUser->pinedTenders->pluck('id'))->paginate($this->paginationSize);

    \App\Global_var::logAction($request, 'Tenders list viewed');
    if($request->ajax())
        return view("tenders.ajax.index")->with('tenders', $tenders);

       return view("tenders.http.index")->with('tenders', $tenders);
    }

    public function likedTenders(Request $request)
    {
    $currentUser=Auth::guard('web')->user();
       $tenders=tender::whereIn('id', $currentUser->likedTenders->pluck('id'))->paginate($this->paginationSize);

    \App\Global_var::logAction($request, 'Tenders list viewed');
    if($request->ajax())
        return view("tenders.ajax.index")->with('tenders', $tenders);

       return view("tenders.http.index")->with('tenders', $tenders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
    $countries=DB::table('countries')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
    $regions=DB::table('regions')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
    $zones=DB::table('zones')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
    $weredas=DB::table('weredas')->where("isDeleted", "=", "false")->where('zoneId', \App\Zone::where("isDeleted", "=", "false")->first()->id)->pluck("name", "id")->toArray();
    $companies=DB::table('company')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
    $business_categories=DB::table('business_categories')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
 
    if($request->ajax())
        return view('tenders.ajax.create')->with('countries', $countries)->with('regions', $regions)->with('zones', $zones)->with('weredas', $weredas)->with('companies', $companies)->with('business_categories', $business_categories);

        return view('tenders.http.create')->with('countries', $countries)->with('regions', $regions)->with('zones', $zones)->with('weredas', $weredas)->with('companies', $companies)->with('business_categories', $business_categories);
    }


    /**
     * Stock a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_path="";
        $this->validate($request, [
            'companyId'=>'required',
            'title'=>'required',
            'summery'=>'required',
            'businessCategoryId'=>'required',
            ]);

        //Upload file
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $storage_path = storage_path().'/app/public/uploads/';
            $file->move($storage_path, $filename);
            $file_path=$storage_path.$filename;
            $file_size = File::size($file_path);//Storage::size($file_path);
            //convert to KB
            $file_size=$file_size/1024;
        }

        $tender=new tender;
        $tender->companyId=$request->companyId;
        $tender->title=$request->title;
        $tender->summery=$request->summery;
        $tender->description=$request->description;
        $tender->countryId=$request->countryId;
        $tender->regionId=$request->regionId;
        $tender->zoneId=$request->zoneId;
        $tender->weredaId=$request->weredaId;
        $tender->businessCategoryId=$request->businessCategoryId;
        $tender->openingDate=$request->openingDate;
        $tender->closingDate=$request->closingDate;
        $tender->requiremets=$request->requiremets;
        $tender->outingCount=$request->outingCount;
        $tender->tenderProcedure=$request->tenderProcedure;
        $tender->image=$file_path;
        $tender->howToApply=$request->howToApply;
        $tender->save();

    \App\Global_var::logAction($request, 'Created new tender ID '.$tender->id);
        return redirect()->route("tenders.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $tender=tender::find($id);
    \App\Global_var::logAction($request, 'Viewed tender ID '.$tender->id.' details');
        if($request->ajax())
            return view("tenders.ajax.show")->with('tender', $tender);
        return view("tenders.http.show")->with('tender', $tender);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
    $tender=tender::find($id);
    
    $countries=DB::table('countries')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
    $regions=DB::table('regions')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
    $zones=DB::table('zones')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
    $weredas=DB::table('weredas')->where("isDeleted", "=", "false")->where('zoneId', \App\Zone::where("isDeleted", "=", "false")->first()->id)->pluck("name", "id")->toArray();
    $companies=DB::table('company')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
    $business_categories=DB::table('business_categories')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();


    if($request->ajax())
        return view('tenders.ajax.edit')->with('tender', $tender)->with('countries', $countries)->with('regions', $regions)->with('zones', $zones)->with('weredas', $weredas)->with('companies', $companies)->with('business_categories', $business_categories);

        return view('tenders.http.edit')->with('tender', $tender)->with('countries', $countries)->with('regions', $regions)->with('zones', $zones)->with('weredas', $weredas)->with('companies', $companies)->with('business_categories', $business_categories);
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file_path="";
        $this->validate($request, [
            'companyId'=>'required',
            'title'=>'required',
            'summery'=>'required',
            'businessCategoryId'=>'required',
            ]);

        //Upload file
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $storage_path = storage_path().'/app/public/uploads/';
            $file->move($storage_path, $filename);
            $file_path=$storage_path.$filename;
            $file_size = File::size($file_path);//Storage::size($file_path);
            //convert to KB
            $file_size=$file_size/1024;
        }

        $tender=tender::find($id);
        $tender->companyId=$request->companyId;
        $tender->title=$request->title;
        $tender->summery=$request->summery;
        $tender->description=$request->description;
        $tender->countryId=$request->countryId;
        $tender->regionId=$request->regionId;
        $tender->zoneId=$request->zoneId;
        $tender->weredaId=$request->weredaId;
        $tender->businessCategoryId=$request->businessCategoryId;
        $tender->openingDate=$request->openingDate;
        $tender->closingDate=$request->closingDate;
        $tender->requiremets=$request->requiremets;
        $tender->outingCount=$request->outingCount;
        $tender->tenderProcedure=$request->tenderProcedure;
        if($file_path!="")
            $tender->image=$file_path;
        $tender->howToApply=$request->howToApply;
        $tender->save();


    \App\Global_var::logAction($request, 'Updated tender ID '.$tender->id.'');
   return redirect()->route("tenders.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $tender=tender::find($id);
       if($request->ajax())
        return view('tenders.ajax.delete-confirm')->with('tender', $tender);
        
        return view('tenders.http.delete-confirm')->with('tender', $tender);
    }
    public function destroy($id, Request $request)
    {
        $tender=tender::find($id);
        $tender->delete();

    \App\Global_var::logAction($request, 'Deleted tender ID '.$tender->id);
        return redirect()->route('tenders.index');
    }

}

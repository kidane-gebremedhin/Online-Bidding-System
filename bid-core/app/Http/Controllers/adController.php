<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ad;
use Auth;
use DB;
use File;

class adController extends Controller
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

    public function index(Request $request)
    {
       
       $ads=ad::orderBy("id", "desc")->paginate($this->paginationSize);

    \App\Global_var::logAction($request, 'ads list viewed');
    if($request->ajax())
        return view("ads.ajax.index")->with('ads', $ads);

       return view("ads.http.index")->with('ads', $ads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
     $classes=DB::table('class')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
       
    if($request->ajax())
        return view('ads.ajax.create')->with('classes', $classes);

        return view('ads.http.create')->with('classes', $classes);
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
            'name'=>'required',
            ]);
 /*$ad=ad::where('name', '=', $request->name)->first();
        if($ad!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }*/

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
        
        $ad=new ad;
        $ad->name=$request->name;
        $ad->description=$request->description;
        $ad->tagline=$request->tagline;
        $ad->image=$file_path;
        $ad->link=$request->link;
        $ad->dateCreated=$request->dateCreated;
        $ad->expirationDate=$request->expirationDate;
        $ad->classId=$request->classId;
        $ad->createdByUserId=Auth::guard('web')->user()->id;
        $ad->save();
    \App\Global_var::logAction($request, 'Created new ad ID '.$ad->id);
        return redirect()->route("ads.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $ad=ad::find($id);
    \App\Global_var::logAction($request, 'Viewed ad ID '.$ad->id.' details');
        if($request->ajax())
            return view("ads.ajax.show")->with('ad', $ad);
        return view("ads.http.show")->with('ad', $ad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
    $ad=ad::find($id);
    $classes=DB::table('class')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
    
    if($request->ajax())
        return view('ads.ajax.edit')->with('ad', $ad)->with('classes', $classes);

        return view('ads.http.edit')->with('ad', $ad)->with('classes', $classes);
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
        /*$ad=ad::where('name', '=', $request->name)->first();
        if($ad!=null && $ad->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }*/

       $this->validate($request, [
            'name'=>'required'
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

        $ad=ad::find($id);
        $ad->name=$request->name;
        $ad->description=$request->description;
        $ad->tagline=$request->tagline;
        if($file_path!="")
            $ad->image=$file_path;
        $ad->link=$request->link;
        $ad->dateCreated=$request->dateCreated;
        $ad->expirationDate=$request->expirationDate;
        $ad->classId=$request->classId;
        $ad->updatedByUserId=Auth::guard('web')->user()->id;
        $ad->save();

    \App\Global_var::logAction($request, 'Updated ad ID '.$ad->id.'');
   return redirect()->route("ads.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $ad=ad::find($id);
       if($request->ajax())
        return view('ads.ajax.delete-confirm')->with('ad', $ad);
        
        return view('ads.http.delete-confirm')->with('ad', $ad);
    }
    public function destroy($id, Request $request)
    {
        $ad=ad::find($id);
        $ad->delete();

    \App\Global_var::logAction($request, 'Deleted ad ID '.$ad->id);
        return redirect()->route('ads.index');
    }

}

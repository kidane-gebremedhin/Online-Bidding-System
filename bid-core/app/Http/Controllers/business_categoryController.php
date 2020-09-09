<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\business_category;
use Auth;
use DB;

class business_categoryController extends Controller
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
       
       $business_categories=business_category::orderBy("id", "desc")->paginate($this->paginationSize);

    \App\Global_var::logAction($request, 'business_categories list viewed');
    if($request->ajax())
        return view("business_categories.ajax.index")->with('business_categories', $business_categories);

       return view("business_categories.http.index")->with('business_categories', $business_categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
        
    if($request->ajax())
        return view('business_categories.ajax.create');

        return view('business_categories.http.create');
    }


    /**
     * Stock a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'code'=>'required',
            ]);
 $business_category=business_category::where('name', '=', $request->name)->first();
        if($business_category!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
        $business_category=new business_category;
        $business_category->name=$request->name;
        $business_category->code=$request->code;
        $business_category->description=$request->description;
        $business_category->save();
    \App\Global_var::logAction($request, 'Created new business_category ID '.$business_category->id);
        return redirect()->route("business_categories.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $business_category=business_category::find($id);
    \App\Global_var::logAction($request, 'Viewed business_category ID '.$business_category->id.' details');
        if($request->ajax())
            return view("business_categories.ajax.show")->with('business_category', $business_category);
        return view("business_categories.http.show")->with('business_category', $business_category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
    $business_category=business_category::find($id);
        
    if($request->ajax())
        return view('business_categories.ajax.edit')->with('business_category', $business_category);

        return view('business_categories.http.edit')->with('business_category', $business_category);
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
        $business_category=business_category::where('name', '=', $request->name)->first();
        if($business_category!=null && $business_category->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }

       $this->validate($request, [
            'name'=>'required',
            'code'=>'required',
            ]);
        $business_category=business_category::find($id);
        $business_category->name=$request->name;
        $business_category->code=$request->code;
        $business_category->description=$request->description;
        $business_category->save();

    \App\Global_var::logAction($request, 'Updated business_category ID '.$business_category->id.'');
   return redirect()->route("business_categories.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $business_category=business_category::find($id);
       if($request->ajax())
        return view('business_categories.ajax.delete-confirm')->with('business_category', $business_category);
        
        return view('business_categories.http.delete-confirm')->with('business_category', $business_category);
    }
    public function destroy($id, Request $request)
    {
        $business_category=business_category::find($id);
        $business_category->delete();

    \App\Global_var::logAction($request, 'Deleted business_category ID '.$business_category->id);
        return redirect()->route('business_categories.index');
    }

}

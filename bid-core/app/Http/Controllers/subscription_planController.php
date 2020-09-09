<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subscription_plan;
use Auth;
use DB;

class subscription_planController extends Controller
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
       
       $subscription_plans=subscription_plan::orderBy("id", "desc")->paginate($this->paginationSize);

    \App\Global_var::logAction($request, 'subscription_plans list viewed');
    if($request->ajax())
        return view("subscription_plans.ajax.index")->with('subscription_plans', $subscription_plans);

       return view("subscription_plans.http.index")->with('subscription_plans', $subscription_plans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
        
    if($request->ajax())
        return view('subscription_plans.ajax.create');

        return view('subscription_plans.http.create');
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
            ]);
 $subscription_plan=subscription_plan::where('name', '=', $request->name)->first();
        if($subscription_plan!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
        $subscription_plan=new subscription_plan;
        $subscription_plan->name=$request->name;
        $subscription_plan->description=$request->description;
        $subscription_plan->save();
    \App\Global_var::logAction($request, 'Created new subscription_plan ID '.$subscription_plan->id);
        return redirect()->route("subscription_plans.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $subscription_plan=subscription_plan::find($id);
    \App\Global_var::logAction($request, 'Viewed subscription_plan ID '.$subscription_plan->id.' details');
        if($request->ajax())
            return view("subscription_plans.ajax.show")->with('subscription_plan', $subscription_plan);
        return view("subscription_plans.http.show")->with('subscription_plan', $subscription_plan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
    $subscription_plan=subscription_plan::find($id);
        
    if($request->ajax())
        return view('subscription_plans.ajax.edit')->with('subscription_plan', $subscription_plan);

        return view('subscription_plans.http.edit')->with('subscription_plan', $subscription_plan);
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
        $subscription_plan=subscription_plan::where('name', '=', $request->name)->first();
        if($subscription_plan!=null && $subscription_plan->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }

       $this->validate($request, [
            'name'=>'required'
            ]);
        $subscription_plan=subscription_plan::find($id);
        $subscription_plan->name=$request->name;
        $subscription_plan->description=$request->description;
        $subscription_plan->save();

    \App\Global_var::logAction($request, 'Updated subscription_plan ID '.$subscription_plan->id.'');
   return redirect()->route("subscription_plans.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $subscription_plan=subscription_plan::find($id);
       if($request->ajax())
        return view('subscription_plans.ajax.delete-confirm')->with('subscription_plan', $subscription_plan);
        
        return view('subscription_plans.http.delete-confirm')->with('subscription_plan', $subscription_plan);
    }
    public function destroy($id, Request $request)
    {
        $subscription_plan=subscription_plan::find($id);
        $subscription_plan->delete();

    \App\Global_var::logAction($request, 'Deleted subscription_plan ID '.$subscription_plan->id);
        return redirect()->route('subscription_plans.index');
    }

}

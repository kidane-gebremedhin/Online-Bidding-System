<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\class_;
use Auth;
use DB;

class classController extends Controller
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
       
       $classes=class_::orderBy("id", "desc")->paginate($this->paginationSize);

    \App\Global_var::logAction($request, 'classes list viewed');
    if($request->ajax())
        return view("classes.ajax.index")->with('classes', $classes);

       return view("classes.http.index")->with('classes', $classes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
        
    if($request->ajax())
        return view('classes.ajax.create');

        return view('classes.http.create');
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
 $class=class_::where('name', '=', $request->name)->first();
        if($class!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
        $class=new class_;
        $class->name=$request->name;
        $class->code=$request->code;
        $class->description=$request->description;
        $class->save();
    \App\Global_var::logAction($request, 'Created new class ID '.$class->id);
        return redirect()->route("classes.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $class=class_::find($id);
    \App\Global_var::logAction($request, 'Viewed class ID '.$class->id.' details');
        if($request->ajax())
            return view("classes.ajax.show")->with('class', $class);
        return view("classes.http.show")->with('class', $class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
    $class=class_::find($id);
        
    if($request->ajax())
        return view('classes.ajax.edit')->with('class', $class);

        return view('classes.http.edit')->with('class', $class);
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
        $class=class_::where('name', '=', $request->name)->first();
        if($class!=null && $class->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }

       $this->validate($request, [
            'name'=>'required',
            'code'=>'required',
            ]);
        $class=class_::find($id);
        $class->name=$request->name;
        $class->code=$request->code;
        $class->description=$request->description;
        $class->save();

    \App\Global_var::logAction($request, 'Updated class ID '.$class->id.'');
   return redirect()->route("classes.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $class=class_::find($id);
       if($request->ajax())
        return view('classes.ajax.delete-confirm')->with('class', $class);
        
        return view('classes.http.delete-confirm')->with('class', $class);
    }
    public function destroy($id, Request $request)
    {
        $class=class_::find($id);
        $class->delete();

    \App\Global_var::logAction($request, 'Deleted class ID '.$class->id);
        return redirect()->route('classes.index');
    }

}

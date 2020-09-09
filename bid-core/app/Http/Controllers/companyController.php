<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\company;
use Auth;
use DB;

class companyController extends Controller
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
       
       $companies=company::orderBy("id", "desc")->paginate($this->paginationSize);

    \App\Global_var::logAction($request, 'companies list viewed');
    if($request->ajax())
        return view("companies.ajax.index")->with('companies', $companies);

       return view("companies.http.index")->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
        
    if($request->ajax())
        return view('companies.ajax.create');

        return view('companies.http.create');
    }


    /**
     * Stock a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
$logo_name='';
$image_name='';
        $this->validate($request, [
            'name'=>'required',
            'phoneNumber'=>'required',
            ]);
 $company=company::where('name', '=', $request->name)->first();
        if($company!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }

if($request->hasFile('logo')){
             $image=$request->file('logo');
             $extension=$image->getClientOriginalExtension();
             if(strtolower($extension)=="jpg" ||strtolower($extension)=="jpeg" ||strtolower($extension)=="png" ||strtolower($extension)=="gif" ||strtolower($extension)=="webp")
             {
             $filename=time().'.'.$extension;
             $location='images/'.$filename;
             \Image::make($image)->resize(200, 200)->save($location);
        
             $logo_name=$filename;
            
         }
         else{
            if($request->ajax())
                return ['error', 'Invalid_Format'];
            Session::flash('danger', 'Invalid Logo Format only JPG, PNG, GIF or WebP s are allowed');
            return redirect()->back()->withInput($request->all()); 
         }
     }
if($request->hasFile('image')){
             $image=$request->file('image');
             $extension=$image->getClientOriginalExtension();
             if(strtolower($extension)=="jpg" ||strtolower($extension)=="jpeg" ||strtolower($extension)=="png" ||strtolower($extension)=="gif" ||strtolower($extension)=="webp")
             {
             $filename=time().'.'.$extension;
             $location='images/'.$filename;
             \Image::make($image)->resize(200, 200)->save($location);
        
             $image_name=$filename;
            
         }
         else{
            if($request->ajax())
                return ['error', 'Invalid_Format'];
            Session::flash('danger', 'Invalid Company image Format only JPG, PNG, GIF or WebP s are allowed');
            return redirect()->back()->withInput($request->all()); 
         }
     }
        $company=new company;
        $company->name=$request->name;
        $company->locationAddress=$request->locationAddress;
        $company->phoneNumber=$request->phoneNumber;
        $company->logo=$logo_name;
        $company->image=$image_name;
        $company->email=$request->email;
        $company->website=$request->website;
        $company->save();

    \App\Global_var::logAction($request, 'Created new company ID '.$company->id);
        return redirect()->route("companies.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $company=company::find($id);
    \App\Global_var::logAction($request, 'Viewed company ID '.$company->id.' details');
        if($request->ajax())
            return view("companies.ajax.show")->with('company', $company);
        return view("companies.http.show")->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
    $company=company::find($id);
        
    if($request->ajax())
        return view('companies.ajax.edit')->with('company', $company);

        return view('companies.http.edit')->with('company', $company);
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
        $company=company::where('name', '=', $request->name)->first();
        if($company!=null && $company->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }

$logo_name='';
$image_name='';
        $this->validate($request, [
            'name'=>'required',
            'phoneNumber'=>'required',
            ]);

if($request->hasFile('logo')){
             $image=$request->file('logo');
             $extension=$image->getClientOriginalExtension();
             if(strtolower($extension)=="jpg" ||strtolower($extension)=="jpeg" ||strtolower($extension)=="png" ||strtolower($extension)=="gif" ||strtolower($extension)=="webp")
             {
             $filename=time().'.'.$extension;
             $location='images/'.$filename;
             \Image::make($image)->resize(200, 200)->save($location);
        
             $logo_name=$filename;
            
         }
         else{
            if($request->ajax())
                return ['error', 'Invalid_Format'];
            Session::flash('danger', 'Invalid Logo Format only JPG, PNG, GIF or WebP s are allowed');
            return redirect()->back()->withInput($request->all()); 
         }
     }
if($request->hasFile('image')){
             $image=$request->file('image');
             $extension=$image->getClientOriginalExtension();
             if(strtolower($extension)=="jpg" ||strtolower($extension)=="jpeg" ||strtolower($extension)=="png" ||strtolower($extension)=="gif" ||strtolower($extension)=="webp")
             {
             $filename=time().'.'.$extension;
             $location='images/'.$filename;
             \Image::make($image)->resize(200, 200)->save($location);
        
             $image_name=$filename;
            
         }
         else{
            if($request->ajax())
                return ['error', 'Invalid_Format'];
            Session::flash('danger', 'Invalid Company image Format only JPG, PNG, GIF or WebP s are allowed');
            return redirect()->back()->withInput($request->all()); 
         }
     }
        
        $company=company::find($id);
        $company->name=$request->name;
        $company->locationAddress=$request->locationAddress;
        $company->phoneNumber=$request->phoneNumber;
        if($logo_name!="")
            $company->logo=$logo_name;
        if($image_name!="")
            $company->image=$image_name;
        $company->email=$request->email;
        $company->website=$request->website;
        $company->save();


    \App\Global_var::logAction($request, 'Updated company ID '.$company->id.'');
   return redirect()->route("companies.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $company=company::find($id);
       if($request->ajax())
        return view('companies.ajax.delete-confirm')->with('company', $company);
        
        return view('companies.http.delete-confirm')->with('company', $company);
    }
    public function destroy($id, Request $request)
    {
        $company=company::find($id);
        $company->delete();

    \App\Global_var::logAction($request, 'Deleted company ID '.$company->id);
        return redirect()->route('companies.index');
    }

}

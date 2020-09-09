<div class="col-md-12">
  <div class="col-md-10">
    {{Form::model($company, array("route"=>["companies.update", $company->id], "method"=>"POST", "class"=>"post"))}}
    <label class="nextUrl" nextUrl="{{route('companies.index')}}" />
    <div class="panel panel-success">
      <div class="panel-heading"> 
        {{App\Global_var::getLangString('Edit_Company', $language_strings)}}
        <a href="{{route('companies.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('companies.index')}}"><i class="fa fa-eye"></i> 
          {{App\Global_var::getLangString('List', $language_strings)}}
        </a>  
      </div>
      <div class="panel-body">
        <div class="col-md-12" style="padding-top:15px;">
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {{App\Global_var::getLangString('Name', $language_strings)}}
            </label>
            <div class="col-md-8">
              {{ Form::text('name', null, array('class'=>'form-control', 'required'=>'true'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {{App\Global_var::getLangString('Phone_Number', $language_strings)}}
            </label>
            <div class="col-md-8">
              {{ Form::text('phoneNumber', null, array('class'=>'form-control', 'required'=>'true'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {{App\Global_var::getLangString('Logo', $language_strings)}}
            </label>
            <div class="col-md-4">
              {{ Form::file('logo', null, array('class'=>'form-control'))}}
            </div>
            <div class="col-md-4">
              <img src="{{asset('images/'.$company->logo)}}" alt="Logo" class="logo" style="height:200px; width: 100%; "/>
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {{App\Global_var::getLangString('Image', $language_strings)}}
            </label>
            <div class="col-md-4">
              {{ Form::file('image', null, array('class'=>'form-control'))}}
            </div>
            <div class="col-md-4">
              <img src="{{asset('images/'.$company->image)}}" alt="Image" class="image" style="height:200px; width: 100%; "/>
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {{App\Global_var::getLangString('Email', $language_strings)}}
            </label>
            <div class="col-md-8">
              {{ Form::text('email', null, array('class'=>'form-control', 'required'=>'true'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {{App\Global_var::getLangString('Website', $language_strings)}}
            </label>
            <div class="col-md-8">
              {{ Form::text('website', null, array('class'=>'form-control', 'required'=>'true'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="col-md-4 control-label"> 
              {{App\Global_var::getLangString('Address', $language_strings)}}
            </label>
            <div class="form-group col-md-8">
              {!! Form::textarea('locationAddress', null, array('class'=>'formatted form-control', 'rows'=>'3'));!!}
            </div>
          </div>
          <div class="col-md-12 form-group text-center">
          <label class="col-md-4 control-label"> </label>
            <div class="col-md-6">
              <button type="submit" class="btn btn-success btn-block">
              <i class="fa fa-save"></i> 
              {{App\Global_var::getLangString('Save', $language_strings)}}
            </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{Form::close()}}
  </div>
</div>



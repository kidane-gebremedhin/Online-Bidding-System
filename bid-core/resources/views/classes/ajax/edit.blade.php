<div class="col-md-12">
  <div class="col-md-8">
    {{Form::model($class, array("route"=>["classes.update", $class->id], "method"=>"POST", "class"=>"post"))}}
    <label class="nextUrl" nextUrl="{{route('classes.index')}}" />
    <div class="panel panel-success">
      <div class="panel-heading"> 
        {{App\Global_var::getLangString('Edit_Class', $language_strings)}}
        <a href="{{route('classes.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('classes.index')}}"><i class="fa fa-eye"></i> 
          {{App\Global_var::getLangString('List', $language_strings)}}
        </a>  
      </div>
      <div class="panel-body">
        <div class="col-md-10" style="padding-top:15px;">
          <div class="col-md-10 form-group">
            <label class="label-control col-md-4">
              {{App\Global_var::getLangString('Name', $language_strings)}}          
            </label>
            <div class="col-md-8">
              {{ Form::text('name', null, array('class'=>'form-control', 'required'=>'true'))}}
            </div>
          </div>
          <div class="col-md-10 form-group">
            <label class="label-control col-md-4">
              {{App\Global_var::getLangString('Code', $language_strings)}}
            </label>
            <div class="col-md-8">
              {{ Form::text('code', null, array('class'=>'form-control', 'required'=>'true'))}}
            </div>
          </div>
          <div class="col-md-10 form-group">
            <label class="col-md-4 control-label"> 
              {{App\Global_var::getLangString('Description', $language_strings)}}
            </label>
            <div class="form-group col-md-8">
              {!! Form::textarea('description', null, array('class'=>'form-control', 'rows'=>'3'));!!}
            </div>
          </div>
          <div class="col-md-12 form-group text-center">
            <button type="submit" class="btn btn-primary btn-sm">
              <i class="fa fa-save"></i> 
              {{App\Global_var::getLangString('Update', $language_strings)}}
            </button>
          </div>
        </div>
      </div>
    </div>
    {{Form::close()}}
  </div>
</div>



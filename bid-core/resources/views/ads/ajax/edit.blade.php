<div class="col-md-12">
  <div class="col-md-10">
    {{Form::model($ad, array("route"=>["ads.update", $ad->id], "method"=>"POST", "files"=>true, "class"=>"post"))}}
    <label class="nextUrl" nextUrl="{{route('ads.index')}}" />
    <div class="panel panel-success">
      <div class="panel-heading"> 
        {{App\Global_var::getLangString('Edit_Ad', $language_strings)}}
        <a href="{{route('ads.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('ads.index')}}"><i class="fa fa-eye"></i> 
          {{App\Global_var::getLangString('List', $language_strings)}}
        </a>  
      </div>
      <div class="panel-body">
        <div class="col-md-12" style="padding-top:15px;">
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {!! App\Global_var::getLangString('Name', $language_strings) !!}
            </label>
            <div class="col-md-8">
              {!!  Form::text('name', null, array('class'=>'form-control', 'required'=>'true')) !!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {!! App\Global_var::getLangString('Tagline', $language_strings) !!}
            </label>
            <div class="col-md-8">
              {!!  Form::text('tagline', null, array('class'=>'form-control', 'required'=>'true')) !!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {!! App\Global_var::getLangString('Image', $language_strings) !!}
            </label>
            <div class="col-md-8">
              {{ Form::file('image', null, array('class'=>'form-control', 'required'=>'true'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {!! App\Global_var::getLangString('Link', $language_strings) !!}
            </label>
            <div class="col-md-8">
              {!!  Form::text('link', null, array('class'=>'form-control', 'required'=>'true')) !!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {!! App\Global_var::getLangString('Date_Created', $language_strings) !!}
            </label>
            <div class="col-md-8">
              {!!  Form::text('dateCreated', null, array('class'=>'eth_date form-control', 'required'=>'true')) !!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {!! App\Global_var::getLangString('Expiration_Date', $language_strings) !!}
            </label>
            <div class="col-md-8">
              {!!  Form::text('expirationDate', null, array('class'=>'eth_date form-control', 'required'=>'true')) !!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {!! App\Global_var::getLangString('Class', $language_strings) !!}
            </label>
            <div class="col-md-8">
              {{ Form::select('classId', $classes, null, array('class'=>'classId select2 form-control', 'required'=>'true'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="col-md-4 control-label"> 
              {!! App\Global_var::getLangString('Description', $language_strings) !!}
            </label>
            <div class="form-group col-md-8">
              {!! Form::textarea('description', null, array('class'=>'formatted form-control', 'rows'=>'3'));!!}
            </div>
          </div>
          <div class="col-md-12 form-group text-center">
          <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-success btn-block">
              <i class="fa fa-save"></i> 
              {!! App\Global_var::getLangString('Save', $language_strings) !!}
            </button>
          </div>
          </div>
        </div>
      </div>
    </div>
    {{Form::close()}}
  </div>
</div>



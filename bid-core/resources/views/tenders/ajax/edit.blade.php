<div class="col-md-12">
  <div class="col-md-12">
    {{Form::model($tender, array("route"=>["tenders.update", $tender->id], "method"=>"POST", "class"=>"post"))}}
    <label class="nextUrl" nextUrl="{{route('tenders.index')}}" />
    <div class="panel panel-success">
      <div class="panel-heading">
        {{App\Global_var::getLangString('Create_New_Tender', $language_strings)}}
        <a href="{{route('tenders.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('tenders.index')}}"><i class="fa fa-eye"></i>  
          {{App\Global_var::getLangString('List', $language_strings)}}
        </a> 
      </div>
      <div class="panel-body">
        <div class="col-md-12" style="padding-top:15px;">
          <div class="col-md-12 form-group">
            <label class="label-control col-md-3">
              {{App\Global_var::getLangString('Company', $language_strings)}}
            </label>
            <div class="col-md-6">
              {{ Form::select('companyId', [null=>'-- Company --']+$companies, null, array('class'=>'companyId select2 form-control', 'required'=>'true'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-3">
              {{App\Global_var::getLangString('Business_Category', $language_strings)}}
            </label>
            <div class="col-md-6">
              {{ Form::select('businessCategoryId', [null=>'-- Business Category --']+$business_categories, null, array('class'=>'businessCategoryId select2 form-control', 'required'=>'true'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-3">
              {{App\Global_var::getLangString('Title', $language_strings)}}
            </label>
            <div class="col-md-8">
              {{ Form::text('title', null, array('class'=>'form-control', 'required'=>'true'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-3">
              {{App\Global_var::getLangString('Summery', $language_strings)}}
            </label>
            <div class="col-md-9">
              {{ Form::textarea('summery', null, array('class'=>'formatted form-control', 'rows'=>'3'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-3">
              {{App\Global_var::getLangString('Address', $language_strings)}}
            </label>
            <div class="col-md-2">
              {{App\Global_var::getLangString('Country', $language_strings)}}
              {{ Form::select('countryId', $countries, null, array('class'=>'countryId select2 form-control', 'required'=>'true'))}}
            </div>
            <div class="col-md-2">
              {{App\Global_var::getLangString('Region', $language_strings)}}
              {{ Form::select('regionId', $regions, null, array('class'=>'regionId select2 form-control', 'required'=>'true'))}}
            </div>
            <div class="col-md-2">
              {{App\Global_var::getLangString('Zone', $language_strings)}}
              {{ Form::select('zoneId', $zones, null, array('class'=>'zoneId select2 form-control', 'required'=>'true'))}}
            </div>
            <div class="col-md-2">
              {{App\Global_var::getLangString('Wereda/City', $language_strings)}}
              {{ Form::select('weredaId', [null=>'-- Wereda --']+$weredas, null, array('class'=>'weredaId select2 form-control', 'required'=>'true'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-3">
              {{App\Global_var::getLangString('Requiremets', $language_strings)}}
            </label>
            <div class="col-md-9">
              {{ Form::textarea('requiremets', null, array('class'=>'formatted form-control', 'rows'=>'3'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-3">
              {{App\Global_var::getLangString('Opening_Date', $language_strings)}}
            </label>
            <div class="col-md-3">
              {{ Form::text('openingDate', null, array('class'=>'eth_date form-control', 'required'=>'true', 'placeholder'=>'dd/mm/yyyy'))}}
            </div>
            <label class="label-control col-md-2">
              <span class="pull-right">{{App\Global_var::getLangString('Closing_Date', $language_strings)}}</span>
            </label>
            <div class="col-md-3">
              {{ Form::text('closingDate', null, array('class'=>'eth_date form-control', 'required'=>'true', 'placeholder'=>'dd/mm/yyyy'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-3">
              {{App\Global_var::getLangString('Tender_Procedure', $language_strings)}}
            </label>
            <div class="col-md-9">
              {{ Form::textarea('tenderProcedure', null, array('class'=>'formatted form-control', 'rows'=>'3'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-3">
              {{App\Global_var::getLangString('Image', $language_strings)}}
            </label>
            <div class="col-md-9">
              {{ Form::file('image', null, array('class'=>'form-control', 'required'=>'true'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-3">
              {{App\Global_var::getLangString('How_To_Apply', $language_strings)}}
            </label>
            <div class="col-md-9">
              {{ Form::textarea('howToApply', null, array('class'=>'formatted form-control', 'rows'=>'3'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-3">
              {{App\Global_var::getLangString('Outing_Count', $language_strings)}}
            </label>
            <div class="col-md-3">
              {{ Form::number('outingCount', null, array('class'=>'form-control', 'required'=>'true'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-3">
              {{App\Global_var::getLangString('Description', $language_strings)}}
            </label>
            <div class="col-md-9">
              {{ Form::textarea('description', null, array('class'=>'formatted form-control', 'rows'=>'3'))}}
            </div>
          </div>
          <div class="col-md-12 form-group text-center">
            <div class="col-md-4 col-md-offset-4">
            <button type="submit" class="btn btn-success btn-block">
              <i class="fa fa-save"></i> 
              {{App\Global_var::getLangString('Save', $language_strings)}}
            </button></div>
          </div>
        </div>
      </div>
    </div>
    {{Form::close()}}
  </div>
</div>



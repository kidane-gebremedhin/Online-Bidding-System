<div class="col-md-12">
	<div class="panel panel-success">
		<div class="panel-heading">
			{{ App\Global_var::getLangString('Detail', $language_strings) }}

			<a href="{{ route('tenders.index') }}" class="get btn btn-success btn-sm pull-right" nextUrl="{{ route('tenders.index') }}"><i class="fa fa-eye"></i>  
				{{ App\Global_var::getLangString('List', $language_strings) }}
			</a> 		
		</div>
		<div class="panel-body">
			<div class="panel col-md-10" style="border: 1px solid #ddd; box-shadow: 10px 10px 5px grey;">
			<table class="table">
				<tbody>
					<tr>
						<td><strong>{{ App\Global_var::getLangString('Company', $language_strings) }}</strong></td><td><h4><a href="{{ route('companies.show', $tender->company->id) }}">{{ $tender->company!=null? $tender->company->name:'' }}</a></h4></td>
					</tr>
					<tr>
						<td><strong>{{ App\Global_var::getLangString('Business_Category', $language_strings) }}</strong></td><td><h4>{{ $tender->businessCategory!=null? $tender->businessCategory->name:'' }}</h4></td>
					</tr>
					<tr>
						<td><strong>{{ App\Global_var::getLangString('Title', $language_strings) }}</strong></td><td><h4>{{ $tender->title }}</h4></td>
					</tr>
					<tr>
						<td><strong>{{ App\Global_var::getLangString('Summery', $language_strings) }}</strong></td><td><h4>{!! $tender->summery !!}</h4></td>
					</tr>
					<tr>
						<td><strong>{{ App\Global_var::getLangString('Description', $language_strings) }}</strong></td><td><h4>{!! $tender->description !!}</h4></td>
					</tr>
					<tr>
						<td><strong>{{ App\Global_var::getLangString('Address', $language_strings) }}</strong></td><td><h4>{{ ($tender->country!=null? $tender->country->name:'').' > '.($tender->region!=null? $tender->region->name:'').' > '.($tender->zone!=null? $tender->zone->name:'').' > '.($tender->wereda!=null? $tender->wereda->name:'') }}</h4></td>
					</tr>
					<tr>
						<td><strong>{{ App\Global_var::getLangString('Opening_Date', $language_strings) }}</strong></td><td><h4>{{ $tender->openingDate }}</h4></td>
					</tr>
					<tr>
						<td><strong>{{ App\Global_var::getLangString('Closing_Date', $language_strings) }}</strong></td><td><h4>{{ $tender->closingDate }}</h4></td>
					</tr>
					<tr>
						<td><strong>{{ App\Global_var::getLangString('Requiremets', $language_strings) }}</strong></td><td><h4>{!! $tender->requiremets !!}</h4></td>
					</tr>
					<tr>
						<td><strong>{{ App\Global_var::getLangString('Outing_Count', $language_strings) }}</strong></td><td><h4>{{ $tender->outingCount }}</h4></td>
					</tr>
					<tr>
						<td><strong>{{ App\Global_var::getLangString('Tender_Procedure', $language_strings) }}</strong></td><td><h4>{!! $tender->tenderProcedure !!}</h4></td>
					</tr>
					<tr>
						<td><strong>{{ App\Global_var::getLangString('How_To_Apply', $language_strings) }}</strong></td><td><h4>{!! $tender->howToApply !!}</h4></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<img src="{{  route('stream_text_image', $tender->id)  }}" style="width:100%; height:400px;" class="imageView">
						</td>
					</tr>
				</tbody>
			</table>
			</div>
<div class="col-md-12">
<hr>
	<div class="col-md-12">
	{{ App\Global_var::getLangString('Created_By', $language_strings) }}:
	<label class="label label-default">{{ $tender->createdByUser!=null? $tender->createdByUser->username():'' }}</label>

	{{ App\Global_var::getLangString('Updated_By', $language_strings) }}:
	<label class="label label-default">{{ $tender->updatedByUser!=null? $tender->updatedByUser->username():'' }}	</label>
	<br>

	{{ App\Global_var::getLangString('Created_At', $language_strings) }}:
	<label class="label label-default">{{ date('M j Y h:i', strtotime($tender->created_at)) }}</label>
	{{ App\Global_var::getLangString('Updated_At', $language_strings) }}:
	<label class="label label-default">{{ date('M j Y h:i', strtotime($tender->updated_at)) }}</label> 		 

</div>
</div>
<div class="col-md-12">
<hr>
	<div class="col-md-4 pull-right">

    @if($currentUser->isGranted('tenders.edit'))
	<a href="{{ route('tenders.edit', $tender->id) }}" value="{{ $tender->id }}" class="get btn btn-sm btn-primary" nextUrl="{{ route('tenders.edit', $tender->id) }}"><i class="fa fa-edit"></i> 
		{{ App\Global_var::getLangString('Edit', $language_strings) }}
	</a>
	@endif
    @if($currentUser->isGranted('tenders.destroy'))
	<a href="{{ route('tenders.delete', $tender->id) }}" value="{{ $tender->id }}" class="get btn btn-sm btn-danger" nextUrl="{{ route('tenders.delete', $tender->id) }}"><i class="fa fa-trash"></i> 
		{{ App\Global_var::getLangString('Delete', $language_strings) }}
	</a>
	@endif
</div>
</div>
		</div>
	</div>

</div>


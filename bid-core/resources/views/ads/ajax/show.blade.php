<div class="col-md-12">
	<div class="panel panel-success">
		<div class="panel-heading">
			{{App\Global_var::getLangString('Detail', $language_strings)}}

			<a href="{{route('ads.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('ads.index')}}"><i class="fa fa-eye"></i>  
				{{App\Global_var::getLangString('List', $language_strings)}}
			</a> 		
		</div>
		<div class="panel-body">
			<div class="panel col-md-10" style="border: 1px solid #ddd; box-shadow: 10px 10px 5px grey;">
			<table class="table">
				<tbody>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Name', $language_strings)}}</strong></td><td><h4>{{$ad->name}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Tagline', $language_strings)}}</strong></td><td><h4>{{$ad->tagline}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Link', $language_strings)}}</strong></td><td><h4>{{$ad->link}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Date_Created', $language_strings)}}</strong></td><td><h4>{{$ad->dateCreated}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Expiration_Date', $language_strings)}}</strong></td><td><h4>{{$ad->expirationDate}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Class', $language_strings)}}</strong></td><td><h4>{{$ad->class!=null? $ad->class->name: ''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Description', $language_strings)}}</strong></td><td><h4>{!! $ad->description !!}</h4></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<img src="{{  route('stream_ads_image', $ad->id)  }}" style="width:100%; height:400px;" class="imageView">
						</td>
					</tr>
				</tbody>
			</table>
			</div>
<div class="col-md-12">
<hr>
	<div class="col-md-12">
	{{App\Global_var::getLangString('Created_By', $language_strings)}}:
	<label class="label label-default">{{$ad->createdByUser!=null? $ad->createdByUser->username():''}}</label>

	{{App\Global_var::getLangString('Updated_By', $language_strings)}}:
	<label class="label label-default">{{$ad->updatedByUser!=null? $ad->updatedByUser->username():''}}	</label>
	<br>

	{{App\Global_var::getLangString('Created_At', $language_strings)}}:
	<label class="label label-default">{{date('M j Y h:i', strtotime($ad->created_at))}}</label>
	{{App\Global_var::getLangString('Updated_At', $language_strings)}}:
	<label class="label label-default">{{date('M j Y h:i', strtotime($ad->updated_at))}}</label> 		 

</div>
</div>
<div class="col-md-12">
<hr>
	<div class="col-md-4 pull-right">

	<a href="{{route('ads.edit', $ad->id)}}" value="{{$ad->id}}" class="get btn btn-sm btn-primary" nextUrl="{{route('ads.edit', $ad->id)}}"><i class="fa fa-edit"></i> 
		{{App\Global_var::getLangString('Edit', $language_strings)}}
	</a>
	<a href="{{route('ads.delete', $ad->id)}}" value="{{$ad->id}}" class="get btn btn-sm btn-danger" nextUrl="{{route('ads.delete', $ad->id)}}"><i class="fa fa-trash"></i> 
		{{App\Global_var::getLangString('Delete', $language_strings)}}
	</a>
</div>
</div>
		</div>
	</div>

</div>


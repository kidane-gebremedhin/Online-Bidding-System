<div class="col-md-12">
	<div class="panel panel-success">
		<div class="panel-heading">
			{{App\Global_var::getLangString('Detail', $language_strings)}}

			<a href="{{route('companies.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('companies.index')}}"><i class="fa fa-eye"></i>  
				{{App\Global_var::getLangString('List', $language_strings)}}
			</a> 		
		</div>
		<div class="panel-body">
			<table class="table">
				<tbody>
					<tr>
						<td colspan="2"><center><img src="{{asset('images/'.$company->logo)}}" alt="Project name" class="logo" style="background-color: green; border-radius: 50%; height: 200px; width: 300px; "/></center></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Name', $language_strings)}}</strong></td><td><h4>{{$company->name}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Address', $language_strings)}}</strong></td><td><h4>{!! $company->locationAddress !!}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Phone_Number', $language_strings)}}</strong></td><td><h4>{{$company->phoneNumber}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Email', $language_strings)}}</strong></td><td><h4>{{$company->email}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Website', $language_strings)}}</strong></td><td><h4>{{$company->website}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Image', $language_strings)}}</strong></td><td><h4><img src="{{asset('images/'.$company->image)}}" alt="Project name" class="logo" style="height:400px; width: 100%; "/></h4></td>
					</tr>
				</tbody>
			</table>

<div class="col-md-12">
<hr>
	<div class="col-md-12">
	{{App\Global_var::getLangString('Created_By', $language_strings)}}:
	<label class="label label-default">{{$company->createdByUser!=null? $company->createdByUser->username():''}}</label>

	{{App\Global_var::getLangString('Updated_By', $language_strings)}}:
	<label class="label label-default">{{$company->updatedByUser!=null? $company->updatedByUser->username():''}}	</label>
	<br>

	{{App\Global_var::getLangString('Created_At', $language_strings)}}:
	<label class="label label-default">{{date('M j Y h:i', strtotime($company->created_at))}}</label>
	{{App\Global_var::getLangString('Updated_At', $language_strings)}}:
	<label class="label label-default">{{date('M j Y h:i', strtotime($company->updated_at))}}</label> 		 

</div>
</div>
<div class="col-md-12">
<hr>
	<div class="col-md-4 pull-right">

	<a href="{{route('companies.edit', $company->id)}}" value="{{$company->id}}" class="get btn btn-sm btn-primary" nextUrl="{{route('companies.edit', $company->id)}}"><i class="fa fa-edit"></i> 
		{{App\Global_var::getLangString('Edit', $language_strings)}}
	</a>
	<a href="{{route('companies.delete', $company->id)}}" value="{{$company->id}}" class="get btn btn-sm btn-danger" nextUrl="{{route('companies.delete', $company->id)}}"><i class="fa fa-trash"></i> 
		{{App\Global_var::getLangString('Delete', $language_strings)}}
	</a>
</div>
</div>
		</div>
	</div>

</div>


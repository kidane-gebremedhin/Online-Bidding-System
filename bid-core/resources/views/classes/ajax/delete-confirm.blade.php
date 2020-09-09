<div class="col-md-12">
	<div class="col-md-8">
		<h4 class="text-danger">
			{{App\Global_var::getLangString('Confirm_Delete', $language_strings)}}
			<a href="{{route('classes.index')}}" class="get btn btn-default btn-sm" nextUrl="{{route('classes.destroy', $class->id)}}"> 
				{{App\Global_var::getLangString('No', $language_strings)}}
			</a>
			<a href="{{route('classes.destroy', $class->id)}}" value="{{$class->id}}" class="get btn btn-danger btn-sm" nextUrl="{{route('classes.index')}}"><i class="fa fa-trash"></i> 
				{{App\Global_var::getLangString('Yes', $language_strings)}}
			</a>
		</h4>	
	</div>
		<div class="col-md-8">
			<div class="panel panel-success">
				<div class="panel-heading">
					{{App\Global_var::getLangString('Detail', $language_strings)}}
					<a href="{{route('classes.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('classes.index')}}"><i class="fa fa-eye"></i> 
						{{App\Global_var::getLangString('List', $language_strings)}}
					</a> 	
				</div>
				<div class="panel-body">
			<table class="table">
				<tbody>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Name', $language_strings)}}</strong></td><td><h4>{{$class->name}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Code', $language_strings)}}</strong></td><td><h4>{{$class->code}}</h4></td>
					</tr>

					<tr>
						<td><strong>{{App\Global_var::getLangString('Description', $language_strings)}}</strong></td><td><h4>{{$class->description}}</h4></td>
					</tr>

				</tbody>
			</table>

<div class="col-md-12">
<hr>
	<div class="col-md-12">
	{{App\Global_var::getLangString('Created_By', $language_strings)}}:
	<label class="label label-default">{{$class->createdByUser!=null? $class->createdByUser->username():''}}</label>

	{{App\Global_var::getLangString('Updated_By', $language_strings)}}:
	<label class="label label-default">{{$class->updatedByUser!=null? $class->updatedByUser->username():''}}	</label>
	<br>

	{{App\Global_var::getLangString('Created_At', $language_strings)}}:
	<label class="label label-default">{{date('M j Y h:i', strtotime($class->created_at))}}</label>
	{{App\Global_var::getLangString('Updated_At', $language_strings)}}:
	<label class="label label-default">{{date('M j Y h:i', strtotime($class->updated_at))}}</label> 		 

</div>
</div>

		</div>
			</div>
		</div>
	</div>

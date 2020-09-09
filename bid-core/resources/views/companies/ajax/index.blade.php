<div id="ajaxContent">
  <div class="col-md-12">
    <div class="col-md-8 panel panel-success">
      <h4><label class="badge bg-green">{{$companies!=null? $companies->count(): 0}}</label> / <label class="badge">{{$companies->total()}}</label> 
        {{App\Global_var::getLangString('Companies', $language_strings)}}
        <a class="get btn btn-success btn-sm navbar-right" href="{{route('companies.create')}}" nextUrl="{{route('companies.create')}}"><i class="fa fa-plus"></i> 
          {{App\Global_var::getLangString('Add', $language_strings)}}
        </a>
      </h4>
      @if(count($companies)>0)
      <table class="table table-striped table-hover">
        <thead>
          <th>#</th>
          <th>
            {{App\Global_var::getLangString('Name', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Phone_Number', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Email', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Website', $language_strings)}}
          </th>
          <th></th>
        </thead>
        <tbody>
          <?php $count=1; ?>
          @foreach($companies as $company)
          <tr>
            <td>{{$count++}}</td>
            <td>{{$company->name}}</td>
            <td>{{$company->phoneNumber}}</td>
            <td>{{$company->email}}</td>
            <td>{{$company->website}}</td>
            <td>			
              <ul class="nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">
                    {{App\Global_var::getLangString('Actions', $language_strings)}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-companymenu pull-right">
                    <li>
                      <a class="get btn btn-lg" href="{{route('companies.show', $company->id)}}" value="{{$company->id}}" nextUrl="{{route('companies.show', $company->id)}}">
                        <i class="fa fa-eye"></i> 
                        {{App\Global_var::getLangString('View', $language_strings)}}
                      </a>
                    </li>
                    <li>
                      <a class="get btn btn-lg" href="{{route('companies.edit', $company->id)}}" value="{{$company->id}}" nextUrl="{{route('companies.edit', $company->id)}}">
                        <i class="fa fa-edit"></i> 
                        {{App\Global_var::getLangString('Edit', $language_strings)}}
                      </a>
                    </li>
                    <li><a class="get btn btn-lg" href="{{route('companies.delete', $company->id)}}" value="{{$company->id}}" nextUrl="{{route('companies.delete', $company->id)}}"><i class="fa fa-trash"></i> 
                      {{App\Global_var::getLangString('Delete', $language_strings)}}
                    </a></li>
                  </ul>
                </li>
              </ul>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <div class="col-md-12"><hr><h4 class="col-md-offset-2">
        {{App\Global_var::getLangString('List_Not_Found', $language_strings)}}
      </h4></div>
      @endif
    </div>
  </div>
  <div class="col-md-8">
    <center>
      {{$companies->links()}}
    </center>
  </div>
</div>

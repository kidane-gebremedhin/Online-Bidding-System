<div id="ajaxContent">
  <div class="col-md-12">
    <div class="col-md-8 panel panel-success">
      <h4><label class="badge bg-green">{{$business_categories!=null? $business_categories->count(): 0}}</label> / <label class="badge">{{$business_categories->total()}}</label> 
        {{App\Global_var::getLangString('Business_Categories', $language_strings)}}
        <a class="get btn btn-success btn-sm navbar-right" href="{{route('business_categories.create')}}" nextUrl="{{route('business_categories.create')}}"><i class="fa fa-plus"></i> 
          {{App\Global_var::getLangString('Add', $language_strings)}}
        </a>
      </h4>
      @if(count($business_categories)>0)
      <table class="table table-striped table-hover">
        <thead>
          <th>#</th>
          <th>
            {{App\Global_var::getLangString('Name', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Code', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Description', $language_strings)}}
          </th>
          <th></th>
        </thead>
        <tbody>
          <?php $count=1; ?>
          @foreach($business_categories as $business_category)
          <tr>
            <td>{{$count++}}</td>
            <td>{{$business_category->name}}</td>
            <td>{{$business_category->code}}</td>
            <td>{{strlen($business_category->description)>50? substr($business_category->description, 0, 50).'...': $business_category->description}}
            </td>
            <td>			
              <ul class="nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">
                    {{App\Global_var::getLangString('Actions', $language_strings)}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-classmenu pull-right">
                    <li>
                      <a class="get btn btn-lg" href="{{route('business_categories.show', $business_category->id)}}" value="{{$business_category->id}}" nextUrl="{{route('business_categories.show', $business_category->id)}}">
                        <i class="fa fa-eye"></i> 
                        {{App\Global_var::getLangString('View', $language_strings)}}
                      </a>
                    </li>
                    <li>
                      <a class="get btn btn-lg" href="{{route('business_categories.edit', $business_category->id)}}" value="{{$business_category->id}}" nextUrl="{{route('business_categories.edit', $business_category->id)}}">
                        <i class="fa fa-edit"></i> 
                        {{App\Global_var::getLangString('Edit', $language_strings)}}
                      </a>
                    </li>
                    <li><a class="get btn btn-lg" href="{{route('business_categories.delete', $business_category->id)}}" value="{{$business_category->id}}" nextUrl="{{route('business_categories.delete', $business_category->id)}}"><i class="fa fa-trash"></i> 
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
      {{$business_categories->links()}}
    </center>
  </div>
</div>

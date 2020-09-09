<div id="ajaxContent">
  <div class="col-md-12">
    <div class="col-md-12 panel panel-success">
      <h4><label class="badge bg-green">{{$ads!=null? $ads->count(): 0}}</label> / <label class="badge">{{$ads->total()}}</label> 
        {{App\Global_var::getLangString('Ads', $language_strings)}}
        <a class="get btn btn-success btn-sm navbar-right" href="{{route('ads.create')}}" nextUrl="{{route('ads.create')}}"><i class="fa fa-plus"></i> 
          {{App\Global_var::getLangString('Add', $language_strings)}}
        </a>
      </h4>
      @if(count($ads)>0)
      <table class="table table-striped table-hover">
        <thead>
          <th>#</th>
          <th>
            {{App\Global_var::getLangString('Name', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Date_Created', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Expiration_Date', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Class', $language_strings)}}
          </th>
          <th></th>
        </thead>
        <tbody>
          <?php $count=1; ?>
          @foreach($ads as $ad)
          <tr>
            <td>{{$count++}}</td>
            <td>{{$ad->name}}</td>
            <td>{{$ad->dateCreated}}</td>
            <td>{{$ad->expirationDate}}</td>
            <td>{{$ad->class!=null? $ad->class->name: ''}}</td>
            </td>
            <td>			
              <ul class="nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">
                    {{App\Global_var::getLangString('Actions', $language_strings)}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-admenu pull-right">
                    <li>
                      <a class="get btn btn-lg" href="{{route('ads.show', $ad->id)}}" value="{{$ad->id}}" nextUrl="{{route('ads.show', $ad->id)}}">
                        <i class="fa fa-eye"></i> 
                        {{App\Global_var::getLangString('View', $language_strings)}}
                      </a>
                    </li>
                    <li>
                      <a class="get btn btn-lg" href="{{route('ads.edit', $ad->id)}}" value="{{$ad->id}}" nextUrl="{{route('ads.edit', $ad->id)}}">
                        <i class="fa fa-edit"></i> 
                        {{App\Global_var::getLangString('Edit', $language_strings)}}
                      </a>
                    </li>
                    <li><a class="get btn btn-lg" href="{{route('ads.delete', $ad->id)}}" value="{{$ad->id}}" nextUrl="{{route('ads.delete', $ad->id)}}"><i class="fa fa-trash"></i> 
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
      {{$ads->links()}}
    </center>
  </div>
</div>

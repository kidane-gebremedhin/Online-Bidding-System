<div id="ajaxContent">
  <div class="col-md-12">
    <div class="col-md-12 panel panel-success">
      <h4><label class="badge bg-green">{{$tenders!=null? $tenders->count(): 0}}</label> / <label class="badge">{{$tenders->total()}}</label> 
        {{App\Global_var::getLangString('Tenders', $language_strings)}}
        <a class="get btn btn-success btn-sm navbar-right" href="{{route('tenders.create')}}" nextUrl="{{route('tenders.create')}}"><i class="fa fa-plus"></i> 
          {{App\Global_var::getLangString('Add', $language_strings)}}
        </a>
      </h4>
      @if(count($tenders)>0)
      <table class="table table-striped table-hover">
        <thead>
          <th>#</th>
          <th>
            {{App\Global_var::getLangString('Company', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Title', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Address', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Business_Category', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Date_Bound', $language_strings)}}
          </th>
          <th></th>
        </thead>
        <tbody>
          <?php $count=1; ?>
          @foreach($tenders as $tender)
          <tr>
            <td>{{$count++}}</td>
            <td>{{$tender->company!=null? $tender->company->name:''}}</td>
            <td>{{$tender->title}}</td>
            <td>{{($tender->country!=null? $tender->country->name:'').' > '.($tender->region!=null? $tender->region->name:'').' > '.($tender->zone!=null? $tender->zone->name:'').' > '.($tender->wereda!=null? $tender->wereda->name:'')}}</td>
            <td>{{$tender->businessCategory!=null? $tender->businessCategory->name:''}}</td>
            <td>{{$tender->openingDate.' - '.$tender->closingDate}}</td>
            <td>			
              <ul class="nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">
                    {{App\Global_var::getLangString('Actions', $language_strings)}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-tendermenu pull-right">                        @if($currentUser->isGranted('tenders.show'))
                    <li>
                      <a class="get btn btn-lg" href="{{route('tenders.show', $tender->id)}}" value="{{$tender->id}}" nextUrl="{{route('tenders.show', $tender->id)}}">
                        <i class="fa fa-eye"></i> 
                        {{App\Global_var::getLangString('View', $language_strings)}}
                      </a>
                    </li>
                    @endif
                    @if($currentUser->isGranted('tenders.edit'))
                    <li>
                      <a class="get btn btn-lg" href="{{route('tenders.edit', $tender->id)}}" value="{{$tender->id}}" nextUrl="{{route('tenders.edit', $tender->id)}}">
                        <i class="fa fa-edit"></i> 
                        {{App\Global_var::getLangString('Edit', $language_strings)}}
                      </a>
                    </li>
                    @endif
                    @if($currentUser->isGranted('tenders.destroy'))
                    <li><a class="get btn btn-lg" href="{{route('tenders.delete', $tender->id)}}" value="{{$tender->id}}" nextUrl="{{route('tenders.delete', $tender->id)}}"><i class="fa fa-trash"></i> 
                      {{App\Global_var::getLangString('Delete', $language_strings)}}
                    </a></li>
                    @endif
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
      {{$tenders->links()}}
    </center>
  </div>
</div>

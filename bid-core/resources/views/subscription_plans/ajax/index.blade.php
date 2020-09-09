<div id="ajaxContent">
  <div class="col-md-12">
    <div class="col-md-8 panel panel-success">
      <h4><label class="badge bg-green">{{$subscription_plans!=null? $subscription_plans->count(): 0}}</label> / <label class="badge">{{$subscription_plans->total()}}</label> 
        {{App\Global_var::getLangString('Subscription_Plans', $language_strings)}}
        <a class="get btn btn-success btn-sm navbar-right" href="{{route('subscription_plans.create')}}" nextUrl="{{route('subscription_plans.create')}}"><i class="fa fa-plus"></i> 
          {{App\Global_var::getLangString('Add', $language_strings)}}
        </a>
      </h4>
      @if(count($subscription_plans)>0)
      <table class="table table-striped table-hover">
        <thead>
          <th>#</th>
          <th>
            {{App\Global_var::getLangString('Name', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Description', $language_strings)}}
          </th>
          <th></th>
        </thead>
        <tbody>
          <?php $count=1; ?>
          @foreach($subscription_plans as $subscription_plan)
          <tr>
            <td>{{$count++}}</td>
            <td>{{$subscription_plan->name}}</td>
            <td>{!! strlen($subscription_plan->description)>50? substr($subscription_plan->description, 0, 50).'...': $subscription_plan->description !!}
            </td>
            <td>			
              <ul class="nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">
                    {{App\Global_var::getLangString('Actions', $language_strings)}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-subscription_planmenu pull-right">
                    <li>
                      <a class="get btn btn-lg" href="{{route('subscription_plans.show', $subscription_plan->id)}}" value="{{$subscription_plan->id}}" nextUrl="{{route('subscription_plans.show', $subscription_plan->id)}}">
                        <i class="fa fa-eye"></i> 
                        {{App\Global_var::getLangString('View', $language_strings)}}
                      </a>
                    </li>
                    <li>
                      <a class="get btn btn-lg" href="{{route('subscription_plans.edit', $subscription_plan->id)}}" value="{{$subscription_plan->id}}" nextUrl="{{route('subscription_plans.edit', $subscription_plan->id)}}">
                        <i class="fa fa-edit"></i> 
                        {{App\Global_var::getLangString('Edit', $language_strings)}}
                      </a>
                    </li>
                    <li><a class="get btn btn-lg" href="{{route('subscription_plans.delete', $subscription_plan->id)}}" value="{{$subscription_plan->id}}" nextUrl="{{route('subscription_plans.delete', $subscription_plan->id)}}"><i class="fa fa-trash"></i> 
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
      {{$subscription_plans->links()}}
    </center>
  </div>
</div>

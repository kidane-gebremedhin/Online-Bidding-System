<style type="text/css">
    .dashboard-menus{
        border-bottom: 10px solid  #94b8b8;
        border-right: 10px solid  #94b8b8;
        border-radius: 10px 20px; 
    }
    .dashboard-menus:hover{
        border-left: 10px solid  #94b8b8;
        border-right: none;

    }
</style>
<div class="col-md-12">
<div class="panel-success">
     <!-- <div class="panel-heading">
        <h3 class="panel-title">{{App\Global_var::getLangString('Dashboard', $language_strings)}} - <small style="font-size: 13px">{{App\Global_var::getLangString('Control_Panel', $language_strings)}}</small></h3>
    </div> -->
<div class="panel-body">
<div class="col-md-12">
@if($currentUser->isGranted('users.approveNewUser') || $currentUser->isGranted('documents.approveNewDocument'))
    <a class="get" href="{{route('approvals_intro')}}">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="dashboard-menus panel-body alert-warning_">
                <div class="col-xs-12">
                    <img src="{{asset('images/icons/approvals-3.png')}}" style="width: 100%;height: 105px;">
                </div>
                
            <div class="col-xs-12" >
                <h4>{{App\Global_var::getLangString('Approvals', $language_strings)}} <label class="unapproved_users_and_documents badge bg-orange"></label></h4>
            </div>
            </div>
        </div>
    </div>
    </a>
@endif
@if($currentUser->isGranted('tenders.index'))
    <a class="get" href="{{route('tenders.index')}}">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="dashboard-menus panel-body alert-success_">
                <div class="col-xs-12">
                    <img src="{{asset('images/icons/tenders.png')}}" style="width: 100%;height: 105px;">
                </div>
                
            <div class="col-xs-12" >
                <h4>{{App\Global_var::getLangString('Tenders', $language_strings)}} <label class="total_documents badge bg-orange"></label></h4>
            </div>
            </div>
        </div>
    </div>
    </a>
    <a class="get" href="{{route('tenders.pined')}}">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="dashboard-menus panel-body alert-success_">
                <div class="col-xs-12">
                    <img src="{{asset('images/icons/tenders.png')}}" style="width: 100%;height: 105px;">
                </div>
                
            <div class="col-xs-12" >
                <h4>{{App\Global_var::getLangString('Pinned_Tenders', $language_strings)}} <label class="pinned_documents badge bg-orange">{{count($currentUser->pinedTenders)}}</label></h4>
            </div>
            </div>
        </div>
    </div>
    </a><a class="get" href="{{route('tenders.liked')}}">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="dashboard-menus panel-body alert-success_">
                <div class="col-xs-12">
                    <img src="{{asset('images/icons/tenders.png')}}" style="width: 100%;height: 105px;">
                </div>
                
            <div class="col-xs-12" >
                <h4>{{App\Global_var::getLangString('Liked_Tenders', $language_strings)}} <label class="liked_documents badge bg-orange">{{count($currentUser->likedTenders)}}</label></h4>
            </div>
            </div>
        </div>
    </div>
    </a>
@endif
@if($currentUser->isGranted('users.index'))
    <a class="get" href="{{route('users.index')}}">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="dashboard-menus panel-body alert-danger_">
                <div class="col-xs-12">
                    <img src="{{asset('images/icons/users-3.png')}}" style="width: 100%;height: 105px;">
                </div>
                
            <div class="col-xs-12" >
                <h4>{{App\Global_var::getLangString('Users', $language_strings)}} <label class="total_users badge bg-orange"></label></h4>
            </div>
            </div>
        </div>
    </div>
    </a>
@endif
@if($currentUser->isGranted('companies.index'))
    <a class="get" href="{{route('companies.index', 'Video')}}">
    <div class="col-md-3">
        <div class="dashboard-menus panel panel-info">
            <div class="panel-body alert-success_">
                <div class="col-xs-12">
                    <img src="{{asset('images/icons/companies.png')}}" style="width: 100%;height: 105px;">
                </div>
                
            <div class="col-xs-12" >
                <h4>{{App\Global_var::getLangString('Companies', $language_strings)}} <label class="video_documents badge bg-orange"></label></h4>
            </div>
            </div>
        </div>
    </div>
    </a>
@endif
</div>

<div class="col-md-12">
@if($currentUser->isGranted('logs.logsAll'))
    <a class="get" href="{{route('logs.logsAll')}}">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="dashboard-menus panel-body alert-info_">
                <div class="col-xs-12">
                    <img src="{{asset('images/icons/logs-3.png')}}" style="width: 100%;height: 105px;">
                </div>
                
            <div class="col-xs-12" >
                <h4>{{App\Global_var::getLangString('Logs', $language_strings)}} </h4>
            </div>
            </div>
        </div>
    </div>
    </a>
@endif

</div>

</div>

</div>
</div>

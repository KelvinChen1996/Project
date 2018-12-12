   

@if($login_info->login_status == true)
    <div class="col-xs-12 col-sm-3 col-md-2">
        <div class="row">
            <div class = "portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption">
                        <img alt="" width="30px" class="img-circle" src="{{asset('/public/storage').'/'.$login_info->user_info->avatar}}" />
                        <span class="username username-hide-on-mobile"> <b>{{ $login_info->user_info->full_name }}</b> </span>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="row list-group">

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endif
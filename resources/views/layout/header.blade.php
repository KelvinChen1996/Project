
<!-- <div class="page-header navbar navbar-fixed-top" style="box-shadow: 0 1px 5px 1px rgba(0,0,0,.2);background-color: #f0f0f0;"> -->
    <div class="page-header navbar navbar-fixed-top" >

                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="{{url('/index')}}" >
                            <img  src="{{asset('public/layouts/layout/img/logo_app.png')}}" alt="logo" class="logo-default" style="width: 100px;line-height: 200px;margin-top: 8px" /></a>
                        
                    </div>

                  
                     
                    <form class="search-form search-form-expanded" action="" method="post" id="search" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="product_name" value="" style="color: white;">
                             <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit" form="search">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>

                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                       
                        <ul class="nav navbar-nav pull-right">
                           
                            @if($login_info->login_status == false)
                            <li class="dropdown dropdown-user">
                                <a href="{{url('/login_page')}}" style="color:white;">
                                    <span class="username"> <b>Login</b> </span>
                                    <i class="icon-login"></i>
                                </a>
                               
                            </li>
                           <!--  <li class="dropdown dropdown-user">
                                <a href="{{url('/login_page')}}" style="color:white;">
                                    <span class="username"> <b>Register</b> </span>
                                    <i class="icon-user-follow"></i>
                                </a>
                            </li> -->
                            
                            @else
                           <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-bell"></i>
                                        <span class="badge badge-default"></span>                               
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- <li>
                                        <a href="{{url('/purchase')}}" class="list-group-item"> Purchase </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="list-group-item"> Request for Quotation </a>                  
                                    </li> -->
                                    <li class="external">
                                        <h3>
                                            notifications</h3>
                                        <!-- <a href="page_user_profile_1.html">view all</a> -->
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                            
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-extended" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="fa fa-building-o"></i>
<!--                                     <span class="badge badge-default"> 4 </span>
 -->                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                         <div class="col-md-2">
                                         </div>

                                        <div class="col-md-8" style="width: 100%">
                                            <p><b>My Store</b></p>
                                           
                                        </div>
                                        <div class="col-md-2">
                                            <br>
                                         </div>

                                    </li>
                                </ul>
                            </li>
                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN TODO DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-bag"></i>
                                
                                </a>
                                <ul class="dropdown-menu extended tasks">
                                    <li class="external">
                              
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                       
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="{{asset('/public/storage').'/'.$login_info->user_info->avatar}}" />
                                    <span class="username username-hide-on-mobile"> <b>{{ $login_info->user_info->full_name }}</b> </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        

                                        <a href="{{url('/settings')}}">
                                            <i class="icon-user"></i> Settings </a>
                                    </li>
                                   
                                    <li>
                                        <a href="{{url('/logout')}}">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                           
                            @endif
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>

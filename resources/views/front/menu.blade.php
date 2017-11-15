<div class="header-bottom"><!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left">

                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="{{url('/')}}" class="active">Home</a></li>
                        <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="{{url('/shop')}}">Products</a></li>
                                <li><a href="{{url('/product_details/59356afab6b75128ec007ff5')}}" class="active">Product Details</a></li> 
                                <li><a href="{{url('/checkout')}}">Checkout</a></li> 
                                <li><a href="{{url('/login')}}">Login</a></li> 
                            </ul>
                        </li>

                        <?php /* <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                          <ul role="menu" class="sub-menu">
                          <li><a href="blog.html">Blog List</a></li>
                          <li><a href="blog-single.html">Blog Single</a></li>
                          </ul>
                          </li>
                          <li><a href="404.html">404</a></li>
                         *
                         */ ?>
                        <li><a href="{{url('/contact')}}">Contact</a></li>
                        <li><a href="{{url('/newArrival')}}">New Arrival</a></li>
                    </ul>
                </div>
            </div>
            <form action='{{url('/search')}}' method="post">
                <div class="col-sm-5">
                    <div class="ui-widget search_box pull-right">
                            <input type="text" placeholder="Search" name="search_data" id="proList" class="ui-autocomplete-input" autocomplete="off"/>
                            <i class="glyphicon glyphicon-search" style="margin-top: 10px"></i>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!--/header-bottom-->

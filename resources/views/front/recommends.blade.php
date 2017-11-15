<?php $prods = App\Products::paginate(3);?>
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="item active">	
                                      @foreach($prods as $p)
                                       <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                       <a href="{{url('/product_details')}}/{{$p['_id']}}"> 
                                                           <img src="{{$p->img}}" alt="" /></a>
                                                        <h2>${{$p->price}}</h2>
                                                        <p>  <a href="{{url('/product_details')}}/{{$p['_id']}}">{{$p->name}}</a></p>
                                                        <a href="{{url('/cart/addItem')}}/{{$p['_id']}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                      @endforeach
                                    </div>
                                    <div class="item">	
                                         @foreach($prods as $p)
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <a href="{{url('/product_details')}}/{{$p->id}}"> 
                                                            <img src="{{$p->img}}" alt="" /></a>
                                                        <h2>${{$p->price}}</h2>
                                                        <p>  <a href="{{url('/product_details')}}/{{$p->id}}">{{$p->name}}</a></p>
                                                        <a href="{{url('/cart/addItem')}}/{{$p->id}}" class="btn btn-default add-to-cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            Add to cart</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                      @endforeach
                                      
                                    </div>
                                </div>
                                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>			
            </div>
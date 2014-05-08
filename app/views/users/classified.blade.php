    <style type="text/css">
    .thumbnail{
        margin-top: 20px;
        min-height: 280px;
        padding: 1px 1px 1px 1px;
    }

    input[type=submit].btn-block, input[type=reset].btn-block, input[type=button].btn-block{
        width: 96%;
        margin: auto;
    }

    </style>
    
    <div class="container">
        <div class="services-list row">

            <div class="col-md-3">
                <p class="lead">Classified Name</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">About us</a>
                    <a href="#" class="list-group-item">Contact</a>
                    <a href="#" class="list-group-item">Services</a>
                    <a href="#" class="list-group-item">Promotions</a><br/>
                    <h4>Map<h4/>
                    <iframe width="100%" height="280" frameborder="1" scrolling="yes" marginheight="0" marginwidth="0" src=""></iframe>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
            <!-- start Services -->
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="services"><img src="http://placehold.it/320x150" alt=""></a>
                            {{ Form::open(array('url'=>'users/addtocart', 'class'=>'form-services')) }}
                            <div class="caption">
                                <h4 class="pull-right">฿ 500.00</h4>
                                <h4><a href="services">First Services</a>
                                </h4>
                                <p id="pname">Details for First Services</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><a href="services">reviews</a></p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                                {{ Form::submit('Booking Now', array('class'=>'btn btn-large btn-primary btn-block'))}}
                            </div>
                            {{ Form::close() }} 
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="services"><img src="http://placehold.it/320x150" alt=""></a>
                            {{ Form::open(array('url'=>'users/addtocart', 'class'=>'form-services')) }}
                            <div class="caption">
                                <h4 class="pull-right">฿ 500.00</h4>
                                <h4><a href="services">Second Services</a>
                                </h4>
                                <p id="pname">Details for Second Services</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><a href="services">reviews</a></p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                                {{ Form::submit('Booking Now', array('class'=>'btn btn-large btn-primary btn-block'))}}
                            </div>
                            {{ Form::close() }} 
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="services"><img src="http://placehold.it/320x150" alt=""></a>
                            {{ Form::open(array('url'=>'users/addtocart', 'class'=>'form-services')) }}
                            <div class="caption">
                                <h4 class="pull-right">฿ 500.00</h4>
                                <h4><a href="services">Third Services</a>
                                </h4>
                                <p id="pname">Details for Third Services</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><a href="services">reviews</a></p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                                {{ Form::submit('Booking Now', array('class'=>'btn btn-large btn-primary btn-block'))}}
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="services"><img src="http://placehold.it/320x150" alt=""></a>
                            {{ Form::open(array('url'=>'users/addtocart', 'class'=>'form-services')) }}
                            <div class="caption">
                                <h4 class="pull-right">฿ 500.00</h4>
                                <h4><a href="services">Fourth Services</a>
                                </h4>
                                <p id="pname">Details for Fourth Services</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><a href="services">reviews</a></p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                                {{ Form::submit('Booking Now', array('class'=>'btn btn-large btn-primary btn-block'))}}
                            </div>
                            {{ Form::close() }} 
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="services"><img src="http://placehold.it/320x150" alt=""></a>
                            {{ Form::open(array('url'=>'users/addtocart', 'class'=>'form-services')) }}
                            <div class="caption">
                                <h4 class="pull-right">฿ 500.00</h4>
                                <h4><a href="services">Fifth Services</a>
                                </h4>
                                <p id="pname">Details for Fifth Services</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><a href="services">reviews</a></p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                                {{ Form::submit('Booking Now', array('class'=>'btn btn-large btn-primary btn-block'))}}
                            </div>
                            {{ Form::close() }} 
                        </div>
                    </div>
            <!-- End Services -->        
                </div>
            </div>

        </div>
    </div>
<style type="text/css">
.container {
width: 95%;
}
/**** LAYOUT ****/
.list-inline>li {
    padding: 0 10px 0 0;
}
.container-pad {
    padding: 30px 15px;
}


/**** MODULE ****/
.bgc-fff {
    background-color: #fff!important;
}
.box-shad {
    -webkit-box-shadow: 1px 1px 0 rgba(0,0,0,.2);
    box-shadow: 1px 1px 0 rgba(0,0,0,.2);
}
.brdr {
    border: 1px solid #ededed;
}

/* Font changes */
.fnt-smaller {
    font-size: .9em;
}
.fnt-lighter {
    color: #bbb;
}

/* Padding - Margins */
.pad-10 {
    padding: 10px!important;
}
.mrg-0 {
    margin: 0!important;
}
.btm-mrg-10 {
    margin-bottom: 10px!important;
}
.btm-mrg-20 {
    margin-bottom: 20px!important;
}

/* Color  */
.clr-535353 {
    color: #535353;
}




/**** MEDIA QUERIES ****/
@media only screen and (max-width: 991px) {
    #property-listings .property-listing {
        padding: 5px!important;
    }
    #property-listings .property-listing a {
        margin: 0;
    }
    #property-listings .property-listing .media-body {
        padding: 10px;
    }
}

@media only screen and (min-width: 992px) {
    #property-listings .property-listing img {
        max-width: 180px;
    }
}
</style>

<!-- Start location bar -->
 <div class="container">
        <ul class="breadcrumb">
            <li><a href="dashboard">Home</a> <span class="divider"></span></li>
            <li><b>Shoptype</b> <span class="divider"></span></li>
        </ul>
<!-- End location bar -->


    <div class="container-fluid" style="background-color:#e8e8e8">
        <div class="container container-pad" id="property-listings">
            
            <div class="row">
              <div class="col-md-12">
                <h1>Shop Type</h1>
              </div>
            </div>
            
            <div class="row">
                <div class="col-sm-6"> 

                    <!-- Begin Listing: 609 W GRAVERS LN-->
                    <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
                        <div class="media">
                            <a class="pull-left" href="shop" target="_parent">
                            <img alt="image" class="img-responsive" src="http://placehold.it/720x540"></a>

                            <div class="clearfix visible-sm"></div>

                            <div>
                                
                                <h4 class="media-heading">
                                  <a href="shop">Shops</a></h4>

                                <p>Details for Shop</p>

                            </div>
                        </div>
                    </div><!-- End Listing-->


                </div>

                <div class="col-sm-6">  

                    <!-- Begin Listing: 1220-32 N HOWARD ST-->
                    <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
                        <div class="media">
                            <a class="pull-left" href="classified" target="_parent">
                            <img alt="image" class="img-responsive" src="http://placehold.it/720x540"></a>

                            <div class="clearfix visible-sm"></div>

                            <div>

                                <h4 class="media-heading">
                                  <a href="classified">Classified</a></h4>

                                <p>Details for Classified</p>

                        </div>
                    </div><!-- End Listing-->
 
                </div><!-- End Col -->
            </div><!-- End row -->
        </div><!-- End container -->
    </div>
</div>    
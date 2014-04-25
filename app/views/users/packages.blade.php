 <style type="text/css"> 

/* Start Show Packages */

.col-md-4 {
  margin: 0 8% 0 6%;
}
.col-sm-4{
 /*margin: 1 10% 0 0;*/
}
.col-sm-offset-4{
  margin-left: 33.33%;
}
.packages{
  float: left;;
  width: 19%;
}
.col-sm-offset-4 {
margin-left: 50% !important;
}
.col-xs-12 {
width: 50% !important;
}
.col-xs-4 {
width: 50% !important;
}


.pricing-table .plan {
  margin-left:0px;
  border-radius: 5px;
  text-align: center;
  background-color: #f3f3f3;
  -moz-box-shadow: 0 0 6px 2px #b0b2ab;
  -webkit-box-shadow: 0 0 6px 2px #b0b2ab;
  box-shadow: 0 0 6px 2px #b0b2ab;
}
 
 .plan:hover {
  background-color: #fff;
  -moz-box-shadow: 0 0 12px 3px #b0b2ab;
  -webkit-box-shadow: 0 0 12px 3px #b0b2ab;
  box-shadow: 0 0 12px 3px #b0b2ab;
}
 
 .plan {
  padding: 20px;
  margin-left:0px;
  color: #ff;
  background-color: #5e5f59;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
}
  
.plan-name-bronze {
  padding: 20px;
  color: #fff;
  background-color: #665D1E;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
 }
  
.plan-name-silver {
  padding: 20px;
  color: #fff;
  background-color: #C0C0C0;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
 }
  
.pricing-table-bronze  {
  padding: 20px;
  color: #fff;
  background-color: #f89406;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
}
  
.pricing-table .plan .plan-name span {
  font-size: 20px;
}
 
.pricing-table .plan ul {
  list-style: none;
  margin: 0;
  -moz-border-radius: 0 0 5px 5px;
  -webkit-border-radius: 0 0 5px 5px;
  border-radius: 0 0 5px 5px;
}
 
.pricing-table .plan ul li.plan-feature {
  padding: 15px 10px;
  border-top: 1px solid #c5c8c0;
  margin-right: 35px;
}
 
.pricing-three-column {
  margin: 0 auto;
  width: 100%;
}
 
.pricing-variable-height .plan {
  float: none;
  margin-left: 2%;
  vertical-align: bottom;
  display: inline-block;
  zoom:1;
  *display:inline;
}
 
.plan-mouseover .plan-name {
  background-color: #4e9a06 !important;
}
 
.btn-plan-select {
  padding: 8px 25px;
  font-size: 18px;
}

/* End Show Packages */

/* Start detail Packages zone*/

@media (min-width: 768px) and (max-width:992px) {
    .container {
    width: initial;
        padding-left: 2em;
        padding-right: 2em;        
  }
}

/* --- Plans ---------------------------- */

.my_planHeader {
    text-align: center;
    color: white;
    padding-top:0.2em;
    padding-bottom:0.2em;
}
.my_planTitle {
    font-size:2em;
    font-weight: bold;
}
.my_planPrice {
    font-size:1.4em;
    font-weight: bold;    
}
.my_planDuration {
    margin-top: -0.6em;
}

@media (max-width: 768px) {
    .my_planTitle {
        font-size:small;
    }    
}

/* --- Features ------------------------- */

.my_feature {
    line-height:2.8em;   
}

@media (max-width: 768px) {
    .my_feature {
        text-align: center
    }
 }

.my_featureRow {
    margin-top: 0.2em;
    margin-bottom: 0.2em;
    border: 0.1em solid rgb(163, 163, 163);
}    

/* --- Plan 1 --------------------------- */
.my_plan1 {
    background: rgb(224,234,242);
}

.my_planHeader.my_plan1 a {
    background: rgb(72, 109, 139);
    color:white;
}

.my_planHeader.my_plan1 {
    background: rgb(105, 153, 193);
    border-bottom: thick solid rgb(72, 109, 139);
}

/* --- Plan 2 --------------------------- */
.my_plan2 {
    background: rgb(230,235,218);
}

.my_planHeader.my_plan2 a {
    background: rgb(108, 131, 62);
    color:white;
}

.my_planHeader.my_plan2 {
    background: rgb(134, 162, 77);
    border-bottom: thick solid rgb(108, 131, 62);
}


.my_planFeature {
    text-align: center;
    font-size: 2em;
}

.my_planFeature i.my_check {
    color: green;
}

/* End detail Packages zone*/

</style>


<div class="packages">&nbsp;</div>
  <div class="container">
      <div class="pricing-table pricing-three-column row">
          <div class="plan col-sm-4 col-lg-4">
            <div class="plan-name-bronze">
              <h2>Plan 1</h2>
              <span>฿1,590 / Month</span>
            </div>
            <ul>
              <li class="plan-feature">Detail 1</li>
              <li class="plan-feature">Detail 2</li>
              <li class="plan-feature"><a href="#" class="btn btn-primary btn-plan-select"><i class="icon-white icon-ok"></i> Select</a></li>
            </ul>
          </div>
          <div style="z-index:55;" class="plan col-sm-4 col-lg-4">
            <div class="plan-name-silver">
              <h2>Plan 2</h2>
              <span>฿1,999 / Month</span>
            </div>
            <ul>
              <li class="plan-feature">Detail 1</li>
              <li class="plan-feature">Detail 2</li>
              <li class="plan-feature"><a href="#" class="btn btn-primary btn-plan-select"><i class="icon-white icon-ok"></i> Select</a></li>
            </ul>
          </div>
      </div>
  </div>
<br/>

 <div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-offset-4 col-sm-8">
            <div class="row">
                <div class="col-xs-4 my_planHeader my_plan1">
                    <div class="my_planTitle">Plan 1</div>
                </div>
                <div class="col-xs-4 my_planHeader my_plan2">
                    <div class="my_planTitle">Plan 2</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row my_featureRow">
        <div class="col-xs-12 col-sm-4 my_feature">
            Feature 1
        </div>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <div class="col-xs-4 col-sm-4 my_planFeature my_plan1">
                    <i class="glyphicon glyphicon-ok"></i>
                </div>
                <div class="col-xs-4 col-sm-4 my_planFeature my_plan2">
                    <i class="glyphicon glyphicon-ok"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row my_featureRow">
        <div class="col-xs-12 col-sm-4 my_feature">
            Feature 2
        </div>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <div class="col-xs-4 col-sm-4 my_planFeature my_plan1">
                    <i class="glyphicon glyphicon-ok"></i>
                </div>
                <div class="col-xs-4 col-sm-4 my_planFeature my_plan2">
                    <i class="fa"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row my_featureRow">
        <div class="col-xs-12 col-sm-4 my_feature">
            Feature 3
        </div>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <div class="col-xs-4 col-sm-4 my_planFeature my_plan1">
                    <i class="fa"></i>
                </div>
                <div class="col-xs-4 col-sm-4 my_planFeature my_plan2">
                    <i class="glyphicon glyphicon-ok"></i>
                </div>
            </div>
        </div>
    </div> 

    <div class="row my_featureRow">
        <div class="col-xs-12 col-sm-4 my_feature">
            Feature 4
        </div>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <div class="col-xs-4 col-sm-4 my_planFeature my_plan1">
                    <i class="glyphicon glyphicon-ok"></i>
                </div>
                <div class="col-xs-4 col-sm-4 my_planFeature my_plan2">
                    <i class="glyphicon glyphicon-ok"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row my_featureRow">
        <div class="col-xs-12 col-sm-4 my_feature">
            Feature 5
        </div>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <div class="col-xs-4 col-sm-4 my_planFeature my_plan1">
                    <i class="glyphicon glyphicon-ok"></i>
                </div>
                <div class="col-xs-4 col-sm-4 my_planFeature my_plan2">
                    <i class="fa"></i>
                </div>
            </div>
        </div>
    </div>

</div>
<br/>



  
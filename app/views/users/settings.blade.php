<script type="text/javascript">
$(document).ready(function(){
  $(".content").hide();
  //toggle the componenet with class msg_body
  $(".heading").click(function()
  {
   $(this).next(".content").slideToggle(500);
  });
  // For Purchase order history button
   $("#purchase-his-btn").click(function(){
    var start_date = $("#dpd1").val();
    var end_date = $("#dpd2").val();
    $.post("/orders/search/{{Auth::user()->user_id}}",{'start_date':start_date,'end_date':end_date},function(result){
      $("#purchase-his-result").html(result);
    });
  });

});
</script>

<!-- Stare Date Picker -->
<link href="css/datepicker.css" rel="stylesheet">

      <script type="text/javascript" src="js/google-code-prettify/prettify.js"></script>
      <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>

 <script type="text/javascript">
  if (top.location != location) {
    top.location.href = document.location.href ;
  }
    $(function(){
      window.prettyPrint && prettyPrint();
      $('#dp1').datepicker({
        format: 'mm-dd-yyyy'
      });
      $('#dp01').datepicker({
        format: 'yyyy-mm-dd'
      });
      $('#dp02').datepicker({
        format: 'yyyy-mm-dd'
      });
      $('#dp2').datepicker();
      $('#dp3').datepicker();
      $('#dp3').datepicker();
      $('#dpYears').datepicker();
      $('#dpMonths').datepicker();
      
      
      var startDate = new Date(2012,1,20);
      var endDate = new Date(2111,1,25);
      $('#dp4').datepicker()
        .on('changeDate', function(ev){
          if (ev.date.valueOf() > endDate.valueOf()){
           $('#alert').show().find('strong').text('The start date can not be greater then the end date');
          } else {
            $('#alert').hide();
            startDate = new Date(ev.date);
            $('#startDate').text($('#dp4').data('date'));
          }
          $('#dp4').datepicker('hide');
        });
      $('#dp5').datepicker()
        .on('changeDate', function(ev){
          if (ev.date.valueOf() < startDate.valueOf()){
            $('#alert').show().find('strong').text('The end date can not be less then the start date');
          } else {
            $('#alert').hide();
            endDate = new Date(ev.date);
            $('#endDate').text($('#dp5').data('date'));
          }
          $('#dp5').datepicker('hide');
        });

        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
         
        var checkin = $('#dpd1').datepicker({
          onRender: function(date) {
            return nowTemp.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {

          //if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate());
            checkout.setValue(newDate);
          //}
          checkin.hide();

          $('#dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('#dpd2').datepicker({
          onRender: function(date) {
            return date.valueOf() < checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
    });
  </script>
  
      <!-- End Date Picker -->


<div class="settings-page well">
  {{ Form::open(array('url'=>'users/settings', 'class'=>'form-user-settings','id'=>'tab1')) }}
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">General</a></li>
      <li><a href="#payments" data-toggle="tab">Payments</a></li>
      <li><a href="#social" data-toggle="tab">Social networks</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">

      <!-- Start Home -->
      <div class="tab-pane active in" id="home">
         <div class="wrapper-form panel-body" >
             <div><h4>Settings General</h4></div>
             <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i> Newsletter</span>
              <div class="btn-group" data-toggle="buttons">

                  <label class="btn btn-primary {{@$setting_value->newsletter_opt == 1 ? 'active' :''}} ">
                     {{ Form::radio('newsletter_opt', '1', @$setting_value->newsletter_opt == 1 ? true : false, array('id'=>'option1', 'class'=>'radio')) }}On
                  
                  </label>
                  <label class="btn btn-primary {{@$setting_value->newsletter_opt != 1 ? 'active' :''}} ">
                  {{ Form::radio('newsletter_opt', '0', @$setting_value->newsletter_opt != 1 ? true : false, array('id'=>'option2', 'class'=>'radio')) }}Off
                 
                  </label>
              </div>
           </div>
           <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i> Message&nbsp;&nbsp;</span>
              <div class="btn-group" data-toggle="buttons">

                   <label class="btn btn-primary {{@$setting_value->msg_opt == 1 ? 'active' :''}} ">
                     {{ Form::radio('msg_opt', '1', @$setting_value->msg_opt == 1 ? true : false, array('id'=>'option1', 'class'=>'radio')) }}On
                  
                  </label>
                  <label class="btn btn-primary {{@$setting_value->msg_opt != 1 ? 'active' :''}} ">
                  {{ Form::radio('msg_opt', '0', @$setting_value->msg_opt != 1 ? true : false, array('id'=>'option2', 'class'=>'radio')) }}Off
                 
                  </label>

              </div>
          </div>
        </div>
      </div>
      <!-- End Home -->

      <!-- Start payments -->

        <div class="tab-pane" id="payments">
         <div class="wrapper-form panel-body" >

      <!-- Start payments option -->
     <div class="well">
            <div><h4>Payment method</h4></div>
 
    <!-- Start Bank Tranfer -->
    <p class="heading">Bank Tranfer</p> 
    <div class="content"> 
      <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> ชื่อธนาคาร / Bank Name:</span>
          {{ Form::text('bank_account["bank_name"]', @$setting_value->bank_account->bank_name,  array('id'=>'bankname', 'class'=>'form-control', 'placeholder'=>'ชื่อธนาคาร / Bank Name')) }}
          </div>
      <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> เลขบัญชี / Bank no.:</span>
          {{ Form::text('bank_account["bank_no"]', @$setting_value->bank_account->bank_no,  array('id'=>'bankno', 'class'=>'form-control', 'placeholder'=>'เลขบัญชี / Bank no.')) }}
          </div>
      <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> ชื่อบัญชี / Acc. Name:</span>
          {{ Form::text('bank_account["bank_account_name"]', @$setting_value->bank_account->bank_account_name,  array('id'=>'name', 'class'=>'form-control', 'placeholder'=>'ชื่อบัญชี / Acc. Name')) }}
      </div>
      <br/> 
    </div>
    <!-- End Bank Tranfer --> 
    <!-- Start Payspal --> 
    <p class="heading">Paypal</p> 
    <div class="content"> 
      <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> อีเมล / email:</span>
          {{ Form::text('paypal_account', @$setting_value->paypal_account,  array('id'=>'emailpaypal', 'class'=>'form-control', 'placeholder'=>'อีเมล / email')) }}
          </div>
  
      <br/> 
    </div>
    <!-- End Paypal --> 
    <!-- Start Paysbuy --> 
    <p class="heading">Paysbuy</p> 
    <div class="content"> 
      <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> อีเมล / email:</span>
          {{ Form::text('paysbuy_account', @$setting_value->paysbuy_account,  array('id'=>'emailpaysbuy', 'class'=>'form-control', 'placeholder'=>'อีเมล / email')) }}
          </div>
  
      <br/> 
    </div>
    <!-- End Paysbuy -->
    <!-- Start Credit Card -->
    <p class="heading">Credit Card</p> 
    <div class="content"> 
    <fieldset>
      <div class="input-group col-sm-12">
        <label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name='creditcard["creditcard_name"]' id="creditcard_name" placeholder="Card Holder's Name" value="{{{@$setting_value->creditcard->creditcard_name}}}">
        </div>
      </div>
      <div class="input-group col-sm-12">
        <label class="col-sm-3 control-label" for="card-number">Card Number</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name='creditcard["creditcard_no"]' id="card-number" placeholder="Debit/Credit Card Number" value="{{{@$setting_value->creditcard->creditcard_no}}}">
        </div>
      </div>
      <div class="input-group col-sm-12">
        <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="select-expiry-month col-xs-3">
             
            {{ Form::select('creditcard["creditcard_expr_m"]',array(''=>'Month','01'=>'Jan (01)','02'=>'Feb (02)','03'=>'Mar (03)','04'=>'Apr (04)','05'=>'May (05)','06'=>'June (06)','07'=>'July (07)','08'=>'Aug (08)','09'=>'Sep (09)','10'=>'Oct (10)','11'=>'Nov (11)','12'=>'Dec (12)') ,@$setting_value->creditcard->creditcard_expr_m ? $setting_value->creditcard->creditcard_expr_m :'',array('class'=>'form-control')) }}

            </div>
            <div class="select-expiry-year col-xs-3">
            {{ Form::select('creditcard["creditcard_expr_y"]',array(''=>'Year','14'=>'2014','15'=>'2015','16'=>'2016','17'=>'2017','18'=>'2018','19'=>'2019','20'=>'2020','21'=>'2021','22'=>'2022','23'=>'2023') ,@$setting_value->creditcard->creditcard_expr_y ? $setting_value->creditcard->creditcard_expr_y :'',array('class'=>'form-control')) }}
            </div>
          </div>
        </div>
      </div>
      <div class="input-group col-sm-12">
        <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name='creditcard["creditcard_cvv"]' id="cvv" placeholder="Security Code" value="{{{@$setting_value->creditcard->creditcard_cvv}}}">
        </div>
      </div>
     
    </fieldset>
   
    </div>
    <!-- End Credit Card -->
</div> 
      <!-- End payments option -->

            <div class="well">
             <div><br/><h4>Purchase History</h4></div>  
              <div class="phist-start-d"><b>Start date:</b> {{ Form::text('start_date', null,  array('id'=>'dpd1', 'class'=>'form-control')) }}</div>
              <div class="phist-end-d"><b>End date:</b> {{ Form::text('end_date', null,  array('id'=>'dpd2', 'class'=>'form-control')) }}</div>  
            </div>

            <div id="purchase-his-result">0 Results</div><br/>
         
          {{ Form::button('View', array('class'=>'btn btn-primary','id'=>'purchase-his-btn'))}}
              </div>
            </div>  
      <!-- End payments -->


        <!-- Start social -->
        <div class="tab-pane" id="social">
         <div class="wrapper-form panel-body">
            <div><h4>Social network Settings</h4></div>
             <div class="input-group">
             <span class="input-group-addon">facebook:</span>
              <div class="btn-group" data-toggle="buttons">
               {{ Form::text('social_networks["facebook"]', @$setting_value->social_networks->facebook,  array('id'=>'fbacc', 'class'=>'form-control', 'placeholder'=>'Facebook Account')) }}
               
                </div>
             </div>
             <div class="input-group">
             <span class="input-group-addon">Twitter:</span>
              <div class="btn-group" data-toggle="buttons">
                {{ Form::text('social_networks["twitter"]', @$setting_value->social_networks->twitter,  array('id'=>'twacc', 'class'=>'form-control', 'placeholder'=>'Twitter Account')) }}
              
                </div>
             </div>
             <div class="input-group">
             <span class="input-group-addon">Google+:</span>
              <div class="btn-group" data-toggle="buttons">
                 {{ Form::text('social_networks["googleplus"]', @$setting_value->social_networks->googleplus,  array('id'=>'ggacc', 'class'=>'form-control', 'placeholder'=>'Google Account')) }}
                </div>
             </div>
             <div class="input-group">
             <span class="input-group-addon">Instagram:</span>
              <div class="btn-group" data-toggle="buttons">
                {{ Form::text('social_networks["ig"]', @$setting_value->social_networks->ig,  array('id'=>'inacc', 'class'=>'form-control', 'placeholder'=>'Instagram Account')) }}
                </div>
             </div> 
             <div class="input-group">
             <span class="input-group-addon">Line:</span>
              <div class="btn-group" data-toggle="buttons">
                {{ Form::text('social_networks["line"]', @$setting_value->social_networks->line,  array('id'=>'liacc', 'class'=>'form-control', 'placeholder'=>'Line Account')) }}
                </div>
             </div>       
         </div>
        </div>
        <!-- End social -->

      <div class="tab-pane fade" id="profile">
      
      </div>
  </div>
   {{ Form::submit('Submit', array('class'=>'btn btn-primary'))}}
   {{ Form::close() }}
</div>



  
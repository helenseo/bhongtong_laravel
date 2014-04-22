<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery(".content").hide();
  //toggle the componenet with class msg_body
  jQuery(".heading").click(function()
  {
    jQuery(this).next(".content").slideToggle(500);
  });
});
</script>
<style type="text/css"> 
body {
  margin: 20px auto;
  font: 12px Verdana,Arial, Helvetica, sans-serif;
}
.layer1 {
margin: 0;
padding: 0;
width: 500px;
}
 
.heading {
margin: 1px;
color: #fff;
padding: 1% 2%;
border-radius: 4px;
cursor: pointer;
position: relative;
background-color:#428bca;
}
.content {
padding: 5px 10px;
background-color:#fafafa;
}
p { padding: 5px 0; }

.content input[type="submit"] {
  text-align:center;
  width: 55%;
  margin: auto;
}
.input-group-addon{
  width: 30%;
}
.input-group .form-control {
  width: 74% !important;
}
</style>

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


<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">General</a></li>
      <li><a href="#payments" data-toggle="tab">Payments</a></li>
      <li><a href="#social" data-toggle="tab">Social networks</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">

      <!-- Start Home -->
      <div class="tab-pane active in" id="home">
         <div class="wrapper-form panel-body" >
       {{ Form::open(array('url'=>'users/settings', 'class'=>'form-user-settings','id'=>'tab1')) }}
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
       
        {{ Form::submit('Submit', array('class'=>'btn btn-primary'))}}
       {{ Form::close() }}
        </div>
      </div>
      <!-- End Home -->

      <!-- Start payments -->

        <div class="tab-pane" id="payments">
         <div class="wrapper-form panel-body" >

      <!-- Start payments option -->
<div class="well">
            <div><br><h4>Payment method</h4></div>
 
    <!-- Start Bank Tranfer -->
    <p class="heading">Bank Tranfer</p> 
    <div class="content"> 
      {{ Form::open(array('url'=>'users/register', 'class'=>'form-register')) }}
      <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> ชื่อธนาคาร / Bank Name:</span>
          {{ Form::text('username', null,  array('id'=>'bankname', 'class'=>'form-control', 'placeholder'=>'ชื่อธนาคาร / Bank Name')) }}
          </div>
      <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> เลขบัญชี / Bank no.:</span>
          {{ Form::text('username', null,  array('id'=>'bankno', 'class'=>'form-control', 'placeholder'=>'เลขบัญชี / Bank no.')) }}
          </div>
      <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> ชื่อบัญชี / Acc. Name:</span>
          {{ Form::text('username', null,  array('id'=>'name', 'class'=>'form-control', 'placeholder'=>'ชื่อบัญชี / Acc. Name')) }}
      </div>
          {{ Form::submit('Submit', array('class'=>'btn btn-large btn-primary btn-block'))}}
      {{ Form::close() }} 
      <br/> 
    </div>
    <!-- End Bank Tranfer --> 
    <!-- Start Payspal --> 
    <p class="heading">Paypal</p> 
    <div class="content"> 
      {{ Form::open(array('url'=>'users/register', 'class'=>'form-register')) }}
      <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> อีเมล / email:</span>
          {{ Form::text('email', null,  array('id'=>'emailpaypal', 'class'=>'form-control', 'placeholder'=>'อีเมล / email')) }}
          </div>
          {{ Form::submit('Submit', array('class'=>'btn btn-large btn-primary btn-block'))}}
      {{ Form::close() }} 
      <br/> 
    </div>
    <!-- End Paypal --> 
    <!-- Start Paysbuy --> 
    <p class="heading">Paysbuy</p> 
    <div class="content"> 
      {{ Form::open(array('url'=>'users/register', 'class'=>'form-register')) }}
      <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> อีเมล / email:</span>
          {{ Form::text('email', null,  array('id'=>'emailpaysbuy', 'class'=>'form-control', 'placeholder'=>'อีเมล / email')) }}
          </div>
          {{ Form::submit('Submit', array('class'=>'btn btn-large btn-primary btn-block'))}}
      {{ Form::close() }} 
      <br/> 
    </div>
    <!-- End Paysbuy -->
    <!-- Start Credit Card -->
    <p class="heading">Credit Card</p> 
    <div class="content"> 
      {{ Form::open(array('url'=>'users/register', 'class'=>'form-register')) }}
      <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> ชื่อผู้ใช้ / User Name:</span>
          {{ Form::text('username', null,  array('id'=>'bankname', 'class'=>'form-control', 'placeholder'=>'ชื่อธนาคาร / Bank Name')) }}
          </div>
      <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> ชื่อผู้ใช้ / User Name:</span>
          {{ Form::text('username', null,  array('id'=>'bankno', 'class'=>'form-control', 'placeholder'=>'เลขบัญชี / Bank no.')) }}
          </div>
      <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> ชื่อผู้ใช้ / User Name:</span>
          {{ Form::text('username', null,  array('id'=>'name', 'class'=>'form-control', 'placeholder'=>'ชื่อบัญชี / Acc. Name')) }}
      </div>
          {{ Form::submit('Submit', array('class'=>'btn btn-large btn-primary btn-block'))}}
      {{ Form::close() }}
      <br/> 
    </div>
    <!-- End Credit Card -->
</div> 
      <!-- End payments option -->

       {{ Form::open(array('url'=>'users/settings', 'class'=>'form-user-settings','id'=>'tab2')) }}
            <div class="well">
             <div><br/><h4>Purchase History</h4></div>  
              <div class="phist-start-d"><b>Start date:</b> {{ Form::text('start_date', null,  array('id'=>'dpd1', 'class'=>'span2')) }}</div>
              <div class="phist-end-d"><b>End date:</b> {{ Form::text('end_date', null,  array('id'=>'dpd2', 'class'=>'span2')) }}</div>  
            </div>

            <div>0 Results</div><br/>
         
          {{ Form::submit('Apply', array('class'=>'btn btn-primary'))}}
       {{ Form::close() }}
              </div>
            </div>  
      <!-- End payments -->


        <!-- Start social -->
        <div class="tab-pane" id="social">
         <div class="wrapper-form panel-body" >
            <div><h4>Social network Settings</h4></div>
             <div class="input-group">
             <span class="input-group-addon">facebook:</span>
              <div class="btn-group" data-toggle="buttons">
                {{ Form::open(array('url'=>'users/settings', 'class'=>'form-user-settings','id'=>'tab2')) }}
                  {{ Form::text('username', null,  array('id'=>'fbacc', 'class'=>'form-control', 'placeholder'=>'Facebook Account')) }}
                  {{ Form::submit('Login', array('class'=>'btn btn-primary'))}}
                {{ Form::close() }}
                </div>
             </div>
             <div class="input-group">
             <span class="input-group-addon">Twitter:</span>
              <div class="btn-group" data-toggle="buttons">
                {{ Form::open(array('url'=>'users/settings', 'class'=>'form-user-settings','id'=>'tab2')) }}
                  {{ Form::text('username', null,  array('id'=>'twacc', 'class'=>'form-control', 'placeholder'=>'Twitter Account')) }}
                  {{ Form::submit('Login', array('class'=>'btn btn-primary'))}}
                {{ Form::close() }}
                </div>
             </div>
             <div class="input-group">
             <span class="input-group-addon">Google+:</span>
              <div class="btn-group" data-toggle="buttons">
                {{ Form::open(array('url'=>'users/settings', 'class'=>'form-user-settings','id'=>'tab2')) }}
                  {{ Form::text('username', null,  array('id'=>'ggacc', 'class'=>'form-control', 'placeholder'=>'Google Account')) }}
                  {{ Form::submit('Login', array('class'=>'btn btn-primary'))}}
                {{ Form::close() }}
                </div>
             </div>
             <div class="input-group">
             <span class="input-group-addon">Instagram:</span>
              <div class="btn-group" data-toggle="buttons">
                {{ Form::open(array('url'=>'users/settings', 'class'=>'form-user-settings','id'=>'tab2')) }}
                  {{ Form::text('username', null,  array('id'=>'inacc', 'class'=>'form-control', 'placeholder'=>'Instagram Account')) }}
                  {{ Form::submit('Login', array('class'=>'btn btn-primary'))}}
                {{ Form::close() }}
                </div>
             </div> 
             <div class="input-group">
             <span class="input-group-addon">Line:</span>
              <div class="btn-group" data-toggle="buttons">
                {{ Form::open(array('url'=>'users/settings', 'class'=>'form-user-settings','id'=>'tab2')) }}
                  {{ Form::text('username', null,  array('id'=>'liacc', 'class'=>'form-control', 'placeholder'=>'Line Account')) }}
                  {{ Form::submit('Login', array('class'=>'btn btn-primary'))}}
                {{ Form::close() }}
                </div>
             </div>       
         </div>
        </div>
        <!-- End social -->

      <div class="tab-pane fade" id="profile">
      <form id="tab2">
          
      </form>
      </div>
  </div>
</div>


  
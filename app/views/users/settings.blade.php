<!-- Stare Date Picker -->
<link href="css/datepicker.css" rel="stylesheet">

      <script src="js/google-code-prettify/prettify.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
  <script>
  if (top.location != location) {
    top.location.href = document.location.href ;
  }
    $(function(){
      window.prettyPrint && prettyPrint();
      $('#dp1').datepicker({
        format: 'mm-dd-yyyy'
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
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }
          checkin.hide();
          $('#dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('#dpd2').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
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
                  <label class="btn btn-primary">
                    {{ Form::radio('newsletter-opt', '1', (Input::old('newsletter-opt') == '1') ? true : false, array('id'=>'option1', 'class'=>'radio')) }}On
                  </label>
                  <label class="btn btn-primary active">
                    {{ Form::radio('newsletter-opt', '0', (Input::old('newsletter-opt') == '0') ? true : false, array('id'=>'option2', 'class'=>'radio')) }}Off
                  </label>
  
              </div>
           </div>
           <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i> Message&nbsp;&nbsp;</span>
              <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-primary">
                    {{ Form::radio('msg-opt', '1', (Input::old('msg-opt') == '1') ? true : false, array('id'=>'option1', 'class'=>'radio')) }}On
                  </label>
                  <label class="btn btn-primary active">
                    {{ Form::radio('msg-opt', '0', (Input::old('msg-opt') == '0') ? true : false, array('id'=>'option2', 'class'=>'radio')) }}Off
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
       {{ Form::open(array('url'=>'users/settings', 'class'=>'form-user-settings','id'=>'tab2')) }}
            <div class="well">
            <div><h4>Purchase History</h4></div>  
              <div style="display:inline-block; width:40%;">Start date {{ Form::text('start_date', null,  array('id'=>'dpd1', 'class'=>'span2')) }}</div>
              <div style="display:inline-block; width:40%;">End date {{ Form::text('end_date', null,  array('id'=>'dpd2', 'class'=>'span2')) }}</div>  
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
             <span class="input-group-addon">facebook account:</span>
              <div class="btn-group" data-toggle="buttons">
                  {{ Form::submit('Login', array('class'=>'btn btn-primary'))}}
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


  
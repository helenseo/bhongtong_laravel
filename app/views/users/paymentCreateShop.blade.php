<!-- Start JS -->
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

<!-- End JS -->

  <div class="tab-pane" id="payments">
   <div class="wrapper-form panel-body" >

      <!-- Start payments option -->
    <div class="payment-shop well">
            <div><br><h4>Payment method</h4></div>
 
    <!-- Start Bank Tranfer -->
    <p class="heading">Bank Tranfer</p> 
    <div class="content"> 
      {{ Form::open(array('url'=>'users/paymentcreateshop', 'class'=>'form-register')) }}
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
      {{ Form::open(array('url'=>'users/paymentcreateshop', 'class'=>'form-register')) }}
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
      {{ Form::open(array('url'=>'users/paymentcreateshop', 'class'=>'form-register')) }}
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
     <form class="form-horizontal" role="form">
    <fieldset>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Card Holder's Name">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-number">Card Number</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-number" id="card-number" placeholder="Debit/Credit Card Number">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="select-expiry-month col-xs-3">
              <select class="form-control col-sm-2" name="expiry-month" id="expiry-month">
                <option>Month</option>
                <option value="01">Jan (01)</option>
                <option value="02">Feb (02)</option>
                <option value="03">Mar (03)</option>
                <option value="04">Apr (04)</option>
                <option value="05">May (05)</option>
                <option value="06">June (06)</option>
                <option value="07">July (07)</option>
                <option value="08">Aug (08)</option>
                <option value="09">Sep (09)</option>
                <option value="10">Oct (10)</option>
                <option value="11">Nov (11)</option>
                <option value="12">Dec (12)</option>
              </select>
            </div>
            <div class="select-expiry-year col-xs-3">
              <select class="form-control" name="expiry-year">
                <option value="13">2013</option>
                <option value="14">2014</option>
                <option value="15">2015</option>
                <option value="16">2016</option>
                <option value="17">2017</option>
                <option value="18">2018</option>
                <option value="19">2019</option>
                <option value="20">2020</option>
                <option value="21">2021</option>
                <option value="22">2022</option>
                <option value="23">2023</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Security Code">
        </div>
      </div>
     
    </fieldset>
     {{ Form::submit('Submit', array('class'=>'btn btn-large btn-primary btn-block'))}}
  </form>
    </div>
    <!-- End Credit Card -->
  </div> 
      <!-- End payments option -->
 </div>
  <!-- End wraper-form -->
</div>
  <!-- End Tab -->
<!-- Start CSS Order Status -->
<style type="text/css">
@import "//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css";

.shop-tracking-status .form-horizontal{margin-bottom:50px}
.shop-tracking-status .order-status{margin-top:150px;position:relative;margin-bottom:150px}
.shop-tracking-status .order-status-timeline{height:12px;border:1px solid #aaa;border-radius:7px;background:#eee;box-shadow:0px 0px 5px 0px #C2C2C2 inset}.shop-tracking-status .order-status-timeline .order-status-timeline-completion{height:8px;margin:1px;border-radius:7px;background:#cf7400;width:0px}
.shop-tracking-status .order-status-timeline .order-status-timeline-completion.c1{width:22%}
.shop-tracking-status .order-status-timeline .order-status-timeline-completion.c2{width:46%}
.shop-tracking-status .order-status-timeline .order-status-timeline-completion.c3{width:70%}
.shop-tracking-status .order-status-timeline .order-status-timeline-completion.c4{width:100%}
.shop-tracking-status .image-order-status{border:1px solid #ddd;padding:7px;box-shadow:0px 0px 10px 0px #999;background-color:#fdfdfd;position:absolute;margin-top:-35px}.shop-tracking-status .image-order-status.disabled{filter:url("data:image/svg+xml;utf8,<svg%20xmlns='http://www.w3.org/2000/svg'><filter%20id='grayscale'><feColorMatrix%20type='matrix'%20values='0.3333%200.3333%200.3333%200%200%200.3333%200.3333%200.3333%200%200%200.3333%200.3333%200.3333%200%200%200%200%200%201%200'/></filter></svg>#grayscale");filter:grayscale(100%);-webkit-filter:grayscale(100%);-moz-filter:grayscale(100%);-ms-filter:grayscale(100%);-o-filter:grayscale(100%);filter:gray;}
.shop-tracking-status .image-order-status.active{box-shadow:0px 0px 10px 0px #cf7400}.shop-tracking-status .image-order-status.active .status{color:#cf7400;text-shadow:0px 0px 1px #777}
.shop-tracking-status .image-order-status .icon{height:40px;width:40px;background-size:contain;background-position:no-repeat}
.shop-tracking-status .image-order-status .status{position:absolute;text-shadow:1px 1px #eee;color:#333;transform:rotate(-30deg);-webkit-transform:rotate(-30deg);width:180px;top:-50px;left:50px}.shop-tracking-status .image-order-status .status:before{font-family:FontAwesome;content:"\f053";padding-right:5px}
.shop-tracking-status .image-order-status-new{left:0}.shop-tracking-status .image-order-status-new .icon{background-image:url('http://raw.github.com/AndrewEastwood/web/master/mpws/web/customer/pb_com_ua/static/img/icon_pack_new.png')}
.shop-tracking-status .image-order-status-active{left:22%}.shop-tracking-status .image-order-status-active .icon{background-image:url('http://raw.github.com/AndrewEastwood/web/master/mpws/web/customer/pb_com_ua/static/img/icon_inprogress.png')}
.shop-tracking-status .image-order-status-intransit{left:45%}.shop-tracking-status .image-order-status-intransit .icon{background-image:url('http://raw.github.com/AndrewEastwood/web/master/mpws/web/customer/pb_com_ua/static/img/icon_transit.png')}
.shop-tracking-status .image-order-status-delivered{left:70%}.shop-tracking-status .image-order-status-delivered .icon{background-image:url('http://raw.github.com/AndrewEastwood/web/master/mpws/web/customer/pb_com_ua/static/img/icon_pack.png')}
.shop-tracking-status .image-order-status-delivered .status{top:85px;left:-180px;transform:rotate(-30deg);-webkit-transform:rotate(-30deg);text-align:right}.shop-tracking-status .image-order-status-delivered .status:before{display:none}
.shop-tracking-status .image-order-status-delivered .status:after{font-family:FontAwesome;content:"\f054";padding-left:5px;vertical-align:middle}
.shop-tracking-status .image-order-status-completed{right:0px}.shop-tracking-status .image-order-status-completed .icon{background-image:url('http://raw.github.com/AndrewEastwood/web/master/mpws/web/customer/pb_com_ua/static/img/icon_complete.png')}
.shop-tracking-status .image-order-status-completed .status{top:85px;left:-180px;transform:rotate(-30deg);-webkit-transform:rotate(-30deg);text-align:right}.shop-tracking-status .image-order-status-completed .status:before{display:none}
.shop-tracking-status .image-order-status-completed .status:after{font-family:FontAwesome;content:"\f054";padding-left:5px;vertical-align:middle}
</style>
<!-- End CSS Order Status -->

<!-- Start CSS -->
<style type="text/css">
.qty {
	float:left;
    width: 100%;
    height: 25%;
    text-align: center;
	margin-bottom:3px;
}
input.qtyplus { float:left; width:20%; height:25%;}
input.qtyminus { float:left; width:20%; height:25%;}

.col-md-offset-3 {
	margin-left: 10% !important;
}
.row{
	margin-left: 0px;
	margin-right: 0px;
}
.qtyminus {
	width: 45%;
	height: 25px;
	font-size: 9px;
}
.qtyplus{
	width: 45%;
	height: 25px;
	font-size: 9px;
}
.slide-image{
	max-width:60%; 
}
</style>
<!-- End CSS -->

<!-- Start JS -->
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="application/javascript">
jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldID = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('#'+fieldID).val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('#'+fieldID).val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('#'+fieldID).val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldID = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('#'+fieldID).val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('#'+fieldID).val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('#'+fieldID).val(0);
        }
    });
});

</script>
<!-- End JS -->

<!-- Start Order Status -->
<div class="row shop-tracking-status"> 
    <div class="col-md-12">
        <div class="well">
            <div class="order-status">
                <div class="order-status-timeline">
                    <!-- class names: c0 c1 c2 c3 and c4 -->
                    <div class="order-status-timeline-completion c1"></div>
                </div>

                <div class="image-order-status image-order-status-new active img-circle">
                    <span class="status">Summary</span>
                    <div class="icon"></div>
                </div>
                <div class="image-order-status image-order-status-active active img-circle">
                    <span class="status">Sign in</span>
                    <div class="icon"></div>
                </div>
                <div class="image-order-status image-order-status-intransit active img-circle">
                    <span class="status">Address</span>
                    <div class="icon"></div>
                </div>
                <div class="image-order-status image-order-status-delivered active img-circle">
                    <span class="status">Shipping</span>
                    <div class="icon"></div>
                </div>
                <div class="image-order-status image-order-status-completed active img-circle">
                    <span class="status">Payment</span>
                    <div class="icon"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Order Status -->

<!-- Start Content Summary -->
<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            
            <div class="row">
              <div class="text-center">
                    <h1>Summary</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                          	<th class="text-center">Product</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Avail.</th>
                            <th class="text-center">Unit Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td class="col-md-7 text-center"><em><img class="slide-image" src="http://placehold.it/100x120" alt="" /></em></td>
                            <td class="col-md-5"><em>Product 01</em></td>
                            <td class="col-md-2" style="text-align: center"> 2 </td>
                            <td class="col-md-2 text-center">130<strong>฿</strong></td>
							<td class="col-md-2 text-center"><?php $i = 1; ?><?php $j = 1; ?>
						     	<input type='text' id="amount_input_{{$i}}" name="product_amount[]" type="text" class="qty" value="1" />
						     	<button value='-' field='amount_input_{{$i}}' class="qtyminus btn btn-default btn-success btn-sm"><span class="glyphicon glyphicon-minus"></span></button>
							    <button type='button' value='+' field='amount_input_{{$i}}' class="qtyplus btn btn-default btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span></button>
						    </td>
                            <td class="col-md-2 text-center">260<strong>฿</strong></td>
                            <td class="col-md-2 text-center">
                            <button class="btn btn-default btn-success"><span class="glyphicon glyphicon-trash"></span></button></td>
                        </tr>
                        <tr>
                          <td class="col-md-7 text-center"><em><img class="slide-image" src="http://placehold.it/100x120" alt="" /></em></td>
                            <td class="col-md-5"><em>Product 02</em></td>
                            <td class="col-md-2" style="text-align: center"> 1 </td>
                            <td class="col-md-2 text-center">8<strong>0฿</strong></td>
                            <td class="col-md-2 text-center"><?php $i = 2; ?><?php $j = 2; ?>
						     	<input type='text' id="amount_input_{{$i}}" name="product_amount[]" type="text" class="qty" value="1" />
						     	<button value='-' field='amount_input_{{$i}}' class="qtyminus btn btn-default btn-success btn-sm"><span class="glyphicon glyphicon-minus"></span></button>
							    <button type='button' value='+' field='amount_input_{{$i}}' class="qtyplus btn btn-default btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span></button>
						    </td>
                            <td class="col-md-2 text-center">260<strong>฿</strong></td>
                            <td class="col-md-2 text-center">
                            <button class="btn btn-default btn-success"><span class="glyphicon glyphicon-trash"></span></button></td>
                        </tr>
                        <tr>
                          <td class="col-md-7 text-center"><em><img class="slide-image" src="http://placehold.it/100x120" alt="" /></em></td>
                            <td class="col-md-5"><em>Product 03</em></td>
                            <td class="col-md-2" style="text-align: center"> 3 </td>
                            <td class="col-md-2 text-center">160<strong>฿</strong></td>
                            <td class="col-md-2 text-center"><?php $i = 3; ?><?php $j = 3; ?>
						     	<input type='text' id="amount_input_{{$i}}" name="product_amount[]" type="text" class="qty" value="1" />
						     	<button value='-' field='amount_input_{{$i}}' class="qtyminus btn btn-default btn-success btn-sm"><span class="glyphicon glyphicon-minus"></span></button>
							    <button type='button' value='+' field='amount_input_{{$i}}' class="qtyplus btn btn-default btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span></button>
						    </td>
                            <td class="col-md-2 text-center">260<strong>฿</strong></td>
                            <td class="col-md-2 text-center">
                            <button class="btn btn-default btn-success"><span class="glyphicon glyphicon-trash"></span></button></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Tax: </strong>
                            </p></td>
                            <td class="text-center">&nbsp;</td>
                            <td class="text-center"><p><strong>600.00฿</strong> </p>
                          <p> <strong>60.94฿</strong></p></td>
                            <td class="text-center">
                            <p>&nbsp;</p></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger">&nbsp;</td>
                            <td class="text-center text-danger"><strong>660.94฿</strong></td>
                            <td class="text-center text-danger"><h4>&nbsp;</h4></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-success btn-lg btn-block">
                    Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Content Summary -->
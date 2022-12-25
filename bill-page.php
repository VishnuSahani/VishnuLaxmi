<?php 
require('base.php');
require('header.php');
 ?>
 <script type="text/javascript">
 	 /////////////////////// number validate
      function ValidateAlpha(evt) {
debugger;
var keyCode = (evt.which) ? evt.which : evt.keyCode
if ((keyCode >= 48 && keyCode <= 57) || keyCode == 8 || keyCode == 46 )
return true;
return false;
}

///////////// upper case
function makeUpperCase_name()
	{
		document.bill_form.customer_name.value= document.bill_form.customer_name.value.toUpperCase();
	}

	function makeUpperCase_address()
	{
		document.bill_form.address.value= document.bill_form.address.value.toUpperCase();
	}
 </script>
<style type="text/css">
	.form-control {
		border-color: red;
		background-color: pink;
	}
</style>
<div class="container" style="background-color:white;">
 	<div class="row">
 		<div class="col-lg-12" style="margin-top: 20px;">
 			<p class="text-center text-light  h3" style="	background-color: #e26228;">Customer Information</p><br>
 			<form method="post" action="print_bill.php" name="bill_form" id="bill_form" target="_blank">
 			<div class="row">
 				<div class="col-lg-6">
 					<label>Date*</label>
 					<input type="text" name="todaydate" value="<?php date_default_timezone_set('Asia/Kolkata'); echo date(" Y-m-d");?>"  class="form-control" readonly>
 				</div>
 				 <div class="col-lg-6">
 				 	<label>Invoice Number*</label>
 				 	<input type="text" name="invoice_no" class="form-control" value="<?php echo rand(1000,9999); ?>" readonly>
 				 </div>

 			</div><!---------------------form row 1---------------->

 					<div class="row">
 				<div class="col-lg-6">
 					<label>Customer's Name*</label>
 					<input type="text" name="customer_name" onkeyup="makeUpperCase_name();" class="form-control" required>
 				</div>
 				 <div class="col-lg-6">
 				 	<label>Mobile Number*</label>
 				 <input type="text" name="mobile_no" class="form-control" maxlength="10" onKeyPress="return ValidateAlpha(event);">
 				 </div>

 			</div><!---------------------form row 2---------------->

 			<div class="form-group">
 				<label>Address</label>
 				<input type="text" name="address" onkeyup="makeUpperCase_address();"  class="form-control">
 			</div><br>
<script type="text/javascript">

	function amount1_fun(val1)
	{
		var net1=$('#net1').val();
		var amount1=parseFloat(net1)*parseFloat(val1);
		//alert(amount1);
		$('#amount1').val(amount1.toFixed(2));
		//$('#amount1').val(amount1);


		total_amt_fun();

	}

	function amount2_fun(val1)
	{
		var net2=$('#net2').val();
		var amount2=parseFloat(net2)*parseFloat(val1);
		//alert(amount1);
		$('#amount2').val(amount2.toFixed(2));
		total_amt_fun();

	}

	function amount3_fun(val1)
	{
		var net3=$('#net3').val();
		var amount3=parseFloat(net3)*parseFloat(val1);
		//alert(amount1);
		$('#amount3').val(amount3.toFixed(2));
		total_amt_fun();

	}

	function amount4_fun(val1)
	{
		var net4=$('#net4').val();
		var amount4=parseFloat(net4)*parseFloat(val1);
		//alert(amount1);
		$('#amount4').val(amount4.toFixed(2));
		total_amt_fun();

	}

	function amount5_fun(val1)
	{
		var net5=$('#net5').val();
		var amount5=parseFloat(net5)*parseFloat(val1);
		//alert(amount1);
		$('#amount5').val(amount5.toFixed(2));
		total_amt_fun();

	}

	function amount6_fun(val1)
	{
		var net6=$('#net6').val();
		var amount6=parseFloat(net6)*parseFloat(val1);
		//alert(amount1);
		$('#amount6').val(amount6.toFixed(2));
		total_amt_fun();

	}

	function amount7_fun(val1)
	{
		var net7=$('#net7').val();
		var amount7=parseFloat(net7)*parseFloat(val1);
		//alert(amount1);
		$('#amount7').val(amount7.toFixed(2));
		total_amt_fun();

	}

	function total_amt_fun()
	{
				var amount1=$('#amount1').val();

				var amount2=$('#amount2').val();
				
				var amount3=$('#amount3').val();
				
				var amount4=$('#amount4').val();
				
				var amount5=$('#amount5').val();
				
				var amount6=$('#amount6').val();
				
				var amount7=$('#amount7').val();
				if(amount1 =="")
				{
					amount1=0;
				}

				if(amount2 =="")
				{
					amount2=0;
				}

				if(amount3 =="")
				{
					amount3=0;
				}

				if(amount4 =="")
				{
					amount4=0;
				}

				if(amount5 =="")
				{
					amount5=0;
				}

				if(amount6 =="")
				{
					amount6=0;
				}

				if(amount7 =="")
				{
					amount7=0;
				}

				if(amount2 =="")
				{
					amount2=0;
				}


				var tot_amo = parseFloat(amount1)+parseFloat(amount2)+parseFloat(amount3)+parseFloat(amount4)+parseFloat(amount5)+parseFloat(amount6)+parseFloat(amount7) ;
				//var cgst  = (parseFloat(tot_amo)* parseFloat(1.5)) / 100;
				//var sgst  = (parseFloat(tot_amo)* parseFloat(1.5)) / 100;

				//$('#cgst').val(cgst);
				//$('#sgst').val(sgst);

				//var tot_amo2 = parseFloat(cgst) + parseFloat(sgst) + parseFloat(tot_amo) ;

				$('#total_amount').val(tot_amo);
				
				

				//alert(amount1);


	}
	function gst_fun(gst_val)
	{
		if(gst_val== "")
		{
			alert('Please Fill Gold or Silver GST value');
			gst_val= 0;
		}
				var total_amount=$('#total_amount').val();

				var grnd_tot = (parseFloat(total_amount)*parseFloat(gst_val) )/100;
				var fn_total = parseFloat(total_amount)+ (parseFloat(grnd_tot)+ parseFloat(grnd_tot));


				//alert(fn_total);
						$('#grand_total_amount').val(fn_total.toFixed(4));



				

	}

	function discount_fun(dis_val)
	{
		if(dis_val== "")
		{
			alert('Please Fill Discount Amount');
			dis_val= 0;
		}
		

				var total_amount=$('#total_amount').val();
			   var gst_val=$('#gst_value').val();


				var grnd_tot = (parseFloat(total_amount)*parseFloat(gst_val) )/100;
				var fn_total = parseFloat(total_amount)+ (parseFloat(grnd_tot)+ parseFloat(grnd_tot));


				if(parseFloat(dis_val)  < parseFloat(fn_total) )
				{
					var discount_v = parseFloat(fn_total) - parseFloat(dis_val)
		$('#grand_total_amount').val(discount_v);
				}
				else
				{
					alert("Please Check Discount Value");

					gst_fun($('#gst_value').val());
				$('#discount').val('');

				}

		}


		
function making_charge_fun(mk_charge)
{
	if(mk_charge== "")
		{
			alert('Please Fill Making Charge Amount');
			mk_charge= 0;
		}
		

				var total_amount=$('#total_amount').val();
			   var gst_val=$('#gst_value').val();
			   			   var discount=$('#discount').val();



				var grnd_tot = (parseFloat(total_amount)*parseFloat(gst_val) )/100;
				var fn_total = parseFloat(total_amount)+ (parseFloat(grnd_tot)+ parseFloat(grnd_tot));

				
					var discount_v = parseFloat(fn_total) - parseFloat(discount);
					var vtvt = parseFloat(discount_v)+ parseFloat(mk_charge);

		$('#grand_total_amount').val(parseFloat(vtvt.toFixed(2)));
			

}

	

</script>
 	
 <p class="text-center text-light h3" style="	background-color: #e26228;">Product Name</p><br>

				<div class="row">
 				<div class="col-lg-5">
 					<label>Item Description 1</label>
 					<input type="text" name="Product1" class="form-control">
 				</div>
 				 <div class="col-lg-1">
 				 	<label>GRO.Wt.</label>
 				 	<input type="text" name="gro1" id="gro1"  class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>
 				  <div class="col-lg-1">
 				 	<label>NET.Wt.</label>
 				 	<input type="text" name="net1" id="net1"  class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>

 				 <div class="col-lg-1">
 				 	<label>Quantity</label>
 				 	<input type="text" name="qty1" id="qty1"  class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>
 				  <div class="col-lg-2">
 				 	<label>Rate</label>
 				 	<input type="text" name="rate1" id="rate1" onkeyup="amount1_fun(this.value);" class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>
 				  <div class="col-lg-2">
 				 	<label>Amount</label>
 				 	<input type="text" name="amount1" id="amount1" class="form-control" readonly>
 				 </div>

 			</div><!---------------------form row item 1---------------->

 			<div class="row">
 				<div class="col-lg-5">
 					<label>Item Description 2</label>
 					<input type="text" name="Product2" class="form-control">
 				</div>

 				 <div class="col-lg-1">
 				 	<label>GRO.Wt.</label>
 				 	<input type="text" name="gro2" id="gro2"  class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>
 				  <div class="col-lg-1">
 				 	<label>NET.Wt.</label>
 				 	<input type="text" name="net2" id="net2"  class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>

 				 <div class="col-lg-1">
 				 	<label>Quantity</label>
 				 	<input type="text" name="qty2" id="qty2" class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>
 				  <div class="col-lg-2">
 				 	<label>Rate</label>
 				 	<input type="text" name="rate2" id="rate2" onkeyup="amount2_fun(this.value);" onKeyPress="return ValidateAlpha(event);" class="form-control">
 				 </div>
 				  <div class="col-lg-2">
 				 	<label>Amount</label>
 				 	<input type="text" name="amount2"  id="amount2" class="form-control" readonly>
 				 </div>

 			</div><!---------------------form row item 2---------------->


 			<div class="row">
 				<div class="col-lg-5">
 					<label>Item Description 3</label>
 					<input type="text" name="Product3" class="form-control">
 				</div>


 				 <div class="col-lg-1">
 				 	<label>GRO.Wt.</label>
 				 	<input type="text" name="gro3" id="gro3"  class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>
 				  <div class="col-lg-1">
 				 	<label>NET.Wt.</label>
 				 	<input type="text" name="net3" id="net3"  class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>

 				 <div class="col-lg-1">
 				 	<label>Quantity</label>
 				 	<input type="text" name="qty3"  id="qty3" class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>
 				  <div class="col-lg-2">
 				 	<label>Rate</label>
 				 	<input type="text" name="rate3"  id="rate3" onKeyPress="return ValidateAlpha(event);" onkeyup="amount3_fun(this.value);" class="form-control">
 				 </div>
 				  <div class="col-lg-2">
 				 	<label>Amount</label>
 				 	<input type="text" name="amount3"  id="amount3" class="form-control" readonly>
 				 </div>

 			</div><!---------------------form row item 3---------------->
 			
 			<div class="row">
 				<div class="col-lg-5">
 					<label>Item Description 4</label>
 					<input type="text" name="Product4" class="form-control">
 				</div>


 				 <div class="col-lg-1">
 				 	<label>GRO.Wt.</label>
 				 	<input type="text" name="gro4" id="gro4"  class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>
 				  <div class="col-lg-1">
 				 	<label>NET.Wt.</label>
 				 	<input type="text" name="net4" id="net4"  class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>

 				 <div class="col-lg-1">
 				 	<label>Quantity </label>
 				 	<input type="text" name="qty4" onKeyPress="return ValidateAlpha(event);" id="qty4" class="form-control">
 				 </div>
 				  <div class="col-lg-2">
 				 	<label>Rate</label>
 				 	<input type="text" name="rate4" onKeyPress="return ValidateAlpha(event);"  id="rate4" onkeyup="amount4_fun(this.value);" class="form-control">
 				 </div>
 				  <div class="col-lg-2">
 				 	<label>Amount</label>
 				 	<input type="text" name="amount4" id="amount4" class="form-control" readonly>
 				 </div>

 			</div><!---------------------form row item 4---------------->
 			
 			<div class="row">
 				<div class="col-lg-5">
 					<label>Item Description 5</label>
 					<input type="text" name="Product5" class="form-control">
 				</div>


 				 <div class="col-lg-1">
 				 	<label>GRO.Wt.</label>
 				 	<input type="text" name="gro5" id="gro5"  class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>
 				  <div class="col-lg-1">
 				 	<label>NET.Wt.</label>
 				 	<input type="text" name="net5" id="net5"  class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>

 				 <div class="col-lg-1">
 				 	<label>Quantity</label>
 				 	<input type="text" name="qty5" onKeyPress="return ValidateAlpha(event);" id="qty5" class="form-control">
 				 </div>
 				  <div class="col-lg-2">
 				 	<label>Rate</label>
 				 	<input type="text" name="rate5" onKeyPress="return ValidateAlpha(event);" id="rate5" onkeyup="amount5_fun(this.value);" class="form-control">
 				 </div>
 				  <div class="col-lg-2">
 				 	<label>Amount</label>
 				 	<input type="text" name="amount5" id="amount5"  class="form-control" readonly>
 				 </div>

 			</div><!---------------------form row item 5---------------->


 			<div class="row">
 				<div class="col-lg-5">
 					<label>Item Description 6</label>
 					<input type="text" name="Product6" class="form-control">
 				</div>


 				 <div class="col-lg-1">
 				 	<label>GRO.Wt.</label>
 				 	<input type="text" name="gro6" id="gro6"  class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>
 				  <div class="col-lg-1">
 				 	<label>NET.Wt.</label>
 				 	<input type="text" name="net6" id="net6"  class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>

 				 <div class="col-lg-1">
 				 	<label>Quantity</label>
 				 	<input type="text" name="qty6" onKeyPress="return ValidateAlpha(event);" id="qty6" class="form-control">
 				 </div>
 				  <div class="col-lg-2">
 				 	<label>Rate</label>
 				 	<input type="text" name="rate6" onKeyPress="return ValidateAlpha(event);" id="rate6" onkeyup="amount6_fun(this.value);" class="form-control">
 				 </div>
 				  <div class="col-lg-2">
 				 	<label>Amount</label>
 				 	<input type="text" name="amount6" id="amount6" class="form-control" readonly>
 				 </div>

 			</div><!---------------------form row item 6--------------->


 			<div class="row">
 				<div class="col-lg-5">
 					<label>Item Description 7</label>
 					<input type="text" name="Product7" class="form-control">
 				</div>


 				 <div class="col-lg-1">
 				 	<label>GRO.Wt.</label>
 				 	<input type="text" name="gro7" id="gro7"  class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>
 				  <div class="col-lg-1">
 				 	<label>NET.Wt.</label>
 				 	<input type="text" name="net7" id="net7"  class="form-control" onKeyPress="return ValidateAlpha(event);">
 				 </div>

 				 <div class="col-lg-1">
 				 	<label>Quantity</label>
 				 	<input type="text" name="qty7" onKeyPress="return ValidateAlpha(event);" id="qty7" class="form-control">
 				 </div>
 				  <div class="col-lg-2">
 				 	<label>Rate<label>
 				 	<input type="text" name="rate7" onKeyPress="return ValidateAlpha(event);" id="rate7" onkeyup="amount7_fun(this.value);" class="form-control">
 				 </div>
 				  <div class="col-lg-2">
 				 	<label>Amount</label>
 				 	<input type="text" name="amount7"  id="amount7" class="form-control" readonly>
 				 </div>

 			</div><!---------------------form row item 7---------------->
 			
 			<div class="form-row">
 				<div class="col-lg-5"></div>
 				 				<div class="col-lg-3"></div>
 				 				<div class="col-lg-2">
 				 					<label><b>Total Amount</b> </label>
 				 				</div>

 				 				<div class="col-lg-2">
 				 					<label></label>
 				 					<input type="text" width="2" name="total_amount" id="total_amount" class="form-control" readonly>
 				 				</div>

 			</div>
 			<!-----------------------total amount--------------------->

 	<div class="form-row">
 			
 				<div class="col-lg-2">
 					  
 				</div>
 				 <div class="col-lg-2">
 				 	
 				 </div>
 				 <script type="text/javascript">
 				 	function gsgst_fun(gval)
 				 	{
 				 		if (gval != "")
 				 		 {
 				 		 	$('#gst_status').text(gval);
 				 		 	$('#show_gst').css("display","")
 				 		 	$('#gst_value').val("");


 				 		 }
 				 	}
 				 </script>
 				 

 				 <div class="col-lg-2">
 				 	 <label>Select Gold GST </label>
 				 	<input type="radio" name="radiobtn" value="Gold" onchange="gsgst_fun(this.value);" class="form-control" required>
 				 						
 				 </div>

 				 <div class="col-lg-2">
 				 		<label>Select Silver GST</label>
 				 		<input type="radio" name="radiobtn" value="Silver" onchange="gsgst_fun(this.value);" class="form-control" required>
 				 						
 				 </div>

 				 <div class="col-lg-4" style="display: none;" id="show_gst">
 				 	<label>	<span id="gst_status"></span> SGST and CGST(%)</label>
 				 	<input type="text" name="gst_value" id="gst_value" class="form-control"	onKeyPress="return ValidateAlpha(event);" onkeyup="gst_fun(this.value);">
 				 						
 				 </div>

 				 	
</div>

<!------------------------------><br>
 			<div class="form-row">

			        <div class="col-lg-4">
 				 		<label>Discount</label>
 				 		<input type="text" width="2" name="discount" id="discount" class="form-control" onKeyPress="return ValidateAlpha(event);" onkeyup="discount_fun(this.value);">
 				 	</div>

 				 	<div class="col-lg-4">
 					        <label>Making Charge</label>
 				 			<input type="text" width="2" name="making_charge" id="making_charge"  class="form-control" onkeyup="making_charge_fun(this.value)" required>
 				    </div>

 				 								
 				    <div class="col-lg-4">
 					        <label>Grand Total</label>
 				 			<input type="text" width="2" name="grand_total_amount" id="grand_total_amount"  class="form-control" readonly>
 				    </div>

 			</div>



			
 			<!-------------------------->		
 			
 			<center><br>
            <button type="button" name="reset" class="btn btn-danger float-left" onclick="reset_form();"> Reset Form</button>
 			<button type="submit" name="bill" class="btn btn-info"> Generate Bill</button>
            </center><br>
 			
 			




		</form>
 		</div><!----------------col 4 close----------------->
 				<script type="text/javascript">
		function reset_form()
		{
		   //$('.form-control').val('');
		   location.reload();

		}
        </script>
 	</div><!----------------row close---------------------->
 </div><!--------------------container close---------------------->


<?php require('footer.php') ?>
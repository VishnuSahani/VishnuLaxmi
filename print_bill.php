<?php 
require('fpdf182/fpdf.php');
if(isset($_POST['bill']))
{
	require('connection.php');

		$todaydate=$_POST['todaydate'];
	$invoice_no=$_POST['invoice_no'];
	$customer_name=$_POST['customer_name'];
	$mobile_no=$_POST['mobile_no'];
	$address=$_POST['address'];

	$Product1=$_POST['Product1'];
	$qty1=$_POST['qty1'];
	$rate1=$_POST['rate1'];
	$amount1=$_POST['amount1'];
	$gro1 = $_POST['gro1'];
	$net1 = $_POST['net1'];

	$Product2=$_POST['Product2'];
	$qty2=$_POST['qty2'];
	$rate2=$_POST['rate2'];
	$amount2=$_POST['amount2'];
	$gro2 = $_POST['gro2'];
	$net2 = $_POST['net2'];

$Product3=$_POST['Product3'];
	$qty3=$_POST['qty3'];
	$rate3=$_POST['rate3'];
	$amount3=$_POST['amount3'];
	$gro3 = $_POST['gro3'];
	$net3 = $_POST['net3'];

$Product4=$_POST['Product4'];
	$qty4=$_POST['qty4'];
	$rate4=$_POST['rate4'];
	$amount4=$_POST['amount4'];
	$gro4 = $_POST['gro4'];
	$net4 = $_POST['net4'];

	$Product5=$_POST['Product5'];
	$qty5=$_POST['qty5'];
	$rate5=$_POST['rate5'];
	$amount5=$_POST['amount5'];
	$gro5 = $_POST['gro5'];
	$net5 = $_POST['net5'];

	$Product6=$_POST['Product6'];
	$qty6=$_POST['qty6'];
	$rate6=$_POST['rate6'];
	$amount6=$_POST['amount6'];
	$gro6 = $_POST['gro6'];
	$net6 = $_POST['net6'];

	$Product7=$_POST['Product7'];
	$qty7=$_POST['qty7'];
	$rate7=$_POST['rate7'];
	$amount7=$_POST['amount7'];
	$gro7 = $_POST['gro7'];
	$net7 = $_POST['net7'];

	$total_amount=$_POST['total_amount'];

	//$cgst=$_POST['cgst'];
	$cgst_sgst=$_POST['radiobtn'];
	$gst_value=$_POST['gst_value'];

	$discount=$_POST['discount'];
		$making_charge=$_POST['making_charge'];

	$grand_total_amount=$_POST['grand_total_amount'];



$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();



if ($customer_name != "" && $todaydate != "" && $invoice_no != "" && $mobile_no != "" && $address != "" && $Product1 != "" && $amount1 != "" && $gst_value != "" && $total_amount != "" && $total_amount != "NaN" && $amount1 != "NaN" && $gst_value != "NaN" && $discount != "" && $grand_total_amount != "" && $gro1 != "" && $net1 != "")
{

	$sql=mysqli_query($con,"insert into customer_info (customer_name,customer_mobile,customer_address,bill_date,invoice_no,total_amount,sgst_cgst,discount,making_charge,grand_total) values('$customer_name','$mobile_no','$address','$todaydate','$invoice_no','$total_amount','$gst_value','$discount','$making_charge','$grand_total_amount')");
	if($sql)
	{

	//}//


$pdf->SetFont('Arial','B',8); 
$pdf->Cell(100,8,"GST INVOICE",0,0,'R');
$pdf->Cell(90,8,"GSTIN: 09VTDAV9088B129",0,1,'R');

$pdf->Cell(90,2,"",0,0);
$pdf->Cell(50,2," ",0,0);
$pdf->Cell(50,5,"Phone : +919898456524",0,1,'R');

//$pdf->SetFillColor('RED');
$pdf->setFillColor(210,200,200);
$pdf->SetTextColor(0,20,0);// red

$pdf->SetFont('Arial','B',20); 
$pdf->Cell(190,8,"Mahalaxmi Jewellers",0,1,'C',1);
//////////////////////////

$image1 = "img/logo2.jpg";
$pdf->Image($image1,10,20,25);
$pdf->Cell(50,5,' ',0 ,0);

$pdf->SetTextColor(190,10,10);

//////////////////////////////
$pdf->SetFont('Arial','B',8); 
$pdf->Cell(90,7,"TADIYA BAZAAR CHAURAHA, NAUGARH ROAD, SIDDHARTH NAGAR",0,1,'C');

////////////////////////
$pdf->SetFont('Arial','B',13); 

$pdf->Cell(190,7,"Customer Information",0,1,'C');

$pdf->SetFont('Arial','B',10); 


$pdf->Cell(40,5,"Bill Date :-",1,0);
$pdf->Cell(70,5,$todaydate,1,0);

//$pdf->Cell(30,5,"",1,0);


$pdf->Cell(40,5,"Invoice No. :-",1,0);
$pdf->Cell(40,5,$invoice_no,1,1);

//////////////////

$pdf->Cell(40,5,"Customer's Name :-",1,0);
$pdf->Cell(70,5,$customer_name,1,0);


$pdf->Cell(40,5,"Mobile Number :-",1,0);
$pdf->Cell(40,5,$mobile_no,1,1);
///////////////

$pdf->Cell(40,5,"Address :-",1,0);
$pdf->Cell(150,5,$address,1,1);

//////////////////////////////
$pdf->SetFont('Arial','B',13); 
$pdf->Cell(190,6," ",0,1,'C');

$pdf->Cell(190,6,"Product Details",0,1,'C');

$pdf->SetTextColor(0,0,0);// red

$pdf->setFillColor(180,230,200); // green

$pdf->SetFont('Arial','B',10); 
$pdf->Cell(12,5," ",0,1);

$pdf->Cell(12,7,"S.No.",1,0,'C',1);

$pdf->Cell(90,7,"Item Description",1,0,'C',1);
$pdf->Cell(15,7,"Gro. Wt",1,0,'C',1);
$pdf->Cell(15,7,"Net. Wt",1,0,'C',1);
$pdf->Cell(20,7,"Quantity",1,0,'C',1);
$pdf->Cell(20,7,"Rate",1,0,'C',1);
$pdf->Cell(20,7,"Amount",1,1,'C',1);

////////////////////
$pdf->SetTextColor(200,0,0);// red


$pdf->Cell(12,7,"1",1,0,'C');

$sql1=mysqli_query($con,"select id from customer_info where invoice_no='$invoice_no'");
$sql_run = mysqli_fetch_array($sql1);
$Main_id = $sql_run['id'];

$sql2=mysqli_query($con,"insert into bill_info (customer_id,customer_name,bill_date,invoice_no,product_name,gro_wet,net_wet,qty,rate,amount) values('$Main_id','$customer_name','$todaydate','$invoice_no','$Product1','$gro1','$net1','$qty1','$rate1','$amount1')");

if($sql2)
{

//}

$pdf->Cell(90,7,$Product1,1,0);
$pdf->Cell(15,7,$gro1,1,0,'C');
$pdf->Cell(15,7,$net1,1,0,'C');
$pdf->Cell(20,7,$qty1,1,0,'C');
$pdf->Cell(20,7,$rate1,1,0,'C');
$pdf->Cell(20,7,$amount1,1,1,'C');

}// sql2 close

////////////////////
if($Product2 != "")
{
	$sql3=mysqli_query($con,"insert into bill_info (customer_id,customer_name,bill_date,invoice_no,product_name,gro_wet,net_wet,qty,rate,amount) values('$Main_id','$customer_name','$todaydate','$invoice_no','$Product2','$gro2','$net2','$qty2','$rate2','$amount2')");

if($sql3)
{

$pdf->Cell(12,7,"2",1,0,'C');

$pdf->Cell(90,7,$Product2,1,0);
$pdf->Cell(15,7,$gro2,1,0,'C');
$pdf->Cell(15,7,$net2,1,0,'C');
$pdf->Cell(20,7,$qty2,1,0,'C');
$pdf->Cell(20,7,$rate2,1,0,'C');
$pdf->Cell(20,7,$amount2,1,1,'C');
}//sql3
}
////////////////////
if($Product3 != "")
{
	$sql4=mysqli_query($con,"insert into bill_info (customer_id,customer_name,bill_date,invoice_no,product_name,gro_wet,net_wet,qty,rate,amount) values('$Main_id','$customer_name','$todaydate','$invoice_no','$Product3','$gro3','$net3','$qty3','$rate3','$amount3')");

if($sql4)
{

$pdf->Cell(12,7,"3",1,0,'C');

$pdf->Cell(90,7,$Product3,1,0);
$pdf->Cell(15,7,$gro3,1,0,'C');
$pdf->Cell(15,7,$net3,1,0,'C');
$pdf->Cell(20,7,$qty3,1,0,'C');
$pdf->Cell(20,7,$rate3,1,0,'C');
$pdf->Cell(20,7,$amount3,1,1,'C');
}//sql4 close
}
////////////////////
if($Product4 != "")
{
	$sql5=mysqli_query($con,"insert into bill_info (customer_id,customer_name,bill_date,invoice_no,product_name,gro_wet,net_wet,qty,rate,amount) values('$Main_id','$customer_name','$todaydate','$invoice_no','$Product4','$gro4','$net4','$qty4','$rate4','$amount4')");

if($sql5)
{

$pdf->Cell(12,7,"4",1,0,'C');

$pdf->Cell(90,7,$Product4,1,0);
$pdf->Cell(15,7,$gro4,1,0,'C');
$pdf->Cell(15,7,$net4,1,0,'C');
$pdf->Cell(20,7,$qty4,1,0,'C');
$pdf->Cell(20,7,$rate4,1,0,'C');
$pdf->Cell(20,7,$amount4,1,1,'C');
}//sql5
}
////////////////////
if($Product5 != "")
{
	$sql6=mysqli_query($con,"insert into bill_info (customer_id,customer_name,bill_date,invoice_no,product_name,gro_wet,net_wet,qty,rate,amount) values('$Main_id','$customer_name','$todaydate','$invoice_no','$Product5','$gro5','$net5','$qty5','$rate5','$amount5')");

if($sql6)
{

$pdf->Cell(12,7,"5",1,0,'C');

$pdf->Cell(90,7,$Product5,1,0);
$pdf->Cell(15,7,$gro5,1,0,'C');
$pdf->Cell(15,7,$net5,1,0,'C');
$pdf->Cell(20,7,$qty5,1,0,'C');
$pdf->Cell(20,7,$rate5,1,0,'C');
$pdf->Cell(20,7,$amount5,1,1,'C');
}//sql6

}
////////////////////
if($Product6 != "")
{

	$sql7=mysqli_query($con,"insert into bill_info (customer_id,customer_name,bill_date,invoice_no,product_name,gro_wet,net_wet,qty,rate,amount) values('$Main_id','$customer_name','$todaydate','$invoice_no','$Product6','$gro6','$net6','$qty6','$rate6','$amount6')");

if($sql7)
{


$pdf->Cell(12,7,"6",1,0,'C');

$pdf->Cell(90,7,$Product6,1,0);
$pdf->Cell(15,7,$gro6,1,0,'C');
$pdf->Cell(15,7,$net6,1,0,'C');
$pdf->Cell(20,7,$qty6,1,0,'C');
$pdf->Cell(20,7,$rate6,1,0,'C');
$pdf->Cell(20,7,$amount6,1,1,'C');

}//sql7

}
////////////////////
if($Product7 != "")
{
	$sql8=mysqli_query($con,"insert into bill_info (customer_id,customer_name,bill_date,invoice_no,product_name,gro_wet,net_wet,qty,rate,amount) values('$Main_id','$customer_name','$todaydate','$invoice_no','$Product7','$gro7','$net7','$qty7','$rate7','$amount7')");

if($sql8)
{

$pdf->Cell(12,7,"7",1,0,'C');

$pdf->Cell(90,7,$Product7,1,0);
$pdf->Cell(15,7,$gro7,1,0,'C');
$pdf->Cell(15,7,$net7,1,0,'C');
$pdf->Cell(20,7,$qty7,1,0,'C');
$pdf->Cell(20,7,$rate7,1,0,'C');
$pdf->Cell(20,7,$amount7,1,1,'C');
//////////////

}//sql8

}

//////////////
$pdf->Cell(12,2,"",0,1);

$pdf->Cell(12,7,"",0,0);

$pdf->Cell(90,7," ",0,'C');
$pdf->Cell(30,7,"",0,0,'C');

$pdf->Cell(40,7,"Total Amount",1,0,'C');
$pdf->Cell(20,7,$total_amount,1,1,'C');


//////////////
$gst_value2 = ($total_amount*$gst_value)/100;
$pdf->Cell(12,7,"",0,0);

$pdf->Cell(90,7," ",0,'C');
$pdf->Cell(30,7,"",0,0,'C');

$pdf->Cell(40,7,"(SGST) ".$cgst_sgst,1,0,'C');
$pdf->Cell(20,7," Rs ".$gst_value2,1,1);

/////////////////////


//////////////
$pdf->Cell(12,7,"",0,0);

$pdf->Cell(90,7," ",0,'C');
$pdf->Cell(30,7,"",0,0,'C');

$pdf->Cell(40,7,"(CGST) ".$cgst_sgst,1,0,'C');
$pdf->Cell(20,7," Rs ".$gst_value2,1,1);

/////////////////////



/////////////////////////////////////

//////////////
$pdf->Cell(12,7,"",0,0);

$pdf->Cell(90,7," ",0,'C');
$pdf->Cell(30,7,"",0,0,'C');

//////////////

$pdf->Cell(40,7,"Making Charge (Rs.)",1,0,'C');
$pdf->Cell(20,7,$making_charge,1,1,'C');
///////////////
$pdf->Cell(12,7,"",0,0);

$pdf->Cell(90,7," ",0,'C');
$pdf->Cell(30,7,"",0,0,'C');
$pdf->Cell(40,7,"Discount (Rs.)",1,0,'C');
$pdf->Cell(20,7,$discount,1,1,'C');

/////////////////////



$pdf->Cell(132,7,"Grand Total",1,0,'R',1);
$pdf->Cell(60,7,"Rs. ".$grand_total_amount,1,1,'C',1);
///////////// convert Number in word

$number = $grand_total_amount;
   $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  //echo $result . "Rupees  " . $points . " Paise";
  $pdf->Cell(190,5,"Rs. = ".$result . "Rupees " .$points. " Paise ",0,1);


$pdf->SetTextColor(0,0,0);// red text color

$pdf->SetFont('Arial','B',8); 
$pdf->Cell(190,2,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,1,'L');

$pdf->Cell(190,3,"Terms & Conditions",0,1,'L');
$pdf->SetFont('Arial','B',6); 

$pdf->Cell(140,5,"*JEWELLERY ONCE SOLD WILL NOT BE TAKEN BACK INSTEAD IT CAN BE EXCHANGED WITHIN A WEEK.",0,0,'L');
$pdf->Cell(50,5,"For Mahalaxmi Jewellers",0,1,'C');

$pdf->Cell(190,5,"*GOLD JEWELLERY PURCHASED WILL BE EXCHANGED AT 85% OR 100% ACCORDING TO JEWELLERY KARAT CURRENT RATE(T&C).",0,1,'L');
$pdf->Cell(140,5,"*DIAMOND JEWELLERY WILL BE TAKEN BACK OR EXCHANGED WITH INVOICE ONLY.",0,0,'L');
$pdf->Cell(50,5,"Authorised Signatory",0,1,'C');

$pdf->Cell(50,5,"Pre- Authenticated by",0,1);
$pdf->Cell(50,5,"Authorised Signatory",0,1);
$pdf->Cell(190,2,"All Subject to SDR Jurisdiction Only.",0,1,'C');


$pdf->Cell(190,5,"Thank You ! Please Visit Again",0,1,'C');


}
else
{
	$pdf->SetFont('Arial','B',13); 

	$pdf->Cell(190,7,"Please Fill All Customer Data And Proper Fill Product Name as well as Amount too",0,1);

}
//////////////


}// insert customer info 

else{
		$pdf->Cell(190,7,"Error ! Due to Server Problem , Please Try Again",0,1);


}
$pdf->Output();
}

 ?>
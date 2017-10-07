<?php
require('phpToPDF.php');
$con=mysqli_connect("localhost","root","","pms") or die ("error");
$eid=$_GET['id'];

$query="SELECT * FROM employee where Eid=$eid";

$result=mysqli_query($con,$query);

$row=mysqli_fetch_array($result);
$basic=(int)$row['BasicPay'];
$temp=$basic;
$tax;
$basic1=$basic/12.0;
if($basic<=45916){
    $tax =  ($basic1 * 15)/100; 
}else if($basic>45916 && $basic <=91831 ){
    $tax =  ($basic1 * 20.5)/100;   
}else if($basic>91831 && $basic <=142353){
    $tax =  ($basic1 * 26)/100; 
}else if($basic>142353 && $basic <=202800){
    $tax =  ($basic1 * 29)/100; 
}else{
    $tax =  ($basic1 * 33)/100; 
}
$finalAmount= $basic1 - $tax;
$my_html="<html>
    <head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Payroll Management System | </title>

    <link href='mystyle.css' rel='stylesheet'>
    </head>
    <body>
        <h1 align='center'>Pay Stub Inc.</h1>
        <div class='paymain' id='content'>
            <br>
        <h2 align='center'>Pay Slip</h2>
        <br>
        <table width='100%' class='paytable'>
            <tr>
                <td width='25%'>Employee Id : </td> 
                <td width='25%'>".$row['EId']."</td>
                <td width='25%'>Employee : </td>
                <td width='25%'>".$row['Name']."</td>
                
            </tr>
            <tr>
                <td width='25%'>DOB : </td>
                <td width='25%'>".$row['DOB']."</td>
                <td width='25%'>Joining Date : </td>
                <td width='25%'>".$row['DOJ']."</td>
            </tr>
            <tr>
                <td width='25%'>Address : </td>
                <td width='25%'>".$row['Address']." , ".$row['PostalCode']."</td>
                <td width='25%'>Email Id : </td>
                <td width='25%'>".$row['Email']."</td>
            </tr>
            <tr>  
                <td width='25%'>Basic Pay : </td>
                <td width='25%'>".$row['BasicPay']."</td>  
                <td width='25%'>Pay Period : </td>
                <td width='25%'></td>
            </tr>
            <tr>
                <td width='25%'></td>
                <td width='25%'></td>
                <td width='25%'></td>
                <td width='25%'></td>
            </tr>
            
           
            
        </table>
        <table width='95%' class='' style='margin-left:3%; margin-bottom:3%; margin-top:1%;'>
            <tr style='border: 1px solid black;'>
            <th width='25%' align='left' style='background-color:skyblue;'>Earning</th>
            <th width='25%' align='left' style='background-color:skyblue;'>Amount</th>
            <th width='25%' align='left' style='background-color:skyblue;'>Dedution</th>
            <th width='25%' align='left' style='background-color:skyblue;'>Amount</th>
            </tr>
            <tr>
            <td  width='25%' style='background-color:lightgray;'>Earning</td>
            <td  width='25%' style='background-color:lightgray;'>". $basic1 ."</td>
            <td  width='25%' style='background-color:lightgray;'>Federal Tax</td>
            <td  width='25%' style='background-color:lightgray;'>".$tax."</td>
            </tr>
            <tr>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            </tr>
            <tr>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            </tr>
            <tr>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            </tr>
            <tr>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            </tr>
            <tr>
            <td  width='25%'style='background-color:lightblue;'<b>Net Earning</b> </td>
            <td  width='25%' style='background-color:lightblue;'><b>".$finalAmount."</b></td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            </tr>
        </table>
</div>
    </body>
</html>";
$pdf_options = array(
    "source_type" => 'html',
    "source" => $my_html,
    "action" => 'save',
    "save_directory" => '',
    "file_name" => 'pdf_invoice.pdf');
    phptopdf($pdf_options);
    echo ("<a href='pdf_invoice.pdf'>Download Your PDF</a>");
?>
<html>
    <head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Payroll Management System | </title>

    <link href='mystyle.css' rel='stylesheet'>
    </head>
    <body>
        <h1 align='center'>Pay Stub Inc.</h1>
        <div class='paymain' id='content'>
            <br>
        <h2 align='center'>Pay Slip</h2>
        <br>
        <table width='100%' class='paytable'>
            <tr>
                <td width='25%'>Employee Id : </td> 
                <td width='25%'><?php echo $row['EId'];?></td>
                <td width='25%'>Employee : </td>
                <td width='25%'><?php echo $row['Name'];?></td>
                
            </tr>
            <tr>
                <td width='25%'>DOB : </td>
                <td width='25%'><?php echo $row['DOB'];?></td>
                <td width='25%'>Joining Date : </td>
                <td width='25%'><?php echo $row['DOJ'];?></td>
            </tr>
            <tr>
                <td width='25%'>Address : </td>
                <td width='25%'><?php echo $row['Address']." , ".$row['PostalCode'];?></td>
                <td width='25%'>Email Id : </td>
                <td width='25%'><?php echo $row['Email'];?></td>
            </tr>
            <tr>  
                <td width='25%'>Basic Pay : </td>
                <td width='25%'><?php echo $row['BasicPay'];?></td>  
                <td width='25%'>Pay Period : </td>
                <td width='25%'></td>
            </tr>
            <tr>
                <td width='25%'></td>
                <td width='25%'></td>
                <td width='25%'></td>
                <td width='25%'></td>
            </tr>
            
           
            
        </table>
        <table width='95%' class='' style='margin-left:3%; margin-bottom:3%; margin-top:1%;'>
            <tr style='border: 1px solid black;'>
            <th width='25%' align='left' style='background-color:skyblue;'>Earning</th>
            <th width='25%' align='left' style='background-color:skyblue;'>Amount</th>
            <th width='25%' align='left' style='background-color:skyblue;'>Dedution</th>
            <th width='25%' align='left' style='background-color:skyblue;'>Amount</th>
            </tr>
            <tr>
            <td  width='25%' style='background-color:lightgray;'>Earning</td>
            <td  width='25%' style='background-color:lightgray;'><?php echo $basic1;?></td>
            <td  width='25%' style='background-color:lightgray;'>Federal Tax</td>
            <td  width='25%' style='background-color:lightgray;'><?php echo $tax;?></td>
            </tr>
            <tr>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            </tr>
            <tr>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            </tr>
            <tr>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            </tr>
            <tr>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            </tr>
            <tr>
            <td  width='25%'style='background-color:lightblue;'<b>Net Earning</b> </td>
            <td  width='25%' style='background-color:lightblue;'><b> <?php echo $finalAmount;?></b></td>
            <td  width='25%'> </td>
            <td  width='25%'> </td>
            </tr>
            
        </table>
</div>
    </body>
</html>
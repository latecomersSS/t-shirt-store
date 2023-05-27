<?php
		require('TCPDF-main/tcpdf.php');
		require('fpdf.php');
		require('../../class/orders.php');
		require('../../class/users.php');
		 $month1 = date('m');
                                                        
	        $orders1 = new orders();
	        $total_price1 = 0;
	        $customer1 = '';

	   $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->AddPage();
		$pdf->SetFont('times','',24);

	        if (isset( $_POST['submit'], $_POST['month'])) {

	              $month1 = $_POST['month'];
	              $result1 = $orders1->getAllbyMonth($month1);
	   
	   	        while( $row1 = $result1->fetch_array()){
	            $total_price1 = orders::getTotalPricebyOrderID($row1[0], $month1);
	            $customer1 = users::getNameByID($row1[9]);

				$pdf->Cell(190, 10, "Unicode Test", 0, 1, 'C');
				$pdf->SetFont('dejavusans','',24);
				$pdf->Cell(190, 10, $total_price1, 0, 1);
				
		
			}
		}

$pdf->Output();

?>
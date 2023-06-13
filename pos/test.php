<?php
session_start();
include_once('../controller/config.php');
require('../fpdf/fpdf.php'
);

$sql = "SELECT * FROM sales";
$result = mysqli_query($conn, $sql);
ob_start();
// Create a new FPDF object
$pdf = new FPDF();
$pdf->AddPage();
// Set the font and cell width for the table
$pdf->SetFont('Arial', '', 12);
$pdf->SetFillColor(255, 255, 255);
$cellWidth = 40;

if ($result->num_rows > 0) {
    $pdf->Cell($cellWidth, 10, 'Name', 1, 0, 'C', true);
    while ($row = $result->fetch_assoc()) {

        $order_no = $row['order_number'];

        $getOrders = "SELECT m.menu, m.price, 
        o.quantity, s.order_category, s.order_type, s.date, s.order_number, s.discounted
        FROM menu AS m
        JOIN walkin_orders as o
        ON m.menu_id=o.menu
        JOIN sales AS s
        ON s.order_number = o.order_number
        WHERE s.order_number = '$order_no'";

        $res = mysqli_query($conn, $getOrders);

        while ($order_row = $res->fetch_assoc()) {
            $total = $order_row['quantity'] * $order_row['price'];
            $vat = $total * 0.03;

            $total = $total + $vat;
            $discount = $order_row['discounted'];

            $discountedTotal = $total - $discount;
            $pdf->Cell($cellWidth, 10,$order_row['order_number'], 1);
            $pdf->Cell($cellWidth, 10,$order_row['menu'], 1);
             
        }
    }
    // Output the PDF document
    $pdf->Output('table.pdf', 'D');
    $conn->close();ob_end_flush(); 
}

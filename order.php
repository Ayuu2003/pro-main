<?php


class MYPDF extends TCPDF {

    public function Header() {
        // Logo
        $image_file = 'images/logo.png';
        $this->Image($image_file, 10, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Title
        $this->SetFont('helvetica', 'B', 20);
        $this->Cell(0, 15, 'Paudha', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        
        // User Details
        $this->SetFont('helvetica', 'B', 12);
        $this->Cell(0, 10, 'User ID: ' . $_SESSION['user_id'] . ' | Username: ' . $_SESSION['username'], 0, false, 'R', 0, '', 0, false, 'M', 'M');
        $this->Ln(5); // Add a small line break with some space
    
        // Add a black line
        $this->SetLineWidth(0.5);
        $this->SetDrawColor(0, 0, 0);
        $this->Line(10, $this->GetY(), $this->GetPageWidth()-10, $this->GetY());
    
        
    }

    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

function generate_pdf($order_query) {
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('E-Commerce');
    $pdf->SetTitle('Order Summary');
    $pdf->SetSubject('Order Summary');
    $pdf->SetKeywords('Order, Summary');

    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    $pdf->AddPage();

    $pdf->SetFont('helvetica', '', 12);

    $html = '<h3>Order Summary</h3>
    <table border="1" cellspacing="2" cellpadding="2">
                <thead>
                    <tr>
                        <th class="product-price">Products</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-subtotal">Amount</th>
                        <th class="product-subtotal">Order Status</th>
                        <th class="product-subtotal">Placing Time</th>
                    </tr>
                </thead>
                <tbody>';

    while($order_info = mysqli_fetch_assoc($order_query)) {
        $html .= '
            <tr class="cart_item">

                <td class="" data-title="Product Name">
                    <a class="" href="single_product.php?status=singleproduct&&id='.$order_info['order_id'].'" style="text-decoration: none; color:black">
                        <div class="price price-contain">
                            <h5 class="text-left">'.$order_info['product_name'].'</h5>
                        </div>
                    </a>
                </td>

                <td class="product-subtotal" data-title="Total">
                    <div class="price price-contain">
                        <ins><span class="price-amount"><span class="currencySymbol"></span>'.$order_info['pdt_quantity'].'</span></ins>
                    </div>
                </td>

                <td class="product-subtotal" data-title="Total">
                    <div class="price price-contain">
                        <ins><span class="price-amount"><span class="currencySymbol">Rs. </span>'.$order_info['amount'].'</span></ins>
                    </div>
                </td>

                <td class="product-subtotal" data-title="Total">
                    <div class="">
                        <span class="price-amount">';

                        if($order_info['order_status']==0){
                            $html .= "<p class='btn btn-danger btn-sm'> Pending </p>";
                        }elseif($order_info['order_status']==1) {
                            $html .= "<p class='btn btn-warning btn-sm'> Processing </p>";
                        } elseif($order_info['order_status']==2) {
                            $html .= "<p class='btn btn-success btn-sm'> Delivered </p>";
                        }

        $html .= '</span>
                    </div>
                </td>

                <td class="product-subtotal" data-title="Total">
                    <div class="price price-contain">
                        <span class="price-amount">'.$order_info['order_time'].'</span>
                    </div>
                </td>
            </tr>';
    }

    $html .= '</tbody>
            </table>';

    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('order_summary.pdf', 'I');
}

if(isset($_SESSION['user_id'])){
    generate_pdf($order_query);
}else{
    header("location:index.php");
}

?>
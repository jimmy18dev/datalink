<?php
include'config/autoload.php';
include'config/authorization.php';
require_once('plugin/mpdf/mpdf.php');
ob_start();
?>
<!doctype html>
<html lang="en-US" itemscope itemtype="http://schema.org/Blog" prefix="og: http://ogp.me/ns#">
<head>

<!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->

<!-- Meta Tag -->
<meta charset="utf-8">

<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/pdf-style.css" type="text/css"/>
</head>
<body>

<div class="head-table">
	<div class="left">RONDA</div>
	<div class="center">
		<div class="section">MOVEMENT ASSEMBLY</div>
		<div class="topic">Daily output report</div>
	</div>
	<div class="right"></div>
</div>

<p>Line No: <strong>9</strong> , Leader: <strong>Puwadon Sricharoen</strong> , Line Type: <strong>NDI</strong> , Date <strong>13/8/16</strong></p>
<h3>1. Man power</h3>

<div class="power-table">
	<div class="row">
		<div class="cell cell-2">Prs</div>
		<div class="cell">Hrs.</div>
		<div class="cell cell-4">Over time</div>
		<div class="cell cell-5">Lost time</div>
		<div class="cell cell-4">Down time</div>
		<div class="cell cell-2">Sort</div>
		<div class="cell cell-2">Rework</div>
	</div>
	<div class="row">
		<div class="cell cell-2">Monthly 1</div>
		<div class="cell">8</div>
		<div class="cell">10</div>
		<div class="cell">15</div>
		<div class="cell">2.0</div>
		<div class="cell">3.0</div>
		<div class="cell">Vac</div>
		<div class="cell">Sick</div>
		<div class="cell">Abs</div>
		<div class="cell">Mat</div>
		<div class="cell">Oth</div>
		<div class="cell">M/C</div>
		<div class="cell">Mat'l</div>
		<div class="cell">Fac</div>
		<div class="cell">Oth</div>
		<div class="cell">Loc</div>
		<div class="cell">Ove</div>
		<div class="cell">Loc</div>
		<div class="cell">Ove</div>
	</div>
	<div class="row">
		<div class="cell cell-2">Daily 26</div>
		<div class="cell">202</div>
		<div class="cell">0</div>
		<div class="cell">0</div>
		<div class="cell">0</div>
		<div class="cell">0</div>
		<div class="cell">4</div>
		<div class="cell">0</div>
		<div class="cell">0</div>
		<div class="cell">2</div>
		<div class="cell">0</div>
		<div class="cell">0</div>
		<div class="cell">0</div>
		<div class="cell">0</div>
		<div class="cell">0</div>
		<div class="cell">0</div>
		<div class="cell">0</div>
		<div class="cell">0</div>
		<div class="cell">0</div>
	</div>
</div>

<h3>2. Output</h3>
<h3>3. Turn to 24-48 Hrs</h3>

<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', 'THSaraban');
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$stylesheet = file_get_contents('css/pdf-style.css');
$pdf->WriteHTML($stylesheet,1);
$pdf->WriteHTML($html, 2);
$pdf->Output("pdf/test.pdf");
?>
</body>
</html>
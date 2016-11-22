<?php
include'config/autoload.php';
include'config/authorization.php';
require_once('plugin/mpdf/mpdf.php');
ob_start();
?>

<h1>There's Now A Better Way To Browse Our Site: UltraLinx Premium</h1>
<p>No one likes ads, especially users and readers like you guys, and at the same time, we don't like providing you ads that you don't like, it's not good for either of us. On the other hand, ads are what support UltraLinx and what keeps us bringing you content, so there needs to be some middle ground.</p>
<br>
<p>There is now a way you can enjoy a completely ad-free experience on our site and for us to still benefit from it. We're introducing to you: UltraLinx Premium.</p>
<br>
<p>With UltraLinx Premium you can pay as little as $3.99 per month and get a lightning-fast reading experience without the distractions of advertising.</p>

<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th','A4','0','THSaraban');
// $pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$stylesheet = file_get_contents('css/pdf-style.css');
$pdf->WriteHTML($stylesheet,1);
$pdf->WriteHTML($html,2);
$success = $pdf->Output('pdf/test.pdf');
// header("Location: pdf/test.pdf");
// die();
?>
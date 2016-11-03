<?php
include'config/autoload.php';
include'config/authorization.php';
require_once('plugin/mpdf/mpdf.php');
header("Content-type: text/json");
ob_start();

$report->getHeader($_POST['report_id']);

if(empty($report->id)){
  exit();
}

?>
<table class="center">
  <tr>
  	<td rowspan="2" class="logo">RONDA</td>
  	<td class="title">MOVEMENT ASSEMBLY</td>
  	<td>Form no.<br><b>FO_11_001</b></td>
  </tr>
  <tr>
  	<td class="title">Daily output report</td>
  	<td>Revision date<br><b>09.09.02 (<?php echo $report->report_filename;?>)</b></td>
  </tr>
</table>

<p>Line No: <b><?php echo $report->line_no;?></b> (<?php echo $report->shift;?>), Leader: <b><?php echo $report->leader_name;?></b> , Line Type: <b><?php echo $report->line_type;?></b> , Date <b><?php echo $report->date?></b></p>
<h3>1. Man power</h3>

<table>
  <tr>
  	<td class="black"></td>
  	<td class="center">Normal Hrs.</td>
  	<td class="center" colspan="4">OT</td>
  	<td class="center" colspan="5">Lost time</td>
  	<td class="center" colspan="4">Down time</td>
  	<td class="center" colspan="2">Sort</td>
  	<td class="center" colspan="2">Rework</td>
  </tr>
  <tr>
  	<td>Monthly Prs: <b><?php echo $report->no_monthly_emplys;?></b></td>
  	<td class="center"><?php echo $report->ttl_monthly_hrs;?></td>
  	<td class="center caption">1.0</td>
  	<td class="center caption">1.5</td>
  	<td class="center caption">2.0</td>
  	<td class="center caption">3.0</td>
  	<td class="center caption">Vac</td>
  	<td class="center caption">Sick</td>
  	<td class="center caption">Abs</td>
  	<td class="center caption">Mat</td>
  	<td class="center caption">Oth</td>
  	<td class="center caption">M/C</td>
  	<td class="center caption">Mat'l</td>
  	<td class="center caption">Fac</td>
    <td class="center caption">Other</td>
  	<td class="center caption">Loc</td>
  	<td class="center caption">Ove</td>
  	<td class="center caption">Loc</td>
  	<td class="center caption">Ove</td>
  </tr>
  <tr>
  	<td>Daily Prs. <b><?php echo $report->no_daily_emplys;?></b></td>
  	<td class="center"><?php echo $report->ttl_daily_hrs;?></td>
  	<td><?php echo number_format($report->ot_10,2);?></td>
  	<td><?php echo number_format($report->ot_15,2);?></td>
  	<td><?php echo number_format($report->ot_20,2);?></td>
  	<td><?php echo number_format($report->ot_30,2);?></td>
  	<td><?php echo number_format($report->losttime_vac,2);?></td>
  	<td><?php echo number_format($report->losttime_sick,2);?></td>
  	<td><?php echo number_format($report->losttime_abs,2);?></td>
  	<td><?php echo number_format($report->losttime_mat,2);?></td>
  	<td><?php echo number_format($report->losttime_other,2);?></td>
  	<td><?php echo number_format($report->downtime_mc,2);?></td>
  	<td><?php echo number_format($report->downtime_mat,2);?></td>
  	<td><?php echo number_format($report->downtime_fac,2);?></td>
    <td><?php echo number_format($report->downtime_other,2);?></td>
  	<td><?php echo number_format($report->sort_local,2);?></td>
  	<td><?php echo number_format($report->sort_oversea,2);?></td>
  	<td><?php echo number_format($report->rework_local,2);?></td>
  	<td><?php echo number_format($report->rework_oversea,2);?></td>
  </tr>
</table>
<p><b>Remark:</b> <?php echo (!empty($report->remark)?$report->remark:'........');?></p>
<h3>2. Output</h3>
<?php $calibers = $report->retrieveCalibers($report->id);?>
<?php foreach ($calibers as $var){?>
<table style="width:100%;border:1px solid #555555;">
  <tr>
    <td colspan="4">
      <b class="big"><?php echo $var['caliber_code'].' '.$var['caliber_family']?></b> : Route: <b><?php echo $var['route_name'];?></b> Std.time <b><?php echo $var['std_time'];?> Hrs/K</b>
    </td>
  </tr>
  <tr>
    <td class="caption">Operation</td>
    <td class="center caption">Input</td>
    <td class="center caption">Good</td>
    <td class="center caption">Reject</td>
  </tr>

  <?php $operations = $report->retrieveOperations($var['report_id']);?>
  <?php foreach ($operations as $data){ ?>
  <tr>
    <td><?php echo $data['operation_name'];?></td>
    <td class="center"><?php echo ($data['total_good']+$data['total_reject']>0?number_format($data['total_good']+$data['total_reject']):'');?></td>
    <td class="center"><?php echo ($data['total_good']>0?number_format($data['total_good']):'');?></td>
    <td class="center"><b><?php echo ($data['total_reject']>0?number_format($data['total_reject']):'');?></b></td>
  </tr>
  <? }?>
</table>
<br>
<?php }?>

<h3>3. Turn to 24-48 Hrs</h3>
<?php $turntos = $report->retrieveTurnTo($report->id);?>
<table style="width:100%">
  <tr>
    <?php foreach ($turntos as $var){ ?>
    <td>Cal. <b><?php echo $var['code'].' '.$var['family'];?></b> <?php echo number_format($var['output']);?> K.</td>
    <?php }?>
  </tr>
</table>
<br>
<p>Product EFF. = <b><?php echo number_format($report->product_eff,2);?> %</b> , Total EFF = <b><?php echo number_format($report->ttl_eff,2);?> %</b> , Yield = <b><?php echo number_format($report->yield,2);?> %</b></p>
<p>Target Yield = <b><?php echo number_format($report->target_yield,2);?> %</b> , Target EFF = <b><?php echo number_format($report->target_eff,2);?> %</b></p>

<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th','A4','0','THSaraban');
// $pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$stylesheet = file_get_contents('css/pdf-style.css');
$pdf->WriteHTML($stylesheet,1);
$pdf->WriteHTML($html,2);

$success = $pdf->Output('pdf/daily-'.$report->report_filename.'-'.$report->line_no.''.$report->shift.'.pdf');
$api->successMessage('pdf/daily-'.$report->report_filename.'-'.$report->line_no.''.$report->shift.'.pdf',true,'');
?>
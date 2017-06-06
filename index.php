<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>qrch</title>
<link rel="stylesheet" href="styles.css">
<script src="inputform.js"></script>
</head>
<body>
<?php

if (isset($_REQUEST['QRCH_CdtrInf_IBAN'])) {

  $delim = "\r\n";
  $data  = $_REQUEST['QRCH_Header_QRType'] . $delim;
  $data .= $_REQUEST['QRCH_Header_Version'] . $delim;
  $data .= $_REQUEST['QRCH_Header_Coding'] . $delim;
  $data .= $_REQUEST['QRCH_CdtrInf_IBAN'] . $delim;
  $data .= $_REQUEST['QRCH_CdtrInf_Cdtr_Name'] . $delim;
  $data .= $_REQUEST['QRCH_CdtrInf_Cdtr_StrtNm'] . $delim;
  $data .= $_REQUEST['QRCH_CdtrInf_Cdtr_BldgNb'] . $delim;
  $data .= $_REQUEST['QRCH_CdtrInf_Cdtr_PstCd'] . $delim;
  $data .= $_REQUEST['QRCH_CdtrInf_Cdtr_TwnNm'] . $delim;
  $data .= $_REQUEST['QRCH_CdtrInf_Cdtr_Ctry'] . $delim;
  $data .= $_REQUEST['QRCH_UltmtCdtr_Name'] . $delim;
  $data .= $_REQUEST['QRCH_UltmtCdtr_StrtNm'] . $delim;
  $data .= $_REQUEST['QRCH_UltmtCdtr_BldgNb'] . $delim;
  $data .= $_REQUEST['QRCH_UltmtCdtr_PstCd'] . $delim;
  $data .= $_REQUEST['QRCH_UltmtCdtr_TwnNm'] . $delim;
  $data .= $_REQUEST['QRCH_UltmtCdtr_Ctry'] . $delim;
  $data .= $_REQUEST['QRCH_CcyAmtDate_Amt'] . $delim;
  $data .= $_REQUEST['QRCH_CcyAmtDate_Ccy'] . $delim;
  $data .= $_REQUEST['QRCH_CcyAmtDate_ReqdExctnDt'] . $delim;
  $data .= $_REQUEST['QRCH_UltmtDbtr_Name'] . $delim;
  $data .= $_REQUEST['QRCH_UltmtDbtr_StrtNm'] . $delim;
  $data .= $_REQUEST['QRCH_UltmtDbtr_BldgNb'] . $delim;
  $data .= $_REQUEST['QRCH_UltmtDbtr_PstCd'] . $delim;
  $data .= $_REQUEST['QRCH_UltmtDbtr_TwnNm'] . $delim;
  $data .= $_REQUEST['QRCH_UltmtDbtr_Ctry'] . $delim;
  $data .= $_REQUEST['QRCH_RmtInf_Tp'] . $delim;
  $data .= $_REQUEST['QRCH_RmtInf_Ref'] . $delim;
  $data .= $_REQUEST['QRCH_RmtInf_Ustrd'] . $delim;
  $data .= $_REQUEST['QRCH_AltPmtInf_AltPmt'] . $delim;
  $data .= $_REQUEST['QRCH_AltPmtInf_AltPmt2'];
  
  
  $creditor = $_REQUEST['QRCH_CdtrInf_Cdtr_Name'] . "<br />" .
              $_REQUEST['QRCH_CdtrInf_Cdtr_StrtNm'] . " " . $_REQUEST['QRCH_CdtrInf_Cdtr_BldgNb'] . "<br />" .
              $_REQUEST['QRCH_CdtrInf_Cdtr_Ctry'] . "-" . $_REQUEST['QRCH_CdtrInf_Cdtr_PstCd'] . " " . $_REQUEST['QRCH_CdtrInf_Cdtr_TwnNm'];
  
  $ultimate_creditor = $_REQUEST['QRCH_UltmtCdtr_Name'] . "<br />" .
              $_REQUEST['QRCH_UltmtCdtr_StrtNm'] . " " . $_REQUEST['QRCH_UltmtCdtr_BldgNb'] . "<br />" .
              $_REQUEST['QRCH_UltmtCdtr_Ctry'] . "-" . $_REQUEST['QRCH_UltmtCdtr_PstCd'] . " " . $_REQUEST['QRCH_UltmtCdtr_TwnNm'];
  
  $debtor =   $_REQUEST['QRCH_UltmtDbtr_Name'] . "<br />" .
              $_REQUEST['QRCH_UltmtDbtr_StrtNm'] . " " . $_REQUEST['QRCH_UltmtDbtr_BldgNb'] . "<br />" .
              $_REQUEST['QRCH_UltmtDbtr_Ctry'] . "-" . $_REQUEST['QRCH_UltmtDbtr_PstCd'] . " " . $_REQUEST['QRCH_UltmtDbtr_TwnNm'];
  
  include('phpqrcode.php');
  
  $svgTagId   = 'id-of-svg';
  $saveToFile = false;
  $imageWidth = 300; // px
  $qr_eclevel = QR_ECLEVEL_M;
  
  // SVG file format support
  $svgCode = QRcode::svg($data, $svgTagId, $saveToFile, $qr_eclevel, $imageWidth);
  
?>
  <div id="bill">
    <div id="left">
      <div id="title">QR-bill payment</div>
      <div id="scheme">
         <div id="texttitle">Supports</div>
         <div id="content">Credittransfer</div>
       </div>
      <div id="qrcode"><?php echo $svgCode; ?></div>
      <div id="amount">
        <div id="left">
          <div id="texttitle">Currency</div>
          <div id="content"><?php echo $_REQUEST['QRCH_CcyAmtDate_Ccy']; ?></div>
        </div>
        <div id="right">
          <div id="texttitle">Amount</div>
          <div id="content"><?php echo $_REQUEST['QRCH_CcyAmtDate_Amt']; ?></div>
        </div>
        <div id="clear"></div>
      </div>
    </div>
    <div id="right">
      <div id="info">
        <div id="texttitle">Account</div>
        <div id="content"><?php echo $_REQUEST['QRCH_CdtrInf_IBAN']; ?></div>
        <div id="texttitle">Creditor</div>
        <div id="content"><?php echo $creditor; ?></div>
        <div id="texttitle">Ultimate creditor</div>
        <div id="content"><?php echo $ultimate_creditor; ?></div>
        <div id="texttitle">Reference Number</div>
        <div id="content"><?php echo $_REQUEST['QRCH_RmtInf_Ref']; ?></div>
        <div id="texttitle">Debtor</div>
        <div id="content"><?php echo $debtor; ?></div>
        <div id="texttitle">Due date</div>
        <div id="content"><?php echo $_REQUEST['QRCH_CcyAmtDate_ReqdExctnDt']; ?></div>
      </div>
    </div>
    <div id="clear"></div>
  </div>
  <!--
<?php
  foreach($_REQUEST as $key => $value) {
    $keyarr = explode("_", $key);
    if ($keyarr[0] == "QRCH") {
      echo "$key: $value\n";
    }
  }

} else {

include("inputform.html");

?>

  <P>Documentation:
  <ul>
    <li><a href="https://www.paymentstandards.ch/de/home/schemes/payment-slips.html">https://www.paymentstandards.ch/de/home/schemes/payment-slips.html</a></li>
    <li><a href="https://www.paymentstandards.ch/dam/downloads/ig-qr-bill-de.pdf">https://www.paymentstandards.ch/dam/downloads/ig-qr-bill-de.pdf</a></li>
    <li><a href="https://www.iso-20022.ch/lexikon/qr-rechnung/">https://www.iso-20022.ch/lexikon/qr-rechnung/</a></li>
  </ul>
</body>
</html>
<?php } ?>

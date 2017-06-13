<?php

if (isset($_REQUEST['QRCH_CdtrInf_IBAN'])) {
  
  include("inputvalidation.php");

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
  $imageWidth = 220; // px
  $qr_eclevel = QR_ECLEVEL_M;
  
  // SVG file format support
  $svgCode = QRcode::svg($data, $svgTagId, $saveToFile, $qr_eclevel, $imageWidth);

  include('localization.php');
  
?>
  <div id="bill">
    <div id="left">
      <div id="title"><?php echo $TEXT['QR-bill payment']; ?></div>
      <div id="scheme">
         <div id="texttitle"><?php echo $TEXT['Supports']; ?></div>
         <div id="content"><?php echo $TEXT['Credittransfer']; ?></div>
       </div>
      <div id="qrcode"><?php echo $svgCode; ?></div>
      <div id="amount">
        <div id="left">
          <div id="texttitle"><?php echo $TEXT['Currency']; ?></div>
          <div id="content"><?php echo $_REQUEST['QRCH_CcyAmtDate_Ccy']; ?></div>
        </div>
        <div id="right">
          <div id="texttitle"><?php echo $TEXT['Amount']; ?></div>
          <div id="content"><?php echo $_REQUEST['QRCH_CcyAmtDate_Amt']; ?></div>
        </div>
        <div id="clear"></div>
      </div>
    </div>
    <div id="right">
      <div id="info">
        <div id="texttitle"><?php echo $TEXT['Account']; ?></div>
        <div id="content"><?php echo $_REQUEST['QRCH_CdtrInf_IBAN']; ?></div>
        <div id="texttitle"><?php echo $TEXT['Creditor']; ?></div>
        <div id="content"><?php echo $creditor; ?></div>
        <div id="texttitle"><?php echo $TEXT['Ultimate creditor']; ?></div>
        <div id="content"><?php echo $ultimate_creditor; ?></div>
        <div id="texttitle"><?php echo $TEXT['Reference Number']; ?></div>
        <div id="content"><?php echo $_REQUEST['QRCH_RmtInf_Ref']; ?></div>
        <div id="texttitle"><?php echo $TEXT['Debtor']; ?></div>
        <div id="content"><?php echo $debtor; ?></div>
        <div id="texttitle"><?php echo $TEXT['Due date']; ?></div>
        <div id="content"><?php echo $_REQUEST['QRCH_CcyAmtDate_ReqdExctnDt']; ?></div>
      </div>
    </div>
    <div id="clear"></div>
  </div>

<?php } ?>

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
  $data .= $_REQUEST['QRCH_RmtInf_Ustrd'];
  
  if (strlen($_REQUEST['QRCH_AltPmtInf_AltPmt']) > 0)
    $data .= $delim . $_REQUEST['QRCH_AltPmtInf_AltPmt'] ;

  if (strlen($_REQUEST['QRCH_AltPmtInf_AltPmt2']) > 0)
    $data .= $delim . $_REQUEST['QRCH_AltPmtInf_AltPmt2'];
  

  $creditor  = $_REQUEST['QRCH_CdtrInf_Cdtr_Name'];
  if (strlen($_REQUEST['QRCH_CdtrInf_Cdtr_StrtNm']) > 0 || strlen($_REQUEST['QRCH_CdtrInf_Cdtr_BldgNb']) > 0)
    $creditor .= "<br />" . $_REQUEST['QRCH_CdtrInf_Cdtr_StrtNm'] . " " . $_REQUEST['QRCH_CdtrInf_Cdtr_BldgNb'];
  $creditor .= "<br />" . $_REQUEST['QRCH_CdtrInf_Cdtr_Ctry'] . "-" . $_REQUEST['QRCH_CdtrInf_Cdtr_PstCd'] . " " . $_REQUEST['QRCH_CdtrInf_Cdtr_TwnNm'];
  

  if (strlen($_REQUEST['QRCH_UltmtCdtr_Name']) > 0) {
    $ultimate_creditor = $_REQUEST['QRCH_UltmtCdtr_Name'];
    if (strlen($_REQUEST['QRCH_UltmtCdtr_StrtNm']) > 0 || strlen($_REQUEST['QRCH_UltmtCdtr_BldgNb']) > 0)
      $ultimate_creditor .= "<br />" . $_REQUEST['QRCH_UltmtCdtr_StrtNm'] . " " . $_REQUEST['QRCH_UltmtCdtr_BldgNb'];
    $ultimate_creditor .= "<br />" . $_REQUEST['QRCH_UltmtCdtr_Ctry'] . "-" . $_REQUEST['QRCH_UltmtCdtr_PstCd'] . " " . $_REQUEST['QRCH_UltmtCdtr_TwnNm'];
  } else { $ultimate_creditor = ""; }
  
  if (strlen($_REQUEST['QRCH_UltmtDbtr_Name']) > 0) {
    $debtor = $_REQUEST['QRCH_UltmtDbtr_Name'];
    if (strlen($_REQUEST['QRCH_UltmtDbtr_StrtNm']) > 0 || strlen($_REQUEST['QRCH_UltmtDbtr_BldgNb']) > 0)
      $debtor .= "<br />" . $_REQUEST['QRCH_UltmtDbtr_StrtNm'] . " " . $_REQUEST['QRCH_UltmtDbtr_BldgNb'];
    $debtor .= "<br />" . $_REQUEST['QRCH_UltmtDbtr_Ctry'] . "-" . $_REQUEST['QRCH_UltmtDbtr_PstCd'] . " " . $_REQUEST['QRCH_UltmtDbtr_TwnNm'];
  }
  
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
         <div id="content"><?php echo $TEXT['Credit transfer']; ?></div>
       </div>
      <div id="qrcode"><?php echo $svgCode; ?></div>
      <div id="amount">
        <div id="left">
          <div id="texttitle"><?php echo $TEXT['Currency']; ?></div>
          <div id="content"><?php echo $_REQUEST['QRCH_CcyAmtDate_Ccy']; ?></div>
        </div>
        <div id="right">
          <div id="texttitle"><?php echo $TEXT['Amount']; ?></div>
          <div id="content">
          <?php
            if ($_REQUEST['QRCH_CcyAmtDate_Amt'] != "")
              echo $_REQUEST['QRCH_CcyAmtDate_Amt'];
            else {
          ?>

<svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 113.4 42.5" width="100" style="enable-background:new 0 0 113.4 42.5;" xml:space="preserve">
<g>
  <rect width="8.5" height="0.8"/>
  <rect x="-3.9" y="3.9" transform="matrix(-1.836970e-16 1 -1 -1.836970e-16 4.627 3.877)" width="8.5" height="0.8"/>
</g>
<g>
  <rect x="-3.9" y="37.9" transform="matrix(6.123234e-17 -1 1 6.123234e-17 -37.893 38.643)" width="8.5" height="0.8"/>
  <rect y="41.8" width="8.5" height="0.8"/>
</g>
<g>
  <rect x="104.9" y="41.8" transform="matrix(-1 -1.224647e-16 1.224647e-16 -1 218.2761 84.29)" width="8.5" height="0.8"/>
  <rect x="108.8" y="37.9" transform="matrix(6.123234e-17 -1 1 6.123234e-17 74.747 151.283)" width="8.5" height="0.8"/>
</g>
<g>
  <rect x="108.8" y="3.9" transform="matrix(-1.836970e-16 1 -1 -1.836970e-16 117.267 -108.763)" width="8.5" height="0.8"/>
  <rect x="104.9" transform="matrix(-1 -1.224647e-16 1.224647e-16 -1 218.2761 0.75)" width="8.5" height="0.8"/>
</g>
</svg>
<?php } ?>

          </div>
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
        <?php if($ultimate_creditor != "") { ?>
        <div id="texttitle"><?php echo $TEXT['Ultimate creditor']; ?></div>
        <div id="content"><?php echo $ultimate_creditor; ?></div>
        <?php } ?>
        <?php if($_REQUEST['QRCH_RmtInf_Ref'] != "") { ?>
        <div id="texttitle"><?php echo $TEXT['Reference Number']; ?></div>
        <div id="content"><?php echo $_REQUEST['QRCH_RmtInf_Ref']; ?></div>
        <?php } ?>
        <?php if($_REQUEST['QRCH_RmtInf_Ustrd'] != "") { ?>
        <div id="texttitle"><?php echo $TEXT['Additional information']; ?></div>
        <div id="content"><?php echo $_REQUEST['QRCH_RmtInf_Ustrd']; ?></div>
        <?php } ?>
        <div id="texttitle"><?php echo $TEXT['Debtor']; ?></div>
        <div id="content"><?php
          if($debtor != "") {
            echo $debtor;
          } else {
          ?>

<svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 184.3 70.9" width="200" style="enable-background:new 0 0 184.3 70.9;" xml:space="preserve">
<g>
  <rect width="8.5" height="0.8"/>
  <rect x="-3.9" y="3.9" transform="matrix(-1.836970e-16 1 -1 -1.836970e-16 4.627 3.877)" width="8.5" height="0.8"/>
</g>
<g>
  <rect x="-3.9" y="66.2" transform="matrix(6.123234e-17 -1 1 6.123234e-17 -66.2392 66.9892)" width="8.5" height="0.8"/>
  <rect y="70.1" width="8.5" height="0.8"/>
</g>
<g>
  <rect x="175.7" y="70.1" transform="matrix(-1 -1.224647e-16 1.224647e-16 -1 360 140.9823)" width="8.5" height="0.8"/>
  <rect x="179.6" y="66.2" transform="matrix(6.123234e-17 -1 1 6.123234e-17 117.2628 250.4911)" width="8.5" height="0.8"/>
</g>
<g>
  <rect x="179.6" y="3.9" transform="matrix(-1.836970e-16 1 -1 -1.836970e-16 188.1289 -179.625)" width="8.5" height="0.8"/>
  <rect x="175.7" transform="matrix(-1 -1.224647e-16 1.224647e-16 -1 360 0.75)" width="8.5" height="0.8"/>
</g>
</svg>

        <?php } ?>
        </div>
        <?php if($_REQUEST['QRCH_CcyAmtDate_ReqdExctnDt'] != "") { ?>
        <div id="texttitle"><?php echo $TEXT['Due date']; ?></div>
        <div id="content"><?php echo $_REQUEST['QRCH_CcyAmtDate_ReqdExctnDt']; ?></div>
        <?php } ?>
      </div>
    </div>
    <div id="clear"></div>
  </div>

<?php } ?>

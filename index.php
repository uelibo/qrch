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

  include("qrbillgen.php");

  echo "<!--\n";
  foreach($_REQUEST as $key => $value) {
    $keyarr = explode("_", $key);
    if ($keyarr[0] == "QRCH") {
      echo "$key: $value\n";
    }
  }
  echo "//-->\n";

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

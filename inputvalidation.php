<?php

// QRCH
// + Header           Obligatorische Datengruppe
// ++ QRType      M   QRType, SPC                             3     alphanum
// $_REQUEST['QRCH_Header_QRType']
if($_REQUEST['QRCH_Header_QRType'] != "SPC") {
  echo "WARNING: changed QRType to SPC\n<br />";
  $_REQUEST['QRCH_Header_QRType'] = "SPC";
}

// ++ Version     M   Version                                 4     num
// $_REQUEST['QRCH_Header_Version']
if($_REQUEST['QRCH_Header_Version'] != "0200") {
  echo "WARNING: changed Version to 0200\n<br />";
  $_REQUEST['QRCH_Header_Version'] = "0200";
}

// ++ Coding      M   Coding Type                             1     num
// $_REQUEST['QRCH_Header_Coding']
if($_REQUEST['QRCH_Header_Coding'] != "1") {
  echo "WARNING: changed Coding type to 1\n<br />";
  $_REQUEST['QRCH_Header_Coding'] = "1";
}

// + CdtrInf          (Empfänger) Obligatorische Datengruppe
// ++ IBAN        M   IBAN Kontonr                           21     alphanum ("CH-|LI-")
// $_REQUEST['QRCH_CdtrInf_IBAN']
if(strlen($_REQUEST['QRCH_CdtrInf_IBAN']) != 21)
  die("ERROR: Invalid length of IBAN\n<br />Example for valid IBAN: CH4431999123000889012");

// ++ Cdtr            (Empfänger) Obligatorische Datengruppe
// +++ Name       M   Name (Firmenname) gem. Kontobez        70max
// $_REQUEST['QRCH_CdtrInf_Cdtr_Name']
if(strlen($_REQUEST['QRCH_CdtrInf_Cdtr_Name']) > 70)
  die("ERROR field creditor name is too long");

if(strlen($_REQUEST['QRCH_CdtrInf_Cdtr_Name']) < 1)
  die("ERROR field creditor name is mandatory");

// +++ StrtNmOrAdrLine1     O   Strasse/Postfach                       70max
// $_REQUEST['QRCH_CdtrInf_Cdtr_StrtNmOrAdrLine1']
if(strlen($_REQUEST['QRCH_CdtrInf_Cdtr_StrtNmOrAdrLine1']) > 70)
  die("ERROR field creditor street is too long");

// +++ BldgNbOrAdrLine2     O   Hausnummer                             16max
// $_REQUEST['QRCH_CdtrInf_Cdtr_BldgNbOrAdrLine2']
if(strlen($_REQUEST['QRCH_CdtrInf_Cdtr_BldgNbOrAdrLine2']) > 70)
  die("ERROR field creditor house number is too long");

// +++ PstCd      M   Postleitzahl (ohne Landescode)         16max
// $_REQUEST['QRCH_CdtrInf_Cdtr_PstCd']
if(strlen($_REQUEST['QRCH_CdtrInf_Cdtr_PstCd']) > 16)
  die("ERROR field creditor postal code is too long");

if(strlen($_REQUEST['QRCH_CdtrInf_Cdtr_PstCd']) < 1)
  die("ERROR field creditor postal code is mandatory");

// +++ TwnNm      M   Ort                                    35max
// $_REQUEST['QRCH_CdtrInf_Cdtr_TwnNm']
if(strlen($_REQUEST['QRCH_CdtrInf_Cdtr_TwnNm']) > 35)
  die("ERROR field creditor city is too long");

if(strlen($_REQUEST['QRCH_CdtrInf_Cdtr_TwnNm']) < 1)
  die("ERROR field creditor city is mandatory");

// +++ Ctry       M   Land                                    2     Ländercode (ISO 3166-1)
// $_REQUEST['QRCH_CdtrInf_Cdtr_Ctry']
if(strlen($_REQUEST['QRCH_CdtrInf_Cdtr_Ctry']) != 2)
  die("ERROR field creditor country is invalid\n<br />Example for valid country: CH");

// + UltmtCdtr        (Endg. Empf.) Opt. Datengruppe
// ++ Name        D   Name (Firmenname)                      70max
// $_REQUEST['QRCH_UltmtCdtr_Name']
if(strlen($_REQUEST['QRCH_UltmtCdtr_Name']) > 70)
  die("ERROR field ultimate creditor name is too long");

// ++ StrtNmOrAdrLine1      O   Strasse/Postfach                       70max
// $_REQUEST['QRCH_UltmtCdtr_StrtNmOrAdrLine1']
if(strlen($_REQUEST['QRCH_UltmtCdtr_Name']) > 70)
  die("ERROR field ultimate creditor street is too long");

// ++ BldgNbOrAdrLine2      O   Hausnummer                             16max
// $_REQUEST['QRCH_UltmtCdtr_BldgNbOrAdrLine2']
if(strlen($_REQUEST['QRCH_UltmtCdtr_BldgNbOrAdrLine2']) > 70)
  die("ERROR field ultimate creditor house number is too long");

// ++ PstCd       D   Postleitzahl (ohne Landescode)         16max
// $_REQUEST['QRCH_UltmtCdtr_PstCd']
if(strlen($_REQUEST['QRCH_UltmtCdtr_PstCd']) > 16)
  die("ERROR field ultimate creditor postal code is too long");

// ++ TwnNm       D   Ort                                    35max
// $_REQUEST['QRCH_UltmtCdtr_TwnNm']
if(strlen($_REQUEST['QRCH_UltmtCdtr_TwnNm']) > 35)                                                                                                                  
  die("ERROR field ultimate creditor city is too long");

// ++ Ctry        D   Land                                    2     Ländercode (ISO 3166-1)
// $_REQUEST['QRCH_UltmtCdtr_Ctry']
if(strlen($_REQUEST['QRCH_UltmtCdtr_Ctry']) > 2)
  die("ERROR field ultimate creditor country is too long\n<br />Example for valid country: CH");

// + CcyAmtDate       (Zahlbetraginfo) Obligatorische Datengruppe
// ++ Amt         O   Betrag                                 12     num + .
// $_REQUEST['QRCH_CcyAmtDate_Amt']
if(strlen($_REQUEST['QRCH_CcyAmtDate_Amt']) > 12)
  die("ERROR field amount is too long");

// ++ Ccy         M   Währung                                 3     CHF|EUR
// $_REQUEST['QRCH_CcyAmtDate_Ccy']
if(strlen($_REQUEST['QRCH_CcyAmtDate_Ccy']) > 3)
  die("ERROR field currency is too long");

// ++ ReqdExctnDt O   Fälligkeitsdatum                       10     YYYY-MM-DD
// $_REQUEST['QRCH_CcyAmtDate_ReqdExctnDt']
if(strlen($_REQUEST['QRCH_CcyAmtDate_ReqdExctnDt']) > 10)
  die("ERROR field due date is too long");

// + UltmtDbtr        (Eng. Zahlungspflicht.) Opt. Datengruppe
// ++ Name        D   Name (Firmenname)                      70max
// $_REQUEST['QRCH_UltmtDbtr_Name']
if(strlen($_REQUEST['QRCH_UltmtDbtr_Name']) > 70)
  die("ERROR field deptor name is too long");

// ++ StrtNmOrAdrLine1      O   Strasse/Postfach                       70max
// $_REQUEST['QRCH_UltmtDbtr_StrtNmOrAdrLine1']
if(strlen($_REQUEST['QRCH_UltmtDbtr_StrtNmOrAdrLine1']) > 70)
  die("ERROR field deptor street is too long");

// ++ BldgNbOrAdrLine2      O   Hausnummer                             16max
// $_REQUEST['QRCH_UltmtDbtr_BldgNbOrAdrLine2']
if(strlen($_REQUEST['QRCH_UltmtDbtr_BldgNbOrAdrLine2']) > 16)
  die("ERROR field deptor house number is too long");

// ++ PstCd       D   Postleitzahl (ohne Landescode)         16max
// $_REQUEST['QRCH_UltmtDbtr_PstCd']
if(strlen($_REQUEST['QRCH_UltmtDbtr_PstCd']) > 16)
  die("ERROR field deptor postal code is too long");

// ++ TwnNm       D   Ort                                    35max
// $_REQUEST['QRCH_UltmtDbtr_TwnNm']
if(strlen($_REQUEST['QRCH_UltmtDbtr_TwnNm']) > 35)                                                                                                                  
  die("ERROR field deptor city is too long");

// ++ Ctry        D   Land                                    2     Ländercode (ISO 3166-1)
// $_REQUEST['QRCH_UltmtDbtr_Ctry']
if(strlen($_REQUEST['QRCH_UltmtDbtr_Ctry']) > 2)
  die("ERROR field deptor country is too long\n<br />Example for valid country: CH");

// + RmtInf           (Zahlungsreferenz) Obligatorische Datengruppe
// ++ Tp          M   Referenztyp                                   QRR(ISO 11649)|SCOR|NON
// $_REQUEST['QRCH_RmtInf_Tp']
if(!($_REQUEST['QRCH_RmtInf_Tp'] == "QRR" || $_REQUEST['QRCH_RmtInf_Tp'] == "SCOR" || $_REQUEST['QRCH_RmtInf_Tp'] == "NON"))
  die("ERROR field reference type is invalid\n<br />valid reference types: QRR, SCOR, NON");

// ++ Ref         O   Referenz falls QRR od. SCOR            27max
// $_REQUEST['QRCH_RmtInf_Ref']
if(strlen($_REQUEST['QRCH_RmtInf_Ref']) > 27)
  die("ERROR field reference is too long");

// ++ Ustrd       O   Mitteilung                            140max
// $_REQUEST['QRCH_RmtInf_AddInf_Ustrd']
if(strlen($_REQUEST['QRCH_RmtInf_AddInf_Ustrd']) > 140)
  die("ERROR field unstructured message is too long");

// +++ Trailer
// $_REQUEST['QRCH_RmtInf_AddInf_Trailer']
if($_REQUEST['QRCH_RmtInf_AddInf_Trailer'] != "EPD") {
  $_REQUEST['QRCH_RmtInf_AddInf_Trailer'] = "EPD";
}

// + AltPmtInf        (Alternative Verfahren) Opt. Datengruppe
// ++ AltPmt      A   Parameter altertiver Verfahren 1      100max
// $_REQUEST['QRCH_AltPmtInf_AltPmt']
if(strlen($_REQUEST['QRCH_AltPmtInf_AltPmt']) > 100)
  die("ERROR field alternative scheme parameters is too long " . strlen($_REQUEST['QRCH_AltPmtInf_AltPmt']));

// ++ AltPmt      A   Parameter altertiver Verfahren 2      100max 
// $_REQUEST['QRCH_AltPmtInf_AltPmt2'];
if(strlen($_REQUEST['QRCH_AltPmtInf_AltPmt2']) > 100)
  die("ERROR field alternative scheme parameters 2 is too long " . strlen($_REQUEST['QRCH_AltPmtInf_AltPmt2']));

?>

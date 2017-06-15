<?php

$TEXT['QR-bill payment']        = "QR-bill payment";
$TEXT['Supports']               = "Supports";
$TEXT['Credit transfer']        = "Credit transfer";
$TEXT['Account']                = "Account";
$TEXT['Creditor']               = "Creditor";
$TEXT['Ultimate creditor']      = "Ultimate creditor";
$TEXT['Reference Number']       = "Reference Number";
$TEXT['Additional information'] = "Additional information";
$TEXT['Debtor']                 = "Debtor";
$TEXT['Due date']               = "Due date";
$TEXT['Currency']               = "Currency";
$TEXT['Amount']                 = "Amount";

if ($_POST['language'] == "DE") {
  $TEXT['QR-bill payment']        = "Zahlteil QR-Rechnung";
  $TEXT['Supports']               = "Unterstützt";
  $TEXT['Credit transfer']        = "Ueberweisung";
  $TEXT['Account']                = "Konto";
  $TEXT['Creditor']               = "Zahlungsempfänger";
  $TEXT['Ultimate creditor']      = "Endgültiger Zahlungsempfänger";
  $TEXT['Reference Number']       = "Referenznummer";
  $TEXT['Additional information'] = "Zusätzliche Informationen";
  $TEXT['Debtor']                 = "Zahlungspflichtiger";
  $TEXT['Due date']               = "Zahlbar bis";
  $TEXT['Currency']               = "Währung";
  $TEXT['Amount']                 = "Betrag";

} else if ($_POST['language'] == "FR") {
  $TEXT['QR-bill payment']        = "Section paiement QR-facture";
  $TEXT['Supports']               = "Support";
  $TEXT['Credit transfer']        = "Virement";
  $TEXT['Account']                = "Compte";
  $TEXT['Creditor']               = "Bénéficiaire";
  $TEXT['Ultimate creditor']      = "Bénéficiaire final";
  $TEXT['Reference Number']       = "Numéro de référenc";
  $TEXT['Additional information'] = "Informations supplémentaires";
  $TEXT['Debtor']                 = "Débiteur";
  $TEXT['Due date']               = "A payer jusqu'au";
  $TEXT['Currency']               = "Monnaie";
  $TEXT['Amount']                 = "Montant";

} else if ($_POST['language'] == "IT") {
  $TEXT['QR-bill payment']        = "Sezione pagamento QR-fattura";
  $TEXT['Supports']               = "Sostiene";
  $TEXT['Credit transfer']        = "Bonifico";
  $TEXT['Account']                = "Conto";
  $TEXT['Creditor']               = "Beneficiario";
  $TEXT['Ultimate creditor']      = "Beneficiario finale";
  $TEXT['Reference Number']       = "Numero di riferimento";
  $TEXT['Additional information'] = "Informazioni supplementar";
  $TEXT['Debtor']                 = "Debitore";
  $TEXT['Due date']               = "Da pagare entro il";
  $TEXT['Currency']               = "Valuta";
  $TEXT['Amount']                 = "Importo";

}

?>

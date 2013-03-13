<?php
// hoeveel belegde broodjes kunnen we krijgen ??
// hoeveel geld houden we over
$broodjes = 1.09;
$kaas = 0.40;
$boter = 0.08;

$optie_sla = TRUE;
$optie_tomaat = FALSE;
$optie_ham = TRUE;
$optie_ei = FALSE;
$optie_komkommer = TRUE;

// opties
$sla = 0.15;
$tomaat = 0.60;
$ham = 0.80;
$ei = 0.10;
$komkommer = 0.25;

$geld = 20;
$belegd = $broodjes + $kaas + $boter;

if($optie_sla == TRUE)
{
    //$belegd = $belegd + $sla;
    $belegd += $sla;
}
if($optie_tomaat == TRUE)
{
    $belegd = $belegd + $tomaat;
}
if($optie_ham == TRUE)
{
    $belegd = $belegd + $ham;
}
if($optie_ei == TRUE)
{
    $belegd = $belegd + $ei;
}
if($optie_komkommer == TRUE)
{
    $belegd = $belegd + $komkommer;
}

$aantal = floor($geld / $belegd);
$geldover = $geld - ($aantal * $belegd);

print "aantal belegde broodjes = ".$aantal."<br />";
print $geldover." euro is over van het geld";
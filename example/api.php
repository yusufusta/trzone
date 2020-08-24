<?php
require "../vendor/autoload.php";
use trzone\trzone;
error_reporting(0);

$trzone = new trzone();
$il = $_GET["il"];
$ilce = $_GET["ilce"];
$semt = $_GET["semt"];
$koy = $_GET["koy"];

if (empty($il)) {
    echo json_encode($trzone->getCity());
} else {
    if (empty($ilce)) {
        echo json_encode([$trzone->getCity($il)->toString(), $trzone->getCity($il)->getCounty()]);
    } else {
        if (empty($semt)) {
            echo json_encode([$trzone->getCity($il)->getCounty($ilce)->toString(), $trzone->getCity($il)->getCounty($ilce)->getTown()]);
        } else {
            if (empty($koy)) {
                echo json_encode([$trzone->getCity($il)->getCounty($ilce)->getTown($semt)->getZipCode(), $trzone->getCity($il)->getCounty($ilce)->getTown($semt)->toString(), $trzone->getCity($il)->getCounty($ilce)->getTown($semt)->getVillage()]);
            } else {
                $koy = $trzone->getCity($il)->getCounty($ilce)->getTown($semt)->getVillage((int) $koy);
                echo json_encode([$koy->toString(), $koy->getZipCode()]);
            }
        }
    }
}

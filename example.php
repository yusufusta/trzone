<?php
require "./vendor/autoload.php";
use trzone\trzone;

$trzone = new trzone();

# Adresi yazalım.
$Adres = $trzone->getCity( # İl getiriyoruz.
        $trzone->searchPlaque("istanbul") # İstanbul'un plakasını arıyoruz. searchPlaque olmadan istanbul yazarsak bulamıyacaktır, çünkü veriler büyük harfledir #
    )
        ->getCounty("ADALAR") # ->getCounty(0) # İlçeyi getiriyoruz.
        ->getTown(FIRST) # İlk semt'i alıyoruz.
        ->getVillage(FIRST); # İlk mahalleyi seçiyoruz.

# Posta Kodunu Yazılım
echo $Adres->getZipCode();

# Adresi Yazalım
echo $Adres;

# Array şeklinde ilçeleri alalım
print_r($trzone->getCity("İSTANBUL")->getCounty());

# Plaka alalım
echo $trzone->getCity( # İl getiriyoruz.
        "İSTANBUL"
    )->getPlaque(); # Plakayı istiyoruz.
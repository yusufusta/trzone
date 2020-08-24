<?php
namespace trzone;

use Exception;
define("FIRST", 0);

class trzone {
    private $TurkishPlaque;
    private $Plaque;
    private $Data;

    function __construct() {
        $this->City = NULL;
        $this->County = NULL;
        $this->Town = NULL;
        $this->Village = NULL;

        $this->TurkishPlaque = json_decode('{"1":"ADANA","2":"ADIYAMAN","3":"AFYONKARAHİSAR","4":"AĞRI","5":"AMASYA","6":"ANKARA","7":"ANTALYA","8":"ARTVİN","9":"AYDIN","10":"BALIKESİR","11":"BİLECİK","12":"BİNGÖL","13":"BİTLİS","14":"BOLU","15":"BURDUR","16":"BURSA","17":"ÇANAKKALE","18":"ÇANKIRI","19":"ÇORUM","20":"DENİZLİ","21":"DİYARBAKIR","22":"EDİRNE","23":"ELAZIĞ","24":"ERZİNCAN","25":"ERZURUM","26":"ESKİŞEHİR","27":"GAZİANTEP","28":"GİRESUN","29":"GÜMÜŞHANE","30":"HAKKARİ","31":"HATAY","32":"ISPARTA","33":"MERSİN","34":"İSTANBUL","35":"İZMİR","36":"KARS","37":"KASTAMONU","38":"KAYSERİ","39":"KIRKLARELİ","40":"KIRŞEHİR","41":"KOCAELİ","42":"KONYA","43":"KÜTAHYA","44":"MALATYA","45":"MANİSA","46":"KAHRAMANMARAŞ","47":"MARDİN","48":"MUĞLA","49":"MUŞ","50":"NEVŞEHİR","51":"NİĞDE","52":"ORDU","53":"RİZE","54":"SAKARYA","55":"SAMSUN","56":"SİİRT","57":"SİNOP","58":"SİVAS","59":"TEKİRDAĞ","60":"TOKAT","61":"TRABZON","62":"TUNCELİ","63":"ŞANLIURFA","64":"UŞAK","65":"VAN","66":"YOZGAT","67":"ZONGULDAK","68":"AKSARAY","69":"BAYBURT","70":"KARAMAN","71":"KIRIKKALE","72":"BATMAN","73":"ŞIRNAK","74":"BARTIN","75":"ARDAHAN","76":"IĞDIR","77":"YALOVA","78":"KARABüK","79":"KİLİS","80":"OSMANİYE","81":"DÜZCE"}', true);
        $this->Plaque = json_decode('{"ADANA":"1","ADIYAMAN":"2","AFYONKARAH\u0130SAR":"3","AFYONKARAHISAR":"3","AFYONKARAHiSAR":"3","A\u011eRI":"4","AGRI":"4","AMASYA":"5","ANKARA":"6","ANTALYA":"7","ARTV\u0130N":"8","ARTVIN":"8","ARTViN":"8","AYDIN":"9","BALIKES\u0130R":"10","BALIKESIR":"10","BALIKESiR":"10","B\u0130LEC\u0130K":"11","BILECIK":"11","BiLECiK":"11","B\u0130NG\u00d6L":"12","BING\u00d6L":"12","BiNGOL":"12","B\u0130TL\u0130S":"13","BITLIS":"13","BiTLiS":"13","BOLU":"14","BURDUR":"15","BURSA":"16","\u00c7ANAKKALE":"17","CANAKKALE":"17","\u00c7ANKIRI":"18","CANKIRI":"18","\u00c7ORUM":"19","CORUM":"19","DEN\u0130ZL\u0130":"20","DENIZLI":"20","DENiZLi":"20","D\u0130YARBAKIR":"21","DIYARBAKIR":"21","DiYARBAKIR":"21","ED\u0130RNE":"22","EDIRNE":"22","EDiRNE":"22","ELAZI\u011e":"23","ELAZIG":"23","ERZ\u0130NCAN":"24","ERZINCAN":"24","ERZiNCAN":"24","ERZURUM":"25","ESK\u0130\u015eEH\u0130R":"26","ESKI\u015eEHIR":"26","ESKiSEHiR":"26","GAZ\u0130ANTEP":"27","GAZIANTEP":"27","GAZiANTEP":"27","G\u0130RESUN":"28","GIRESUN":"28","GiRESUN":"28","G\u00dcM\u00dc\u015eHANE":"29","GUMUSHANE":"29","HAKKAR\u0130":"30","HAKKARI":"30","HAKKARi":"30","HATAY":"31","ISPARTA":"32","MERS\u0130N":"33","MERSIN":"33","MERSiN":"33","\u0130STANBUL":"34","ISTANBUL":"34","iSTANBUL":"34","\u0130ZM\u0130R":"35","IZMIR":"35","iZMiR":"35","KARS":"36","KASTAMONU":"37","KAYSER\u0130":"38","KAYSERI":"38","KAYSERi":"38","KIRKLAREL\u0130":"39","KIRKLARELI":"39","KIRKLARELi":"39","KIR\u015eEH\u0130R":"40","KIR\u015eEHIR":"40","KIRSEHiR":"40","KOCAEL\u0130":"41","KOCAELI":"41","KOCAELi":"41","KONYA":"42","K\u00dcTAHYA":"43","KUTAHYA":"43","MALATYA":"44","MAN\u0130SA":"45","MANISA":"45","MANiSA":"45","KAHRAMANMARA\u015e":"46","KAHRAMANMARAS":"46","MARD\u0130N":"47","MARDIN":"47","MARDiN":"47","MU\u011eLA":"48","MUGLA":"48","MU\u015e":"49","MUS":"49","NEV\u015eEH\u0130R":"50","NEV\u015eEHIR":"50","NEVSEHiR":"50","N\u0130\u011eDE":"51","NI\u011eDE":"51","NiGDE":"51","ORDU":"52","R\u0130ZE":"53","RIZE":"53","RiZE":"53","SAKARYA":"54","SAMSUN":"55","S\u0130\u0130RT":"56","SIIRT":"56","SiiRT":"56","S\u0130NOP":"57","SINOP":"57","SiNOP":"57","S\u0130VAS":"58","SIVAS":"58","SiVAS":"58","TEK\u0130RDA\u011e":"59","TEKIRDA\u011e":"59","TEKiRDAG":"59","TOKAT":"60","TRABZON":"61","TUNCEL\u0130":"62","TUNCELI":"62","TUNCELi":"62","\u015eANLIURFA":"63","SANLIURFA":"63","U\u015eAK":"64","USAK":"64","VAN":"65","YOZGAT":"66","ZONGULDAK":"67","AKSARAY":"68","BAYBURT":"69","KARAMAN":"70","KIRIKKALE":"71","BATMAN":"72","\u015eIRNAK":"73","SIRNAK":"73","BARTIN":"74","ARDAHAN":"75","I\u011eDIR":"76","IGDIR":"76","YALOVA":"77","KARAB\u00fcK":"78","K\u0130L\u0130S":"79","KILIS":"79","KiLiS":"79","OSMAN\u0130YE":"80","OSMANIYE":"80","OSMANiYE":"80","D\u00dcZCE":"81","DUZCE":"81"}', true);
        $this->Data = json_decode(file_get_contents(__DIR__ . "/Data.json"), true);
    }
    
    public function __toString() {
        return implode(", ", $this->toArray());
    }

    public function toString ($String = ", ") {
        return implode($String, $this->toArray());
    }

    public function toArray () {
        $array = [$this->City];
        $this->County !== null ? $array[] = $this->County : null;
        $this->Town !== null ? $array[] = $this->Town : null;
        $this->Village !== null ? $array[] = $this->Village : null;

        return $array;
    }

    public function searchPlaque ($City = NULL) {
        if (!empty($this->Plaque[mb_strtoupper($City)])) {
            return (int) $this->Plaque[mb_strtoupper($City)];
        } else {
            throw new Exception('Invalid city');
        }
    }
    
    public function getCity ($City = NULL) {
        $this->clear();
        if (is_int($City)) {
            if (!empty($this->TurkishPlaque[$City])) {
                $this->City = $this->TurkishPlaque[$City];
                return $this;
            } else {
                throw new Exception('Invalid plaque');
            }
        } else if ($City == NULL) {
            return array_keys($this->Data);
        } else {
            if (array_key_exists(mb_strtoupper($City), $this->Data)) {
                $this->City = mb_strtoupper($City);
                return $this;
            } else {
                throw new Exception('Invalid city');
            }
        }
    }

    public function getPlaque () {
        if ($this->City !== NULL) {
            return array_search($this->City, $this->TurkishPlaque);
        } else {
            throw new Exception('Please first use getCity');
        }
    }

    public function getCounty ($County = NULL) {
        if ($this->City == NULL) {
            throw new Exception('Please first use getCity');
        } else {
            if (is_int($County)) {
                if (!empty(array_keys($this->Data[$this->City])[$County])) {
                    $this->County = array_keys($this->Data[$this->City])[$County];
                    return $this;    
                } else {
                    throw new Exception('Invalid county number');
                }
            } else if ($County == NULL) {
                return array_keys($this->Data[$this->City]);
            } else {
                if (array_key_exists($County, $this->Data[$this->City])) {
                    $this->County = $County;
                    return $this;
                } else {
                    throw new Exception('Invalid county');
                }
            }
        }
    }

    public function getTown ($Town = NULL) {
        if ($this->County == NULL) {
            throw new Exception('Please first use getCounty');
        } else {
            if (is_int($Town)) {
                if (!empty(array_keys($this->Data[$this->City][$this->County])[$Town])) {
                    $this->Town = array_keys($this->Data[$this->City][$this->County])[$Town];
                    return $this;    
                } else {
                    throw new Exception('Invalid town number');
                }
            } else if ($Town == NULL) {
                return array_keys($this->Data[$this->City][$this->County]);
            } else {
                if (array_key_exists($Town, $this->Data[$this->City][$this->County])) {
                    $this->Town = $Town;
                    return $this;
                } else {
                    throw new Exception('Invalid town');
                }
            }
        }
    }

    public function getVillage ($Village = NULL) {
        if ($this->Town == NULL) {
            throw new Exception('Please first use getTown');
        } else {
            if (is_int($Village)) {
                if (!empty(array_keys($this->Data[$this->City][$this->County][$this->Town])[$Village])) {
                    $this->Village = array_keys($this->Data[$this->City][$this->County][$this->Town])[$Village];
                    return $this;    
                } else {
                    throw new Exception('Invalid town number');
                }
            } else if ($Village == NULL) {
                return array_keys($this->Data[$this->City][$this->County][$this->Town]);
            } else {
                if (array_key_exists($Village, $this->Data[$this->City][$this->County])) {
                    $this->Village = $Village;
                    return $this;
                } else {
                    throw new Exception('Invalid town');
                }
            }
        }
    }

    public function getZipCode () {
        if ($this->Town == NULL) {
            throw new Exception('Please first use getTown');
        } else {
            if ($this->Village == NULL) {
                return $this->Data[$this->City][$this->County][$this->Town][array_keys($this->Data[$this->City][$this->County][$this->Town])[0]];
            } else {
                return $this->Data[$this->City][$this->County][$this->Town][$this->Village];
            }
        }
    }

    public function clear () {
        # Clear all datas #ü
        $this->City = NULL;
        $this->County = NULL;
        $this->Town = NULL;
        $this->Village = NULL;

        return $this;
    }
}
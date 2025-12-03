<?php

class Rumah{

    public $warnaCat = "putih";
    public $jmlkamar = 10 ;
    public $alamat = "Jln. Pasundan No. 1";

    public function __construct($warnaCat, $jmlkamar)
    {
        $this->warnaCat = $warnaCat;
        $this->jmlkamar = $jmlkamar;
    }

    public function kunciPintu () {
        return "pintu sudah dikunci";
    }
    public function gantiWarna ($warnaCat) {
        $this->warnaCat = $warnaCat ;
    }
}


function pasangListrik(Rumah $rumah)
{
    return "Rumah ini dipasang listrik, rumah yang berwarna" .
    $rumah->warnaCat;
}

$rumahAndi = new Rumah('Ungu', 1);
echo pasangListrik($rumahAndi);

//Rumah saya
$rumahSaya = new Rumah('ungu',6);
//$rumahSaya->gantiWarna('ungu');
echo "Rumah saya:". $rumahSaya->warnaCat;
echo "<br>";
echo "Rumah saya:". $rumahSaya->jmlkamar;
echo "<br>";
//Rumah tetangga
$rumahTetangga = new Rumah('kuning',3);
//$rumahTetangga->gantiWarna('kuning');
echo "Rumah tetangga:". $rumahTetangga->warnaCat;
echo "<br>";
echo "Rumah tetangga:". $rumahTetangga->jmlkamar;
echo "<br>";
?>
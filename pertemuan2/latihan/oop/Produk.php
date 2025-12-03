<?php

class Produk{

    //properti
    public $judul, $penerbit, $harga;

    public function construct( $judul, $penerbit, $harga)
    {
        $this->judul = $judul;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getlabel()
    {
        return $this->judul . "||". $this->penerbit;
    }
}

class komik extends Produk{
    public$jmlhalaman;

    public function __construct($judul, $penerbit, $harga, $jmlhalaman)
    {
        $this->jmlhalaman = $jmlhalaman;
        parent:: construct($judul, $penerbit, $harga);
    }

    public function getinfoKomik()
    {
        echo"label:" . parent::getlabel();
        echo "<br>";
        echo"harga:" . $this->harga;
        echo "<br>";
        echo"Jumlah Halaman:" . $this->jmlhalaman;
        echo "<br>";
    }
}
$komik1 = new komik("Naruto","Gramedia",1000,100);
$komik1 ->getinfoKomik();


?>
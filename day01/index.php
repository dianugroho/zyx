<?php
trait Hewan
{
  public $nama;
  public $darah = 50;
  public $jumlahKaki;
  public $keahlian;

  public function atraksi(){
    return $this->nama . " sedang " . $this->keahlian;
  }
}

trait Fight
{
  public $attackPower;
  public $defencePower;

  public function serang($nama1){
    return $this->nama . " sedang menyerang " . $nama1;
  }

  public function diserang($nama1, $attackPower1){
    $this->darah = $this->darah - $attackPower1 / $this->defencePower;
    return $this->nama . " sedang diserang " . $nama1;
  }
}

class Elang 
{
  use Hewan, Fight;
}

class Harimau 
{
  use Hewan, Fight;
}

$elang = new Elang();
$elang->nama = "Elang";
$elang->jumlahKaki = 2;
$elang->keahlian = "terbang tinggi";
$elang->attackPower = 10;
$elang->deffencePower = 5;
print_r($elang);

$harimau = new Harimau();
$harimau->nama = "Harimau";
$harimau->jumlahKaki = 4;
$harimau->keahlian = "ari cepat";
$harimau->attackPower = 7;
$harimau->deffencePower = 8;
print_r($harimau);

echo $elang->serang($harimau->nama);
echo $elang->diserang($harimau->nama, $harimau->attackPower);









trait BukaPesan
{
    protected function BukaPesan() {
      return $this->pesan;
    }
}

class PesanPrivate
{
    use BukaPesan;
    private $pesan = 'Ini pesan private';

    public function pesanPrivate() {
      return $this->BukaPesan();
    }
}


?>
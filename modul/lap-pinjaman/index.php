<?php
	
?>
<?php
 require('fpdf.php');
  include"koneksi.php";

$tgl = date('d-M-Y');

$pdf = new FPDF();

$pdf->addPage(patroit,A4);
$pdf->setAutoPageBreak(true);
$pdf->image('logo_koperasi.jpg',15,10,25,25);
$pdf->setFont('Times','b',14);


$pdf->text(55,20,'LAPORAN PEMINJAMAN ANGGOTA');
$pdf->text(68,27,'KARTIKA AGENG TIRTAYASA');
$pdf->setFont('Times','b',14);


$yi = 50;
$ya = 44;
$pdf->setFont('Times','',14);
	$pdf->line(15, 34,200, 34);
		
$pdf->setFont('Times','b',8);
$pdf->setFillColor(222,222,222);
$pdf->setXY(30,$ya);
$pdf->CELL(5,6,'No',1,0,'C',1);
$pdf->CELL(25,6,'Nomor Peminjaman',1,0,'C',1);
$pdf->CELL(25,6,'Nomor Anggota',1,0,'C',1);
$pdf->CELL(20,6,'Tgl Pinjam',1,0,'C',1);
$pdf->CELL(30,6,'Jumlah Pinjaman',1,0,'C',1);
$pdf->CELL(20,6,'Lama (Bulan)',1,0,'C',1);
$pdf->CELL(20,6,'Bunga ',1,0,'C',1);

$ya = $yi + $row;

	// Query untuk merelasikan kedua tabel
$sql = mysql_query("select * FROM pinjaman_header");
$jml = mysql_num_rows($sql);
$i = 1;
$no = 1;
$max = 61;
$row = 5;

while($data = mysql_fetch_array($sql)){
$pdf->setXY(30,$ya);
$pdf->setFont('Times','',8);
$pdf->setFillColor(255,255,255);
$pdf->cell(5,6,$no,1,0,'C',1);
$pdf->cell(25,6,$data[id_pinjam],1,0,'C',1);
$pdf->cell(25,6,$data[noanggota],1,0,'L',1);
$pdf->cell(20,6,$data[tgl],1,0,'L',1);
$pdf->cell(30,6,$data[jumlah],1,0,'L',1);
$pdf->cell(20,6,$data[lama],1,0,'L',1);
$pdf->cell(20,6,$data[bunga],1,0,'L',1);
$ya = $ya+$row;
$no++;
$i++;
	}
	

$pdf->Output('Laporan Peminjaman.pdf', I);

?>
<?php
	$lokasi="Sejarah Penjualan Langsung";
	$ply = new pelayanan();
	$tampil = $ply->tampil_sejarah_pl();
	$jml = count($tampil);

	echo '
	<div class="konten">'.$iframe.'
	<div class="lokasi">
		<label name="lokasi">'.$lokasi.'</label>
		<div class="kanan2">
			<form action="" method="get" name="fpencarian" id="fpencarian">
			<label>Terdapat <font>'.$jml." </font> ". $lokasi.' </label>
			<input name="mod" value="pelayanan"  type="hidden" >
			<input name="h" value="sejarah_pl"  type="hidden" >
			<input name="cari" value="'; if(!empty($_GET['cari'])){echo $_GET['cari'];}  echo'" id="cari" size="20" maxlength="50" class="text-pencarian" type="text"  placeholder="Pencarian Sejarah" title="Pencarian dengan No Struk"> 
			</form>
		</div>
	</div>
<table cellpadding="5" cellspacing="0" class="table">
<tr id="th">
	<th align="right" width="10px">No.</th>
	<th width="10px">Cetak</th>
	<th align="center" width="130px">No Struk</th>
	<th align="center">Nama Pelanggan</th>
	<th align="center" width="100px">Total Pembayaran</th>
	<th align="center" width="100px">Tanggal</th>
</tr>';
$no = 0;
if(count($tampil) >0){
	foreach($tampil as $data){
		$no++;
		$kolom= ($no%2 == 1)? "kolom-ganjil" : "kolom-genap";
		echo'
	<tr class="'.$kolom.'">
		<td align="right">'.$no.'</td>
		<td align="center">
			<a href="pelayanan/struk_pl.php?no_struk='.$data['no_struk'].'" title="Cetak Struk penjualan" target="framepopup" onClick="setdisplay(\'divpopup\',1)">
				<img src="../img/print.png" height="20px" width="20px">
			</a>
		</td>	
		<td>'.$data['no_struk'].'</td>
		<td align="left">'.$data['nm_plg'].'</td>
		<td align="right">';
			 
			$harga = $data['total_pembayaran'];
			$Format_Harga = number_format($harga, 0,',','.');
				echo "<span class=\"mu\">Rp. </span>".$Format_Harga;
		echo'	
		</td>
		<td align="right">'.$data['tgl_struk'].'</td>
	</tr>';
	}
}
elseif(count($tampil)==0  && !empty($_GET['cari'])){
	echo "<script type='text/javascript'> alert('Pencarian [".$_GET['cari']."] tidak ditemukan');history.back()</script>";
}
else{
	echo "<script type='text/javascript'> alert('Sejarah kosong');window.location='?mod=pelayanan&h=mulai'</script>";
} 
echo'</table></div></body></html>';
?>

<?php
$date = date('d-m-Y_H:i:s');
$filename ="riwayat_pangkat-".$date.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
echo $contents;
?>
<!DOCTYPE html>
<style>
.font {
  font-size: 11px;
}
</style>
<html lang="en">
<div id="container">
  <table border="0" width="311" height="186">
    <tr>
      <th colspan="3" width="211px" height="86px"><img src=<?= base_url(); ?>assets/nocms/images/logostmik.png width="211" height="86" /></th>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
  </table>
  <table border="0">
    <tr>
      <th align="left" valign="bottom" colspan="4"><h3>Laporan Riwayat Pangkat Pegawai</h3></th>
    </tr>
    <tr>
      <th align ="left" valign="bottom" colspan="4"><strong>Tanggal : <?php echo date('d', strtotime($tanggal))." ".date('M', strtotime($tanggal))." ".date('Y', strtotime($tanggal)); ?></strong></th>
    </tr>
  </table>
  <table class="font" border="1">
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Nama</th>
      <th scope="col">NIK</th>
      <th scope="col">Pangkat</th>
      <th scope="col">Dari Tanggal</th>
      <th scope="col">Sampai Tanggal</th>
    </tr>
    <?php
    $no=1;
    $nama = '';
    foreach ($data as $dt):
    ?>
    <tr>
      <?php
      if($nama != $dt->nama_kar){
        echo '<td>'.$no.'</td>
              <td>'.$dt->nama_kar.'</td>';
      }else{
        echo '<td></td><td></td>';
      }
      ?>
      <td><?php echo $dt->nik; ?></td>
      <td><?php echo $dt->nama_mas_pangkat; ?></td>
      <td><?php echo date('d', strtotime($dt->dari_tgl))." ".date('M', strtotime($dt->dari_tgl))." ".date('Y', strtotime($dt->dari_tgl)); ?></td>
      <td><?php echo date('d', strtotime($dt->sampai_tgl))." ".date('M', strtotime($dt->sampai_tgl))." ".date('Y', strtotime($dt->sampai_tgl)); ?></td>
    </tr>
    <?php
    if($nama != $dt->nama_kar){
        $no++;
      }else{
        
      }
    $nama = $dt->nama_kar;
    endforeach;
    ?>
  </table>
  <table align="right" border="0">
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th align="center">Pekanbaru, <?php echo date('d', strtotime($tanggal))." ".date('M', strtotime($tanggal))." ".date('Y', strtotime($tanggal)); ?></th>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th align="center">Kepala Personalia</th>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th align="center">..................................</th>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th align="center">NIP : ............................</th>
    </tr>
  </table>
</div>
</body>
</html>
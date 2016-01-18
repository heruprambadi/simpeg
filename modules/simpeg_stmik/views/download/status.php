<?php
$date = date('d-m-Y_H:i:s');
$filename ="lap_status-".$date.".xls";
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
      <?php foreach ($status_pilih as $sp): ?>
      <th align="left" valign="bottom" colspan="4"><h3>Laporan Pegawai Berdasarkan Status Pegawai <?=$sp->nama_mas_status_pegawai?></h3></th>
      <?php endforeach ?>
    </tr>
    <tr>
      <th align ="left" valign="bottom" colspan="4"><strong>Tanggal : <?php echo date('d', strtotime($tanggal))." ".date('M', strtotime($tanggal))." ".date('Y', strtotime($tanggal)); ?></strong></th>
    </tr>
  </table>
  <table class="font" border="1">
    <thead>
      <tr>
        <th rowspan="2" scope="col">No.</th>
        <th rowspan="2" scope="col">Nama</th>
        <th rowspan="2" scope="col">Tempat Lahir</th>
        <th rowspan="2" scope="col">Tanggal lahir</th>
        <th rowspan="2" scope="col">Umur</th>
        <th rowspan="2" scope="col">Jenis Kelamin</th>
        <th rowspan="2" scope="col">NIK</th>
        <th rowspan="2" scope="col">Tanggal Mulai Kerja</th>
        <th colspan="3" scope="col">Pangkat</th>
        <th rowspan="2" scope="col">Sisa Pot. Peny. Ijazah</th>
        <th rowspan="2" scope="col">Peny. Ijazah</th>
        <th rowspan="2" scope="col">Gaji</th>
        <th rowspan="2" scope="col">Beasiswa</th>
        <th rowspan="2" scope="col">Lama Studi</th>
        <th rowspan="2" scope="col">Rekomendasi</th>
      </tr>
      <tr>
        <th rowspan="1" scope="col">Tingkat</th>
        <th rowspan="1" scope="col">TMT Pangkat</th>
        <th rowspan="1" scope="col">Sampai Tanggal</th>
      </tr>
    </thead>
    <?php
    $no=1;
    foreach ($data as $dt):
    ?>
  <tbody>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $dt->nama_kar; ?></td>
      <td><?php echo $dt->tempat_lahir; ?></td>
      <td><?php echo date('d', strtotime($dt->tgl_lahir))." ".date('M', strtotime($dt->tgl_lahir))." ".date('Y', strtotime($dt->tgl_lahir)); ?></td>
      <td><?php
            $now = new DateTime("now");
            $tgl_lahir = new DateTime($dt->tgl_lahir);
            $umur = $now->diff($tgl_lahir);
            echo $umur->y.' Tahun';
          ?>
      <td>
        <?php
            if($dt->jk == 0){
              echo 'Wanita';
            }else{
              echo 'Pria';
            }
        ?>
      </td>
      <td><?php echo $dt->nik; ?></td>
      <td><?php echo date('d', strtotime($dt->tgl_mulai_kerja))." ".date('M', strtotime($dt->tgl_mulai_kerja))." ".date('Y', strtotime($dt->tgl_mulai_kerja)); ?></td>
      <td><?php echo $dt->nama_mas_pangkat; ?></td>
      <td><?php echo date('d', strtotime($dt->tmt_pangkat))." ".date('M', strtotime($dt->tmt_pangkat))." ".date('Y', strtotime($dt->tmt_pangkat)); ?></td>
      <td><?php echo date('d', strtotime($dt->tgl_sd_pangkat))." ".date('M', strtotime($dt->tgl_sd_pangkat))." ".date('Y', strtotime($dt->tgl_sd_pangkat)); ?></td>
      <td><?php echo $dt->sisa_peny_ijazah; ?></td>
      <td><?php echo date('d', strtotime($dt->peny_ijazah))." ".date('M', strtotime($dt->peny_ijazah))." ".date('Y', strtotime($dt->peny_ijazah)); ?></td>
      <td><?php echo 'Rp'.$dt->gaji; ?></td>
      <td>
        <?php
          if($dt->beasiswa == 1){
            echo 'Ya';
          }else{
            echo 'Tidak';
          }
        ?>
      </td>
      <td><?php echo $dt->lama_studi.' Tahun'; ?></td>
      <td><?php echo $dt->nama_rekomendasi; ?></td>
    </tr>
  </tbody>
  <?php
  $no++;
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
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
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
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
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
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
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
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
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
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
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
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
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
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
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
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
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
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
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
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
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
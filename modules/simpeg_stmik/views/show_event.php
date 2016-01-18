<!DOCTYPE html>
<html lang="en">
<div id="container">
	<h3>Pemberitahuan Kenaikan Pangkat/Gaji</h3>

    <table width="793.700787402" border="1">
  <tr>
    <th scope="col">Nama</th>
    <th scope="col">Nama Event</th>
    <th scope="col">Tanggal Kenaikan Pangkat</th>
  </tr>
  <tr>
  <?php foreach ($data as $dt):?>
    <td><?php echo $dt->nama_kar; ?></td>
    <td><?php echo $dt->nama_event; ?></td>
    <td><?php echo date('d', strtotime($dt->tanggal))." ".date('M', strtotime($dt->tanggal))." ".date('Y', strtotime($dt->tanggal)); ?></td>
  </tr>
  <?php endforeach; ?>
</table>

</div>

</body>
</html>
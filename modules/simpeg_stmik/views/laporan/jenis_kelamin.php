<!DOCTYPE html>
<table>
  <tr>
    <th>
      <?php
      
      if( $id == 1){
        echo '<select class="form-control" name="id_status_pegawai" id="id">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="1" selected="selected">Pria</option>
                <option value="0">Wanita</option>
              </select>';
      }elseif($id == 0){
        echo '<select class="form-control" name="id_status_pegawai" id="id">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="1">Pria</option>
                <option value="0" selected="selected">Wanita</option>
              </select>';
      }elseif($id == 2){
        echo '<select class="form-control" name="id_status_pegawai" id="id">
                <option value="" selected="selected">-- Pilih Jenis Kelamin --</option>
                <option value="1">Pria</option>
                <option value="0">Wanita</option>
              </select>';
      }
      ?>
    </th>
    <th>&nbsp;<button id="tombol" class="btn btn-primary btn-mini ">Pilih</button></th>
  </tr>
</table>
</br>
<script>
var url='<?php echo site_url('simpeg_stmik/laporan/jenis_kelamin');?>';
$('#tombol').click(function(){
  var v = $('#id').val();
  //alert(url+'/'+v)
  document.location = url+'/'+v;
});
</script>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$asset = new CMS_Asset();
$asset->add_module_css('styles/navigation.css','simpeg_stmik');
foreach($css_files as $file){
  $asset->add_css($file);
} 
echo $asset->compile_css();
foreach($js_files as $file){
  $asset->add_js($file);
}
$asset->add_module_js('scripts/navigation.js','simpeg_stmik');
echo $asset->compile_js();  
echo $output;

?>
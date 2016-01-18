<!DOCTYPE html>
<table>
  <tr>
    <th>
      <select class="form-control" name="id_status_pegawai" id='id'>
        <option value="" selected="selected">-- Pilih Pangkat --</option>
        <?php
        $selected = '';
        foreach($pangkat as $p){
          if(($p->id_mas_pangkat) == $id){
            $selected = 'selected="selected"';
            echo '<option value='.$p->id_mas_pangkat.' '.$selected.'>'.$p->nama_mas_pangkat.'</option>';
          }else{
            echo '<option value='.$p->id_mas_pangkat.'>'.$p->nama_mas_pangkat.'</option>';
          }
        }
        ?>
      </select>
    </th>
    <th>&nbsp;<button id="tombol" class="btn btn-primary btn-mini ">Pilih</button></th>
  </tr>
</table>
</br>

<script>
var url='<?php echo site_url('simpeg_stmik/laporan/pangkat');?>';
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
<!-- Include Scripts -->
<script src="<?= base_url();?>./assets/SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="<?= base_url();?>./assets/SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?= base_url();?>./assets/v_menu/blue_white.css" type="text/css" />     
<style type="text/css">
#apDiv1 {
	position:absolute;
	width:196px;
	height:115px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	width:790px;
	height:115px;
	z-index:1;
	left: 170px;
	top: 1px;
}
</style>

<table height="1000" width="900" border="0">
  <tr>
    <div id="apDiv1">
      <div id="apDiv2">
        <div id="TabbedPanels1" class="TabbedPanels">
          <ul class="TabbedPanelsTabGroup">
           <li class="TabbedPanelsTab" tabindex="0">Lampiran</li>
          </ul>
          <div class="TabbedPanelsContentGroup">
            <div class="TabbedPanelsContent"><iframe id="myframe" frameborder="0" src="<?= base_url (); ?>./simpeg_stmik/personal/foto/edit/<?= $id ?>" height="950" width="800"></iframe></div>
          </div>
        </div>
      </div>
      <div id="cssmenu">
        <ul>
          <li class="active">
            <?php foreach($data_form as $v): ?>
            <?php
			if (empty($v->foto)) {
				echo '<li class="active"><a href="'.base_url().'simpeg_stmik/personal/view_foto/'.$v->id_pegawai.'"><span><img src="'.base_url().'/assets/foto/default/default.gif"/></span></a></li><br />';
			}
			else {
				echo '<li class="active"><a href="'.base_url().'simpeg_stmik/personal/view_foto/'.$v->id_pegawai.'"><span><img src="'.base_url().'/assets/foto/'.$v->foto.'"/></span></a></li><br />';
			}
			?>
            <?php endforeach;?>
          </li>
        </ul>
      </div>
      <div id="cssmenu">
        <ul>
          <li><a href='<?= base_url(); ?>simpeg_stmik/personal/view_bio/<?= $id; ?>'><span>Biodata</span></a></li>
          <li><a href='<?= base_url(); ?>simpeg_stmik/personal/view_pend/<?= $id; ?>'><span>Pendidikan</span></a></li>
          <li><a href='<?= base_url(); ?>simpeg_stmik/personal/view_pang/<?= $id; ?>'><span>Pangkat</span></a></li>
          <li><a href='<?= base_url(); ?>simpeg_stmik/personal/view_lamp/<?= $id; ?>'><span>Lampiran</span></a></li>
        </ul>
      </div>
    </div>
  </tr>
</table>

<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
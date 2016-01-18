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
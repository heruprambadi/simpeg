<?php
    echo form_open('simpeg_stmik/search/execute_search');

    echo form_input(array('name'=>'keyword', 'class'=>'input-medium search-query'));

    echo form_submit('search_submit','Submit');


?>


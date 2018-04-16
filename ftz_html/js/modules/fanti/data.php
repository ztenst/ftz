<?php
    $data = 
    array(
        array(
            'key' => 'D',
            'list' => array(
                array('name'=>'A','value'=>0),
                array('name'=>'B','value'=>0),
                array('name'=>'C','value'=>0),
                array('name'=>'D','value'=>1),
                array('name'=>'E','value'=>0),
                array('name'=>'F','value'=>0),
            )
        ),
        array(
            'key' => 'B',
            'list' => array(
                array('name'=>'A','value'=>0),
                array('name'=>'B','value'=>1),
                array('name'=>'C','value'=>0),
                array('name'=>'D','value'=>0),
                array('name'=>'E','value'=>0),
                array('name'=>'F','value'=>0),
            )
        ),
        array(
            'key' => 'C',
            'list' => array(
                array('name'=>'A','value'=>0),
                array('name'=>'B','value'=>0),
                array('name'=>'C','value'=>1),
                array('name'=>'D','value'=>0),
                array('name'=>'E','value'=>0),
                array('name'=>'F','value'=>0),
            )
        ),
        array(
            'key' => 'D',
            'list' => array(
                array('name'=>'A','value'=>0),
                array('name'=>'B','value'=>0),
                array('name'=>'C','value'=>0),
                array('name'=>'D','value'=>1),
                array('name'=>'E','value'=>0),
                array('name'=>'F','value'=>0),
            )
        ),
        array(
            'key' => 'A',
            'list' => array(
                array('name'=>'A','value'=>1),
                array('name'=>'B','value'=>0),
                array('name'=>'C','value'=>0),
                array('name'=>'D','value'=>0),
                array('name'=>'E','value'=>0),
                array('name'=>'F','value'=>0),
            )
        )
    );
echo json_encode($data,true);
?>

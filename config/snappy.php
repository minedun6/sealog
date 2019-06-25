<?php

return array(

    'pdf' => array(
        'enabled' => true,
        'binary'  => env('SNAPPY_PDF', 'C:\\wamp\\toools\\wkhtmltopdf\\bin\\wkhtmltopdf.exe'),
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => env('SNAPPY_IMAGE', 'C:\\wamp\\toools\\wkhtmltopdf\\bin\\wkhtmltopdf.exe'),
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);

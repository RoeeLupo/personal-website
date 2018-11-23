<?php $data->hello = "world";
header('Content-type: application/json');
echo json_encode( $data );

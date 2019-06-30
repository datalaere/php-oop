<?php 

// Objects in php
$object = new stdClass; 
$object->names = ['John', 'Billy', 'Susan', 'Max']; 

foreach($object->names as $name){ 
    echo $name . '<br>'; 
}

<?php
function urlIs($value){
 return $_SERVER['REQUEST_URI']=== $value;
}

function dd($value){
    echo "<pre>";
    echo var_dump($value);
    echo "</pre>";
    die();


}
?>
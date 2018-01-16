<?php
    extract($_FILES);
    if(isset($file)){
        extract($file);
        echo "name: $name<br/>";
        echo "type: $type<br/>";
        echo "size: $size<br/>";
        
        move_uploaded_file($tmp_name, $name);
        echo "<img src=$name />";
    }
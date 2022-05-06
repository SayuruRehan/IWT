<!DOCTYPE html>
<html>
    <body>
        <h2>PHP ARRAYS</h2>
        <?php
          $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43")
            
          foreach($age as $key => $value) {
            echo "Key = " .$key. ", Value=" .$value. "<br>";
          }          
        ?>
    </body>
</html>
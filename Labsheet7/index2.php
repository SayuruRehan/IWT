<!DOCTYPE html>
<html>
    <body>
        <h2>PHP ARRAYS</h2>
        <?php
          $animals = arrays("Dogs", "Cats", "Foxes");
          $animals[3] = "Elephants";
          $animals[4] = "Cows";

          echo "I like " . $animals[0] . "," . $animals[1] . "," . $animals[2] . "," . $animals[3] . "," . $animals[4];
          
        ?>
    </body>
</html>
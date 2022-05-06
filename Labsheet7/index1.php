<!DOCTYPE html>
<html>
    <body>
        <h2>PHP LOOPS</h2>
        <?php
            
          $mark = 50;
          if ($mark >= 75){
            $grade = "A";
          }else if ($mark >= 65){
            $grade = "B";
          }else if ($mark >= 45){
            $grade = "C";
          }else {
            $grade = "F";
          }

          echo "Grade: ". $grade;
        ?>
    </body>
</html>
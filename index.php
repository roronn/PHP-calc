<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="number" name="num01" placeholder="input number" required><br>
       <br>
        <input type="radio" id="add" name="operator" value="add" checked> + <br>
        <input type="radio" id="subtract" name="operator" value="subtract"> - <br>
        <input type="radio" id="multiply" name="operator" value="multiply"> * <br>
        <input type="radio" id="divide" name="operator" value="divide"> / <br>
        <br>
        <input type="number" name="num02" placeholder="input number" required><br><br>
        <button>Calc</button>
   </form><br>

   <?php
   if($_SERVER["REQUEST_METHOD"] == "POST"){
        // grab data from inputs
        $num01 = filter_input(INPUT_POST,"num01", FILTER_SANITIZE_NUMBER_FLOAT);
        $num02 = filter_input(INPUT_POST,"num02", FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = htmlspecialchars($_POST ["operator"]);

        // error handlers
        $errors = false;

        if($num02 == 0 && $operator == "divide"){
            echo" Cant divide with zero ";
            $errors = true;

        } else if(!is_numeric($num01) || !is_numeric($num02)){
            echo" Fill with numbers only";
            $errors = true;

        }else if(empty($num01) || empty($num02)){
            echo" Fill in all fields";
            $errors = true;

        }
            // calc the num
        if(!$errors){

            $value = 0;

            switch($operator){
                case "add":
                    $value = $num01+$num02;
                    break;
                case "subtract":
                    $value = $num01-$num02;
                    break;
                case "multiply":
                    $value = $num01*$num02;
                    break;
                case "divide":
                    $value = $num01/$num02;
                    break;
                default:
                    echo "something went wrong";
            }

            echo "Result = " .$value;
        }


    }

   ?>

</body>
</html>

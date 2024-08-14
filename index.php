<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="calci.css">
    <title> PHP Calculator </title>
</head>
<body>

    <div class="main">

        <h2> PHP Calculator </h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <input type="number" name="num1" id="num1" placeholder= "Enter Number 01">

        <br> <br>

        <span> Select Operation : </span>

        <select name="operator" id="operator">

            <option value="add"> + </option>
            <option value="sub"> - </option>
            <option value="multiply"> * </option>
            <option value="divide"> / </option>
        </select>

        <br> <br>

        <input type="number" name="num2" id="num2" placeholder= "Enter Number 02">

        <br> <br>

        <button> Calculate </button>

        </form>

    </div>

    <?php

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        // Getting Data 

        $num1 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
        $num2 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = htmlspecialchars($_POST["operator"]);

        // Error Handling

        $error = false;

        // Checking Empty or Not

        if( empty($num1) || empty($num2) || empty($operator) )
        {
            echo "<p class='error'> Enter The Necessary Fields </p>" ;

            $error = true;
        }

        // Checking Whether Entered value is a NUmber or NOt

        else if( !is_numeric($num1) || !is_numeric($num2))
        {
            echo "<p class='error'> Only Numbers are Allowed! </p>" ;

            $error = true;
        }

        // Doing the calculation

        if(!$error)
        {
            $val = 0.00;
            switch($operator)
            {
                case 'add':
                    $val = $num1+$num2;
                    break;
                
                case 'sub':
                    $val = $num1-$num2;
                    break;

                case 'multiply':
                    $val= $num1*$num2;
                    break;
                
                case 'divide':
                    $val = $num1/$num2;
                    break;
                
                default :
                echo "<p class='error'> Something Went Wrong!! </p>" ;

            }

            echo "<p class='result'> Result = $val </p> " ;
        }

    }

    ?>
    

</body>
</html>
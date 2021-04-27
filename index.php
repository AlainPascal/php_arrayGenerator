<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .error {color: #FF0000;}
    </style>
    <title>Array Generator</title>
</head>
<body>
    <?php
        // define variables and set to empty values
        $sizeError = "";
        $arraySize = 0;
        $generated = false;

        // do the following when the button is clicked
        if(isset($_POST['btnGenerate'])){
            // set input from form to variable
            $arraySize = $_POST['array_size'];

            // check whether input variable is empty or not numeric
            if(is_numeric($arraySize) == false || empty($arraySize)){
                $sizeError = "Invalid array size";
            }else{
                // define the array of random numbers based on the given size
                $arrayOfInt = array();
                for($i = 0; $i < $arraySize; $i++){
                    $arrayOfInt[$i] = mt_rand(10, 100);
                }

                $generated = true;
            }
        }
    ?>

    <form method="POST">
        <table>
            <tr>
                <td><label for="array_size">Enter size of array:</label></td>
                <td>
                <input type="text" name="array_size">
                <span class="error">* <?php echo $sizeError; ?></span>
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="btnGenerate">Generate</button></td>
            </tr>
        </table>
    </form>

    <?php
        if($generated == true){
            // display array elements separated by commas
            $arrayElements = implode(', ', $arrayOfInt);
            echo "<br><br>Generated Array = [" . $arrayElements . "]";

            echo "<br><br> Size of generated array is ". $arraySize. "<br>";
        }
    ?>
</body>
</html>
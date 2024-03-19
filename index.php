<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <p>Podaj 6 liczb do tych pól</p>
        <input type="number" name="one"><br>
        <input type="number" name="two"><br>
        <input type="number" name="three"><br>
        <input type="number" name="four"><br>
        <input type="number" name="five"><br>
        <input type="number" name="six"><br>
        <button type="submit">Sprawdź</button>
    </form>
    <?php
        if(isset($_POST['one'])){
            $string = $_POST['one']." ".$_POST['two']." ".$_POST['three']." ". $_POST['four']." ". $_POST['five']." ".$_POST['six'];
            //echo $string."<br>";
            $liczby = explode(" ", $string);
            sort($liczby);
            $lines = file("dl.txt");
            for($i = 0; $i < count($lines); $i++){
                $count = 0;
                $line = explode(" ", $lines[$i]);
                $numbers = array($line[2], $line[3], $line[4],$line[5], $line[6], $line[7]);
                for($j = 0; $j < 6; $j++){
                    if($liczby[$j] == $numbers[$j]){
                        $count += 1;
                    }
                    if($count == 6){
                        echo "Wylosowano te liczby dnia: ".$line[1];
                    }
                }
                sort($numbers);
                //print_r($numbers);
                //echo "<br>";
            }
            
        }
        
    ?>
</body>
</html>
<?php

	$hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "items";

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    $name = "phones";
    $query ="SELECT `name` FROM `items` where name =".$name;

    $result = $connect->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "pricea" . $row["pricea"]. "<br>";
    }
} else {
    echo "0 results";
}


?>
                                        <!DOCTYPE html>
                                        <html>
                                        <body>
                                        <form>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Your product price before GST</label>
                                                <p class="form-control" id="formGroupExampleInput"><?php echo($row['priceb']); ?></p>
                                                    
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput2">Price after GST </label>
                                                <p class="form-control" id="formGroupExampleInput"><?php echo($row['pricea']); ?></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput2">% Rise/Fall </label>
                                                 <p class="form-control" id="formGroupExampleInput">$row['priceb']</p>
                                            </div>
                                        </form>
                                        </body>
<?php

	$hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "items";

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    $name = $_POST['name'];
    $query = "select name,priceb,pricea from items where id =$name";
    
    $q = mysqli_query($connect,$query);
    
                                        <form>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Your product price before GST</label>
                                                <p class="form-control" id="formGroupExampleInput">$row['priceb']</p>
                                                    
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput2">Price after GST </label>
                                                <p class="form-control" id="formGroupExampleInput">$row['pricea']</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput2">% Rise/Fall </label>
                                                 <p class="form-control" id="formGroupExampleInput">$row['priceb']</p>
                                            </div>
                                        </form>
    

?>
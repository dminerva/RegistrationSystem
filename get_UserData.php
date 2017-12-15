<?php
if(!empty($_POST["user_data"])) {
    include 'connectDB.php';   

    if($_POST["user_data"] == "student") {
        $full = 0;
        $part = 0;
        $total = 0;

        $count = 0;
        
        $sql = "SELECT * FROM ".$_POST["user_data"]." AS ut
                LEFT JOIN user AS u on ut.UserEmail=u.UserEmail";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row["Type"] == "fulltime") {
                    $full++;
                } else {
                    $part++;
                }
            }
        }

        echo "<p>amount of fulltime students: ".$full."</p>";
        echo "<p>amount of parttime students: ".$part."</p>";
        $total = $full + $part;
        echo "<p>total students: ".$total."</p>";
    } else {
        $count = 0;
        
        $sql = "SELECT * FROM ".$_POST["user_data"]." AS ut
                LEFT JOIN user AS u on ut.UserEmail=u.UserEmail";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $type = $row["Type"];
                $count++;
            }
        }

        echo "<p>amount of ".$type.": ".$count."</p>";
    }

}

?>
<?php
if(!empty($_POST["user_data"])) {
    include 'connectDB.php';   

    if($_POST["user_data"] == "student") {
        $full = 0;
        $part = 0;

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

        echo "fulltime: ".$full." - parttime: ".$part;
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

        echo "amount of ".$type.": ".$count;
    }

}

?>
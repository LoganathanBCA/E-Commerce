<?php 
session_start();
include("config.php");

if(isset($_POST["txt"])) {
    $txt = trim($_POST["txt"]);

    if(!empty($txt)) {
        // Use prepared statements to prevent SQL injection
        $sql = "SELECT * FROM user_reg 
                WHERE UNAME LIKE ? OR UMAIL LIKE ? OR UPHONE LIKE ? OR APHONE LIKE ?";
        $stmt = $con->prepare($sql);
        $searchParam = "%{$txt}%";
        $stmt->bind_param("ssss", $searchParam, $searchParam, $searchParam, $searchParam);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            echo "<table class='table table-hover table-bordered table-striped'>";
            echo '
                <thead class="text-primary">
                    <tr>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Street - 1</th>
                        <th>Street - 2</th>
                        <th>Landmark</th>
                        <th>Place</th>
                        <th>Contact-1</th>
                        <th>Contact-2</th>
                        <th>View</th>
                    </tr>
                </thead>';
            
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $i++;
                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>" . htmlspecialchars($row["UNAME"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["UMAIL"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["STR1"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["STR2"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["LAND"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["UPLACE"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["UPHONE"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["APHONE"]) . "</td>";
                echo '<td><a href="admin_view_cus.php?id=' . htmlspecialchars($row["UID"]) . '" target="_blank" class="btn btn-info btn-xs">View</a></td>';
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<h3 style='color:red;'><i class='fa fa-bell'></i> No Records Found</h3>";
        }

        $stmt->close();
    } else {
        echo "<p style='margin-top:20px;font-weight:bold;'>Please Enter Search Text</p>";
    }
} else {
    echo "<p style='margin-top:20px;font-weight:bold;'>Invalid request</p>";
}
?>

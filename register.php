<?php
require_once 'regdbconfig.php';

if ($_POST) {
    $user_name = trim($_POST['user_name']);
    $user_email = trim($_POST['user_email']);
    $user_password = trim($_POST['password']);
    $user_cont = trim($_POST['user_cont']);
    $joining_date = date('Y-m-d H:i:s');
    $user_place = trim($_POST['user_place']);

    // Hash password securely
    

    try {
        // Check if email or phone already exists
        $stmt = $db_con->prepare("SELECT * FROM user_reg WHERE UMAIL = :email OR UPHONE = :phone");
        $stmt->execute([":email" => $user_email, ":phone" => $user_cont]);
        $count = $stmt->rowCount();

        if ($count == 0) {
            // Insert new user
            $stmt = $db_con->prepare("INSERT INTO user_reg (UNAME, UMAIL, UPASS, LOGS, UPHONE, UPLACE) 
                                      VALUES (:uname, :email, :pass, :jdate, :uphone, :uplace)");
            $stmt->bindParam(":uname", $user_name);
            $stmt->bindParam(":email", $user_email);
            $stmt->bindParam(":pass", $user_password);
            $stmt->bindParam(":jdate", $joining_date);
            $stmt->bindParam(":uphone", $user_cont);
            $stmt->bindParam(":uplace", $user_place);

            if ($stmt->execute()) {
                echo json_encode(["status" => "success", "message" => "User registered successfully."]);
            } else {
                echo json_encode(["status" => "error", "message" => "Registration failed. Please try again."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Email or phone number already registered."]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
}
?>

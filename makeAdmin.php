<?PHP

require_once 'PHP/connect.php';

if (isset($_POST['makeAdmin'])) {
    $email = trim($_POST['email-address']);
    $email = stripslashes($email);

    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $count = $result->num_rows;

    if ($count == 1) {

        $stmt = $conn->prepare("DELETE FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->close();
        header("location: admin.php");
    } else {
        $errType = "Warning";
        $errMsg = "User does not exit";
    }
}
?>
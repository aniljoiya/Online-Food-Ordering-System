<?php
include 'connection/connect.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['reset'])) {
    $newPassword = md5($_POST['new_password']);
    $email = $_SESSION['email'];

    // Use $db instead of $conn (correct variable from connect.php)
    $updatePassword = "UPDATE users SET password='$newPassword' WHERE email='$email'";
    if ($db->query($updatePassword) === TRUE) {
        echo "<script>alert('Password updated successfully. Redirecting to login...');</script>";
        session_destroy();
        echo "<script>setTimeout(function(){ window.location.href = 'login.php'; }, 1000);</script>";
        exit();
    } else {
        echo "Error: " . $db->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
    #resetPasswordForm {
    display: block; /* Hide by default */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    height:800px;
    width: 520px;
    padding: 2rem;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
    justify-content: center; 
    
}

h1 {
    font-size: 2rem;
    font-weight: bold;
    color: #4a4e69;
    text-align: center;
    margin-bottom: 1.5rem;
}

/* Form Container */
form {
    background: #ffffff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
    width: 400px;
    text-align: center;
}

form input {
    width: 90%;
    padding: 0.8rem;
    margin: 0.8rem 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
    background-color: #f9f9f9;
    transition: 0.3s ease;
}

form input:focus {
    border-color: #4a4e69;
    background-color: #ffffff;
    outline: none;
}

form input::placeholder {
    color: #aaa;
}

form button {
    width: 90%;
    padding: 0.8rem;
    margin-top: 1rem;
    font-size: 1rem;
    font-weight: bold;
    color: #ffffff;
    background-color: rgb(125,125,235);
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

form button:hover {
    background: #07001f;
    transform: scale(1.03);
    text-decoration: none;
    color: white;
}
    </style>
</head>
<body>
<div id="resetPasswordForm">
    <h1>Reset Password</h1>
    <form method="post" action="">
        <input type="password" name="new_password" placeholder="Enter new password" required><br>
        <button type="submit" name="reset">Reset Password</button>
    </form>
</div>

</body>
<script src="login.js"></script>
</html>

<?php
include 'connection/connect.php'; // This sets $db, not $conn

if (isset($_POST['recover'])) {
    $email = $_POST['email'];
    $nickname = $_POST['nickname'];
    $petname = $_POST['petname'];
    $hobby = $_POST['hobby'];

    // Use the correct variable ($db)
    $checkUser = "SELECT * FROM users WHERE email='$email' AND nickname='$nickname' AND petname='$petname' AND hobby='$hobby'";
    $result = $db->query($checkUser);

    if ($result && $result->num_rows > 0) {
        session_start();
        $_SESSION['email'] = $email;
        header("Location: reset_password.php");
        exit(); // Always good practice after redirection
    } else {
        echo "<script>alert('Incorrect details. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover Password</title>
    <style>
body {
    background-color: #c9d6ff;
    background: linear-gradient(to right, #e2e2e2,#c9d6ff);
    font-family: 'Arial', sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
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


/* Responsive Design */
@media (max-width: 768px) {
    form {
        width: 90%;
    }
}

#recoverPasswordForm {
    display: block; /* Hide by default */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 520px;
    padding: 2rem;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
}
    </style>
</head>

<body>
<div id="recoverPasswordForm">
    <h1>Recover Password</h1>
    <form method="post" action="">
        <input type="email" name="email" placeholder="Enter your email" required><br>
        <input type="text" name="nickname" placeholder="What is your nickname?" required><br>
        <input type="text" name="petname" placeholder="What is your pet's name?" required><br>
        <input type="text" name="hobby" placeholder="What is your hobby?" required><br>
        <button type="submit" name="recover" id=""recover>Recover</button>
    </form>
</div>

</body>
<script src="login.js"></script>
</html>

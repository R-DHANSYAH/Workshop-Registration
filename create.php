<?php

include "config.php";

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $userid = $_POST['userid'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $gender = $_POST['gender'];
  $workshop = $_POST['workshop'];

  $sql = "INSERT INTO `users`(`name`, `userid`, `email`, `phone`, `gender`, `workshop`) VALUES ('$name','$userid','$email','$phone','$gender','$workshop')";

  $result = $conn->query($sql);

  if ($result == TRUE) {
    echo "New record created successfully.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}

?>

<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      background-image: url('m.png');
      background-repeat: no-repeat;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background-color: #fff;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      width: 700px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 10px;
    }

    input[type="radio"] {
      margin-right: 5px;
    }

    input[type="submit"] {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <div class="container">
    <form action="" method="POST">
      <fieldset>
        <h2>Registration Form</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="idd">Userid:</label>
        <input type="text" id="idd" name="userid" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required pattern="[0-9]{10}">
        <select id="phoneCode">
          <option value="+91">+91</option>
          <option value="+51">+51</option>
          <option value="+01">+01</option>
          <option value="+53">+53</option>
          <option value="+00">+00</option>
        </select><br>
        <label for="Gender">Gender:</label>
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female<br>
        <label for="workshop">Workshop:</label>
        <select id="workshop" name="workshop" required>
          <option value="" disabled selected>Select a workshop</option>
          <option value="Web Development">Introduction to Web Development</option>
          <option value="Data Science">Advanced Data Science</option>
          <option value="Next Quarter Schedule">Next Quarter Workshop Schedule</option>
        </select><br><br>
        <input type="submit" name="submit" value="Submit">
      </fieldset>
    </form>
  </div>
</body>

</html>

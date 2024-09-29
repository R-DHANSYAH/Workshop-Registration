<?php

include "config.php";

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $user_id = $_POST['userid'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $workshop = $_POST['workshop'];

    $sql = "UPDATE `users` SET `name`='$name', `email`='$email', `phone`='$phone', `gender`='$gender', `workshop`='$workshop' WHERE `userid`='$user_id'";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "SELECT * FROM `users` WHERE `userid`='$user_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $gender = $row['gender'];
            $workshop = $row['workshop'];
            $id = $row['userid'];
        }
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <title>User Update Form</title>
            <style>
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    background-color: #f2f2f2;
                }

                .container {
                    background-color: #fff;
                    padding: 20px;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    max-width: 400px;
                    margin: 0 auto;
                }

                h2 {
                    text-align: center;
                }

                form {
                    text-align: center;
                }

                label {
                    display: block;
                    margin-bottom: 10px;
                }

                input[type="text"],
                input[type="email"],
                input[type="tel"] {
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    margin-bottom: 10px;
                }

                input[type="radio"] {
                    margin-right: 5px;
                }

                select {
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    margin-bottom: 10px;
                }

                input[type="submit"] {
                    display: block;
                    width: 100%;
                    padding: 10px;
                    margin-top: 10px;
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
                <h2>User Update Form</h2>
                <form action="" method="post">
                    <fieldset>
                        <legend>Personal information:</legend>
                        <label>User ID:</label>
                        <input type="text" name="userid" value="<?php echo $id; ?>" readonly><br>
                        <label>Name:</label>
                        <input type="text" name="name" value="<?php echo $name; ?>"><br>
                        <label>Email:</label>
                        <input type="email" name="email" value="<?php echo $email; ?>"><br>
                        <label>Phone:</label>
                        <input type="tel" name="phone" value="<?php echo $phone; ?>"><br>
                        <label>Gender:</label>
                        <input type="radio" name="gender" value="Male" <?php if ($gender === 'Male') { echo "checked"; } ?>>Male
                        <input type="radio" name="gender" value="Female" <?php if ($gender === 'Female') { echo "checked"; } ?>>Female<br><br>
                        <label>Workshop:</label>
                        <select id="workshop" name="workshop" required>
                            <option value="" disabled selected>Select a workshop</option>
                            <option value="Web Development" <?php if ($workshop === 'Web Development') { echo "selected"; } ?>>Introduction to Web Development</option>
                            <option value="Data Science" <?php if ($workshop === 'Data Science') { echo "selected"; } ?>>Advanced Data Science</option>
                            <option value="Next Quarter Schedule" <?php if ($workshop === 'Next Quarter Schedule') { echo "selected"; } ?>>Next Quarter Workshop Schedule</option>
                        </select><br><br>
                        <input type="submit" value="Update" name="update">
                    </fieldset>
                </form>
            </div>
        </body>
        </html>

    <?php
    } else {
        header('Location: view.php');
    }
}

?>

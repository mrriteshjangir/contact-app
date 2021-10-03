<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $sname = $_POST['studName'];
    $courses = implode(" ", $_POST['studCourses']);

    $sql = "INSERT INTO demo(sname,courses)VALUES('$sname','$courses')";
    if ($conn->query($sql)) {
        echo "Data added";
    } else {
        echo "Error is " . $conn->error;
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td,
        tr {
            border: 1px;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>courses</th>
            <th>Edit</th>
        </tr>

        <?php
        $sql1 = "SELECT * FROM demo";

        $result = $conn->query($sql1);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {


                echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['sname'] . "</td>
                    <td><ol>";

                if ($row['courses']!=NULL) {
                    $cList = explode(" ", $row['courses']);
                    foreach ($cList as $item) {
                        echo "<li><a href='".$item.".php'>" . $item . "</a></li>";
                    }
                }
                else
                {
                    echo "No course found";
                }
                
                echo "</ol>
                    </td>
                    <td>
                    <a href='updatecb.php?id=" . $row['id'] . "'>Edit</a>
                    </td>
                    </tr>";
            }
        } else {
            echo "No data Found";
        }

        ?>
    </table>
    <form action="" method="POST">
        <input type="text" placeholder="Enter student name" name="studName" onkeyup="console.log(value)" /><br><br>
        <input type="checkbox" name="studCourses[]" value="C" /> C Language <br><br>
        <input type="checkbox" name="studCourses[]" value="Java" /> Java Language <br><br>
        <input type="checkbox" name="studCourses[]" value="PHP" /> PHP Language <br><br>
        <input type="checkbox" name="studCourses[]" value="MERN" /> MERN Language <br><br>
        <button type="submit" name="submit">Upload</button>
    </form>

</body>

</html>
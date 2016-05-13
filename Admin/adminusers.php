<?php
$page_title = "Admin User";


?>
<!DOCTYPE html>
<html>
<head>
    <title>Blurt <?php echo $page_title ?></title>
</head>
<body>
<?php
include('adminnav.php');
?>
<table>
    <thead>
    <tr>
    <th>User ID</th>
    <th>Username</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Remove</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php
        $dbh = new PDO('mysql:host=localhost;dbname=blurtdb;', 'root', 'root');
        $query = "SELECT * FROM users";
        $stmt = $dbh -> prepare($query);
        $stmt -> execute();
        $results = $stmt -> fetchAll();

        foreach($results as $row){
        ?>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['first_name']; ?></td>
        <td><?php echo $row['last_name']; ?></td>
        <?php
        echo '<td><a href="removeusers.php?id=' . $row['id'] . '&amp;username=' . $row['username'] .
            '&amp;first_name=' . $row['first_name'] . '&amp;last_name=' . $row['last_name'] .
            '&amp;password=' . $row['password'] . '&amp;email='. $row['email'] .'&amp;description='. $row['description'].'">Remove</a>';
        ?>

    </tr>
    <?php
    }
    ?>
    </tbody>
</table>

</body>
</html>

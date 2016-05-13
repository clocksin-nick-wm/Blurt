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
        <th>Post Time</th>
        <th>Post ID</th>
        <th>Username</th>
        <th>Post</th>
        <th>Remove</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php
        $dbh = new PDO('mysql:host=localhost;dbname=blurtdb;', 'root', 'root');
        $query = "SELECT * FROM posts ORDER BY post_time DESC";
        $stmt = $dbh -> prepare($query);
        $stmt -> execute();
        $results = $stmt -> fetchAll();

        foreach($results as $row){
        ?>
        <td><?php echo $row ['post_time']?></td>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['post']; ?></td>
        <?php
        echo '<td><a href="removepost.php?post_time='. $row['post_time'] . 'id=' . $row['id'] . '&amp;username=' . $row['username'] .
            '&amp;user_id=' . $row['user_id'] . '&amp;post=' . $row['post'] .'">Remove</a>';
        ?>

    </tr>
    <?php
    }
    ?>
    </tbody>
</table>

</body>
</html>

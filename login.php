<?php

  require_once('start_session.php');

  // Start the session
  session_start();

  // Clear the error message
  $error_msg = "";

  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['user_id'])) {

      if (isset($_POST['submit'])) {

          // Connect to the database
          $dbh = new PDO('mysql:host=127.0.0.1; dbname=blurtdb', 'root', 'root');

          // Grab the user-entered log-in data
          $username = trim($_POST['username']);
          $password =trim($_POST['password']);

          if (!empty($username) && !empty($password)) {

              // Look up the username and password in the database
              $query = "SELECT id, username FROM users WHERE username = :username AND password = SHA(:password)";

              $stmt = $dbh->prepare($query);
              $stmt->execute(
                  array(

                      'username' => $username,
                      'password' => $password

                  ));

              $results = $stmt->fetchAll();

              if (count($results) == 1) {

                  // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page

                  $row = $results[0];

                  $_SESSION['user_id'] = $row['id'];
                  $_SESSION['username'] = $row['username'];

                  setcookie('user_id', $row['id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                  setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days

                  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';

                  header('Location: ' . $home_url);

              } else {

                  // The username/password are incorrect so set an error message
                  $error_msg = 'Sorry, you must enter a valid username and password to log in.';
              }

          } else {

              // The username/password weren't entered so set an error message
              $error_msg = 'Sorry, you must enter your username and password to log in.';
          }

      }

  }

  // Insert the page header
  $page_title = 'Log In';

  // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in

  if (empty($_SESSION['user_id'])) {
      echo '<p class="error">' . $error_msg . '</p>';

      ?>

      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

          <fieldset>
              <legend>Log In</legend>
              <label for="username">Username:</label>
              <input type="text" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
              <label for="password">Password:</label>
              <input type="password" name="password" />
          </fieldset>
          <input type="submit" value="Log In" name="submit" />

      </form>

      <?php

  } else {
      // Confirm the successful log-in
      echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
  }

?>

<footer><p>&copy Blurt 2016</p></footer>
</body>
</html>


<?php include 'inc/header.php'; ?>


<?php


if (isset($_POST["submit"])) {
  // variables
  $name = $email = $body = "";
  // error handling
  $nameErr = $emailErr = $bodyErr = "";

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    //sanitize input
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    //sanitize input
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
  }
  if (empty($_POST["body"])) {
    $bodyErr = "Text is required";
  } else {
    //sanitize input
    $body = filter_input(INPUT_POST, "body", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  // check there is no Errors
  if (empty($nameErr) && empty($EmailErr) && empty($bodyErr)) {
    // add to the database
    $sql = "INSERT INTO feedback (name,email,body) VALUES ('$name','$email','$body')";

    if (mysqli_query($conn, $sql)) {
      // success redirect
      header("Location:feedback.php");
    } else {
      // error
      echo 'Error: ' . mysqli_error($conn);
    }
  }
}



?>
<img src="/php-crash/feedback/img/logo.png" class="w-25 mb-3" alt="" />
<h2>Feedback</h2>
<p class=" lead text-center">Leave feedback for Traversy Media</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" class="mt-4 w-75">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" />
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" />
  </div>
  <div class="mb-3">
    <label for="body" class="form-label">Feedback</label>
    <textarea class="form-control" id="body" name="body" placeholder="Enter your feedback"></textarea>
  </div>
  <div class="mb-3">
    <input type="submit" name="submit" value="Send" class="btn btn-dark w-100" />
  </div>
</form>
</div>
</main>

<?php include 'inc/footer.php' ?>
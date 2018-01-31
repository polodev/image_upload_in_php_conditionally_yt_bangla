<?php 
$message = '';
if (isset($_FILES['image'])) {
  $file = $_FILES['image'];
  $name = $file['name']; //mark.jpg
  if (!file_exists('uploads')) {
    mkdir('uploads'); //make directory
  }
  $destination = 'uploads/' . $name;
  $exploded_name = explode('.', $name);
  $extension = end($exploded_name); // jpg
  $images_extensions = ['jpg', 'png', 'jpeg', 'gif'];
  $tmp_name = $file['tmp_name'];
  if (in_array($extension, $images_extensions)) {
    move_uploaded_file($tmp_name, $destination);
    $message = 'you have successfully uploaded ' . $name ;
  } else {
    $message = 'Your file must be an image';
  }
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Image upload</title>
  <style>
    label, input {
      display: block;
      margin: 15px 0;
    }
    label {
      font-size: 20px;
      font-family: arial, sans-serif;
    }
    button {
      background: teal;
      color: white;
      padding: 10px 15px;
      border: 1px solid tomato;
    }
  </style>
</head>
<body>
  <?php if(!empty($message)): ?>
    <div class="message">
      <?= $message; ?>
    </div>
  <?php endif; ?>
  <form method="post" enctype="multipart/form-data">
    <label>Image upload</label>
    <input type="file" name="image">
    <button type="submit">upload file</button>
  </form>
</body>
</html>
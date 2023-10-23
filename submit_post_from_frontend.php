// In order to submit the post from frontend we need to create the form.

<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled Document</title>
</head>

<body>
<div id="wrap">
<form action="" method="post">
<table border="1" width="200">
  <tr>
    <td><label for="post_title">Post Title</label></td>
    <td><input name="post_title" type="text" /></td>
  </tr>
  <tr>
    <td><label for="post">Post</label></td>
    <td><input name="post" type="text" /></td>
  </tr>
</table>

<input name="submit" type="submit" value="submit" />
</form>
</div>

</body>
</html>

*************************************************************************************************************************

// Here is the php code to submit the post.

<?php $postTitle = $_POST['post_title'];
$post = $_POST['post'];
$submit = $_POST['submit'];

if(isset($submit)){

    global $user_ID;

    $new_post = array(
        'post_title' => $postTitle,
        'post_content' => $post,
        'post_status' => 'publish',
        'post_date' => date('Y-m-d H:i:s'),
        'post_author' => $user_ID,
        'post_type' => 'post',
        'post_category' => array(0)
    );

    wp_insert_post($new_post);

}

?>

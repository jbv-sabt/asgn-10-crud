<?php require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('index.php'));
}
$id = $_GET['id'];
$subject = find_salamander_by_id($id);



if(is_post_request()) {

  // Handle form values sent by new.php

  $name = $_POST['name'] ?? '';
  $habitat = $_POST['habitat'] ?? '';
  $description = $_POST['description'] ?? '';

  echo "Form parameters<br />";
  echo "Salamander name: "'" . $salamanderName . "'";
}

?>


<?php $page_title = 'Edit Salamander'; ?>
<?php include(SHARED_PATH . '/salamanderHeader.php'); ?>

  <a class="back-link" href="<?= url_for('index.php'); ?>">&laquo; Home</a>

    <h1>Edit Salamander</h1>

    <form action="<?= url_for('salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Name</dt>
        <dd><input type="text" name="salamanderName" value="" /></dd>
      </dl>
      <dl>
      <dl>
        <dt>Habitat</dt>
        <dd><textarea name ="habitat" rows="4" cols="75"></textarea></dd>
      </dl>
      <dl>
        <dt>Description</dt>
        <dd><textarea name = "habitat" rows="4" cols ="75"></textarea></dd>
      </dl>
        <input type="submit" value="Edit Salamander" />
    </form>

<?php include(SHARED_PATH . '/salamanderFooter.php'); ?>

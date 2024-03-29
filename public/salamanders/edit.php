<?php require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('index.php'));
}

$id = $_GET['id'];

if(is_post_request()) {

  // Handle form values sent by edit.php

  $salamander = [];
  $salamander['id'] = $id;
  $salamander['name'] = $_POST['name'] ?? '';
  $salamander['habitat'] = $_POST['habitat'] ?? '';
  $salamander['description'] = $_POST['description'] ?? '';

  $result = update_salamander($salamander);
  }

else {
  $salamander = find_salamander_by_id($id); 
}
?>

<?php $page_title = 'Edit Salamander'; ?>
<?php include(SHARED_PATH . '/salamanderHeader.php'); ?>

  <a class="back-link" href="<?= url_for('index.php'); ?>">&laquo; Home</a>

    <h1>Edit Salamander</h1>
  
    <form action="<?= url_for('salamanders/edit.php?id=' . h(u($salamander['id']))) ?>" method="post">

      <dl>
        <dt>ID</dt>
        <dd><?= h($salamander['id'])?></dd>
      <dl>
        <dt>Name</dt>
        <dd><input type="text" name="name" size = "50" value="<?= h($salamander['name']);?>"/></dd>
      </dl>
      <dl>
        <dt>Habitat</dt>
        <dd><textarea id = "habitat" name ="habitat" rows="4" cols="75"><?= h($salamander['habitat']);?></textarea></dd>
      </dl>
      <dl>
        <dt>Description</dt>
        <dd><textarea id = "description" name = "description" rows="4" cols ="75"><?= h($salamander['description']);?></textarea></dd>
      </dl>
        <input type="submit" value="Edit Salamander" />
    </form>

<?php include(SHARED_PATH . '/salamanderFooter.php'); ?>

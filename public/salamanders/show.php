<?php 
require_once('../../private/initialize.php');

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$salamander = find_salamander_by_id($id);

$page_title = 'View Salamander';
include(SHARED_PATH . '/salamanderHeader.php'); 
?>

<a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a>


    <h1>Salamander Stats</h1>
    <dl>
        <dt>ID</dt>
        <dd><?= h($salamander['id']);?></dd>
    </dl>
    <dl>
        <dt>Salamander Name</dt>
        <dd><?= h($salamander['name']);?></dd>
    </dl>
    <dl>
        <dt>Habitat</dt>
        <dd><?= h($salamander['habitat']);?></dd>
    </dl>
    <dl>
        <dt>Description</dt>
        <dd><?= h($salamander['description']);?></dd>
    </dl>



<?php include(SHARED_PATH . '/salamanderFooter.php'); ?>

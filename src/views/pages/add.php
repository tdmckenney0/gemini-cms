# <?= $page->title; ?> (preview)

<?= $page->body; ?>

<?php foreach ($fields as $field => $desc): ?>
=> /add/<?= $field; ?> Edit <?= $desc . "\r\n"; ?>
<?php endforeach; ?>

=> /add/save Save <?= $page->title; ?>

## Debug

```
<?= json_encode($page, JSON_PRETTY_PRINT); ?>

```
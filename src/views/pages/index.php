# Pages index

<?php foreach ($pages as $page): ?>
=> /view/<?= $page->id; ?> <?= $page->title ?? $page->id; ?> <?= "\r\n" ?>
<?php endforeach; ?>

=> /add Create New Page

## Debug

```
<?= json_encode($pages, JSON_PRETTY_PRINT); ?>

```
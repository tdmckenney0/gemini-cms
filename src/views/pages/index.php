# Pages index

<?php foreach ($pages as $page): ?>
=> /view/<?= $page->id; ?> <?= $page->title ?? $page->id; ?> <?= "\r\n" ?>
<?php endforeach; ?>

## Debug

```
<?= json_encode($pages, JSON_PRETTY_PRINT); ?>

```
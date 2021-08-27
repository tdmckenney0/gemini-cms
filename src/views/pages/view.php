# <?= $page->title; ?>

<?= $page->body; ?>

## Actions

=> /index Return to Index

=> /delete/<?= $page->id; ?> Delete this page

## Debug

```
<?= json_encode($page, JSON_PRETTY_PRINT); ?>

```

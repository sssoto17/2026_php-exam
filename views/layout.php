<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $this->e("ArtDash | $title" ) : "ArtDash" ?></title>
    <link rel="stylesheet" href="/global.css" />
</head>
<body>
    <?= $this->insert("globals::header") ?>
    <?= $this->section("content") ?>
    <?= $this->insert("globals::footer") ?>
</body>
</html>
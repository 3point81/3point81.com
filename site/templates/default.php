<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title><?php echo $site->title() ?> | <?php echo $site->tagline() ?></title>
    <?php snippet('_favicons'); ?>
    <link type="text/css" rel="stylesheet" href="http://fast.fonts.net/cssapi/59246cc9-9dbf-4548-8867-5745c91eb5fb.css"/>
    <?php if(false): ?>
        <style type="text/css"><?php echo f::read('assets/css/styles.css'); ?></style>
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo url('assets/css/styles.css'); ?>">
    <?php endif; ?>
</head>
<body>

<?php echo snippet('header'); ?>
<?php foreach ($site->pages()->visible() as $section): ?>
    <section id="<?php echo $section->uid(); ?>">
        <?php echo section($section); ?>
    </section>
<?php endforeach; ?>
<?php echo snippet('footer'); ?>

<script src="https://code.jquery.com/jquery-3.0.0-beta1.min.js"></script>
<script src="<?php echo url('assets/js/scripts.js'); ?>"></script>
</body>
</html>
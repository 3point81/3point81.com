<div class="container">
    <div class="box">
        <h2>
            <?php echo $section->title(); ?>
        </h2>
        <?php echo $section->address()->kirbytext(); ?>
        <div class="map">
            <?php echo $section->map(); ?>
        </div>
    </div>
</div>

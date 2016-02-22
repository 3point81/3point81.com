<?php $boxes = $section->sections()->toStructure(); ?>

<div class="container">

    <?php foreach ($boxes as $box): ?>
        <div class="box">
            <h2><?php echo $box->title(); ?></h2>
            <p>
                <?php echo $box->text(); ?>
            </p>
        </div>
    <?php endforeach; ?>

</div>


<div id="team">
    <div class="container">
        <h2><?php echo $section->team(); ?></h2>
        <div class="people">
            <?php foreach ($section->children()->visible() as $person): ?>
                <div class="person">
                    <?php if ($image = $person->images()->first()): ?>
                        <img src="<?php echo $image->url(); ?>"
                             height="250"
                             alt="<?php echo $person->title(); ?>">
                    <?php endif; ?>
                    <h3>
                        <?php echo $person->title(); ?>
                    </h3>
                    <p>
                        <?php echo $person->role(); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

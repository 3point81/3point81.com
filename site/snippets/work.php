<?php $projects = $section->children()->visible(); ?>

<div class="container">
    <div class="projects">
        <?php foreach ($projects as $project): ?>
            <figure class="project">
                <?php if ($logo = $project->images()->first()): ?>
                    <img src="<?php echo $logo->url() ?>"
                         height="50"
                         alt="<?php echo $project->title() ?>">
                <?php endif; ?>
                <figcaption>
                    <?php echo $project->text() ?>
                </figcaption>
            </figure>
        <?php endforeach; ?>
    </div>
</div>

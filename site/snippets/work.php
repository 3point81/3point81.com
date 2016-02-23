<?php $caseStudies = $section->children()->visible(); ?>

<div class="container">
    <div class="projects">
        <?php foreach ($caseStudies as $caseStudy): ?>
            <figure class="project">
                <?php if ($logo = $caseStudy->images()->first()): ?>
                    <a href="<?php echo $caseStudy->url(); ?>">
                        <img src="<?php echo $logo->url(); ?>"
                             height="50"
                             alt="<?php echo $caseStudy->title() ?>">
                    </a>
                <?php endif; ?>
                <figcaption>
                    <a href="<?php echo $caseStudy->url(); ?>">
                        <?php echo $caseStudy->project() ?>
                    </a>
                </figcaption>
            </figure>
        <?php endforeach; ?>
    </div>
</div>

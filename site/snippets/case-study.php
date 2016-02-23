<div class="container">
    <div class="box">
        <?php if($caseStudy = firstFileWithExt($section, 'pdf')): ?>

            <a href="<?php echo $caseStudy->url(); ?>" target="_blank" class="download-case-study">
                Download case study
            </a>
        <?php endif; ?>
        <img src="<?php echo $section->images()->first()->url(); ?>"
             height="50"
             alt="<?php echo $section->title() ?>">
        <h1><?php echo $section->title(); ?></h1>
        <h2><?php echo $section->project(); ?></h2>
        <?php echo $section->assets()->kirbytext(); ?>
        <?php echo $section->text()->kirbytext(); ?>
    </div>
</div>
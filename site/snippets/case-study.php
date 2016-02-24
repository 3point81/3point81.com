<div class="container">
    <div class="row">
        <?php if ($caseStudy = firstFileWithExt($section, 'pdf')): ?>
            <a href="<?php echo $caseStudy->url(); ?>" target="_blank" class="download-case-study">
                Download case study (PDF)
            </a>
        <?php endif; ?>
        <div class="col">
            <div class="box">

                <img src="<?php echo $section->images()->first()->url(); ?>"
                     height="80"
                     alt="<?php echo $section->title() ?>">
                <h1 class="hidden"><?php echo $section->title(); ?></h1>
                <h2><?php echo $section->project(); ?></h2>
                <?php echo $section->text()->kirbytext(); ?>
            </div>
        </div>
        <div class="col">
            <div class="box transparent">
                <?php echo $section->assets()->kirbytext(); ?>
            </div>
        </div>
    </div>
</div>
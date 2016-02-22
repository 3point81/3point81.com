<?php $logos = $section->find('logos')->images()->filter(function(FileAbstract $i){
    return in_array(strtolower($i->extension()), ['jpg', 'svg', 'png', 'gif']);
}); ?>

<div class="container">
    <div class="logos">
        <?php foreach ($logos as $logo): ?>
            <figure class="logo">
                <img src="<?php echo $logo->url() ?>"
                     alt="<?php echo $logo->title() ?>">
            </figure>
        <?php endforeach; ?>
    </div>
</div>

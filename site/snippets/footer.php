<?php $contactPage = $site->pages()->find('contact'); ?>
<footer>
<?php if ($contactPage): ?>
    <div>
        <?php echo $contactPage->footer()->kirbytext(); ?>
    </div>
    <div class="disclaimer">
        <?php echo $contactPage->disclaimer()->kirbytext(); ?>
    </div>
<?php else: ?>
    <p>The footer content depends on the Contact page</p>
<?php endif; ?>

</footer>

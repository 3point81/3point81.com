<?php $contactPage = $site->pages()->find('contact'); ?>
<footer>
<?php if ($contactPage): ?>
    <div>
        <?php echo $contactPage->footerContact()->kirbytext(); ?>
    </div>
    <div class="disclaimer">
        <?php echo $contactPage->footerDisclaimer()->kirbytext(); ?>
    </div>
<?php else: ?>
    <p>The footer content depends on the Contact page</p>
<?php endif; ?>

</footer>

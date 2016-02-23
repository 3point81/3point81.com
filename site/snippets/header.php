<header>
    <div id="logo">
        <h1 class="hidden"><?php echo $site->title(); ?></h1>
        <a href="#home">
            <img src="<?php echo $site->files()->find('logo.svg')->url(); ?>"
                 alt="<?php echo $site->title(); ?>">
        </a>
    </div>
    <nav>
        <ul class="expanded">
            <?php foreach ($site->pages()->visible() as $page): ?>
                <li>
                    <a
                        class="<?php e($page->isOpen(), 'active'); ?>"
                        href="<?php echo $site->url(); ?>/#<?php echo $page->uid(); ?>"><?php
                        echo $page->title();
                    ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
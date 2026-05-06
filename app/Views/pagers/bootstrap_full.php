<?php
/** @var \CodeIgniter\Pager\PagerRenderer $pager */
?>

<?php if ($pager->getPageCount() > 1) : ?>
<nav>
    <ul class="pagination justify-content-center">

        <!-- PAGE NUMBERS ONLY -->
        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach; ?>

    </ul>
</nav>
<?php endif; ?>
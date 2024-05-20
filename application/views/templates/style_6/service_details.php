<section class="bg-light p-6">
    <div class="container">
        <div class="rows d-flex justify-content-center hide-xs">
            <h2 class="pt-2"><?php echo html_escape($page_title) ?> <i class="bi bi-arrow-right"></i> <?php echo $service->name ?></h2>
        </div>
    </div>
</section>

<section class="pt-8 border-top-light">
    <div class="container">

        <?php include APPPATH.'views/templates/common/service_details_2.php'; ?>

    </div>
</section>
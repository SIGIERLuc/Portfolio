<div class="col-6 col-md-4 expertise">
    <img src="<?= $value["skill_image"] ?>">
    <h5>
        <?= $value["skill_name"] ?>
    </h5>
    <?php
    for ($i = 0; $i < $value["skill_level"]; $i++) {
        ?>
        <span class="fa fa-star checked"></span>
    <?php
}
for ($i; $i < 5; $i++) {
    ?>
        <span class="fa fa-star"></span>
    <?php
}
?>
</div>
<div class="collapse col-sm-12 projectFrame" id=<?= $project_results["ID"] ?> data-parent="#myGroup">
    <h2>
        <?= $project_results["project_name"] ?>
    </h2>
    <p class="projectText">
        <?= $project_results["project_description"] ?>
    </p>
    <br>
    <?php

    foreach ($button_array as $key => $button) {
        echo "<a class='projectButton' target='_blank' href='" . $button["button_link"] . "'>" . $button["button_text"] . "</a>";
    }

    ?>
</div>
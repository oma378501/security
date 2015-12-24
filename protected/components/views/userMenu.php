<ul class="nav" id="side-menu">
    <!-- Get the rols of user -->
    <?php foreach ($this->getRecentRols() as $user): ?>
        <!-- Got the relations rols from model user-->
        <?php foreach ($user->rols as $rol): ?>
            <!-- Get the form the real rol id-->
            <?php foreach ($this->getRecentForms($rol->id_rol) as $formParent): ?>
                <ul class="nav nav-second-level">
                    <?php foreach ($formParent->forms as $formParentItem): ?>

                        <li>
                            <a href="<?php echo Yii::app()->request->baseUrl . $formParentItem->url_form; ?>"><?php echo $formParentItem->name_form; ?></a>
                        </li>
                    <?php endforeach; ?>

                </ul>
            <?php endforeach; ?>
        <?php endforeach ?>
    <?php endforeach; ?>
</ul>

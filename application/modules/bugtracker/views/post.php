<?php if (isset($_POST['changePriory'])) {
    $value = $_POST['prioryValue'];
    $this->bugtracker_model->changePriority($idlink, $value);
} ?>

<?php if (isset($_POST['changeStatus'])) {
    $value = $_POST['StatusValue'];
    $this->bugtracker_model->changeStatus($idlink, $value);
} ?>

<?php if (isset($_POST['changetypes'])) {
    $value = $_POST['typesValue'];
    $this->bugtracker_model->changeType($idlink, $value);
} ?>

<?php if (isset($_POST['btn_closeBugtracker'])) {
    $this->bugtracker_model->closeIssue($idlink);
} ?>

    <div class="uk-container">
        <div class="uk-space-xlarge"></div>
        <div class="uk-grid uk-grid-large" data-uk-grid>
            <div class="uk-width-1-5@l"></div>
            <div class="uk-width-3-5@l">
                <div style="color: rgba(255,255,255,.7);">
                    <h2 class="uk-text-white"><i class="fas fa-bug"></i> <?= $this->bugtracker_model->getTitleIssue($idlink); ?></h2>
                    <p><?= $this->bugtracker_model->getDescIssue($idlink); ?></p>
                    <div class="uk-margin">
                        <div class="uk-placeholder uk-text-center"><?= $this->bugtracker_model->getUrlIssue($idlink); ?></div>
                    </div>
                    <div class="uk-column-1-3 uk-column-divider">
                        <p><i class="fas fa-list"></i> <?= $this->lang->line('form_type'); ?>: <span class="uk-label"><?= $this->bugtracker_model->getType($this->bugtracker_model->getTypeID($idlink)); ?></span></p>
                        <p><i class="fas fa-exclamation-circle"></i> <?= $this->lang->line('column_priority'); ?>: <span class="uk-label uk-label-danger"><?= $this->bugtracker_model->getPriority($this->bugtracker_model->getPriorityID($idlink)); ?></span></p>
                        <p><i class="far fa-clock"></i> <?= $this->lang->line('column_date'); ?>: <span class="uk-badge"><?= date('Y-m-d', $this->bugtracker_model->getDate($idlink)) ?></span></p>
                    </div>
                    <div class="uk-column-1-3 uk-column-divider">
                        <p><i class="fas fa-tags"></i> <?= $this->lang->line('column_status'); ?>: <span class="uk-label uk-label-success"><?= $this->bugtracker_model->getStatus($this->bugtracker_model->getStatusID($idlink)); ?></span></p>
                        <p><i class="fas fa-info-circle"></i> <?= $this->lang->line('column_status'); ?>:
                            <?php if ($this->bugtracker_model->closeStatus($idlink) == '0') { ?>
                                <span class="uk-label uk-label-success"><?= $this->lang->line('option_open'); ?></span>
                            <?php } else { ?>
                                <span class="uk-label uk-label-danger"><?= $this->lang->line('option_closed'); ?></span>
                            <?php } ?>
                        </p>
                        <p><i class="far fa-user-circle"></i> <?= $this->lang->line('column_author'); ?>: <?= $this->m_data->getUsernameID($this->bugtracker_model->getAuthor($idlink)); ?></p>
                    </div>
                </div>
                <hr>
                <?php if($this->m_data->getRank($this->session->userdata('fx_sess_id')) > 0) { ?>
                    <div>
                        <div class="uk-column-1-3 uk-column-divider">
                            <div>
                                <div class="uk-margin">
                                    <form method="post" action="">
                                        <div class="uk-form-controls">
                                            <select class="uk-select uk-form-width-medium" id="form-stacked-select" name="prioryValue">
                                                <?php foreach($this->bugtracker_model->getPriorityGeneral()->result() as $priory) { ?>
                                                    <option value="<?= $priory->id ?>"><?= $priory->title ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <br>
                                        <button class="uk-button uk-button-primary uk-width-1-1" type="submit" name="changePriory"><?= $this->lang->line('button_change'); ?></button>
                                    </form>
                                </div>
                            </div>
                            <div>
                                <div class="uk-margin">
                                    <form method="post" action="">
                                        <div class="uk-form-controls">
                                            <select class="uk-select uk-form-width-medium" id="form-stacked-select" name="StatusValue">
                                                <?php foreach($this->bugtracker_model->getStatusGeneral()->result() as $priory) { ?>
                                                    <option value="<?= $priory->id ?>"><?= $priory->title ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <br>
                                        <button class="uk-button uk-button-primary uk-width-1-1" type="submit" name="changeStatus"><?= $this->lang->line('button_change'); ?></button>
                                    </form>
                                </div>
                            </div>
                            <div>
                                <div class="uk-margin">
                                    <form method="post" action="">
                                        <div class="uk-form-controls">
                                            <select class="uk-select uk-form-width-medium" id="form-stacked-select" name="typesValue">
                                                <?php foreach($this->bugtracker_model->getTypesGeneral()->result() as $priory) { ?>
                                                    <option value="<?= $priory->id ?>"><?= $priory->title ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <br>
                                        <button class="uk-button uk-button-primary uk-width-1-1" type="submit" name="changetypes"><?= $this->lang->line('button_change'); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        <form method="post" action="">
                            <button type="submit" name="btn_closeBugtracker" class="uk-button uk-button-primary uk-width-1-1"><?= $this->lang->line('button_close'); ?></button>
                        </form>
                    </div>
                <?php } ?>
            </div>
            <div class="uk-width-1-5@l"></div>
        </div>

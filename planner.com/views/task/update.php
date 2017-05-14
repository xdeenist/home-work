<h1>Update task</h1>
<p>Please fill out the following fields to signup:</p>

<?php
$this->title = 'Update';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = 'Update';
?>
<script src="/web/js/jquery-3.2.1.min.js"></script>

<div class="task-update">
    <?= $this->render('_form', [
        'model' => $model,
        'maxEstimate' => $maxEstimate,
    ]) ?>
</div>
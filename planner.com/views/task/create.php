<h1>Create task</h1>
<p>Please fill out the following fields to signup:</p>

<?php
	$this->title = 'Create';
	$this->params['breadcrumbs'][] = $this->title;
    $this->params['breadcrumbs'][] = 'Create';
?>
<script src="/web/js/jquery-3.2.1.min.js"></script>

<div class="task-create">

    <?= $this->render('_form', [
        'model' => $model,
        'maxEstimate' => $maxEstimate,
    ]) ?>


</div>
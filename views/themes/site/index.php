<?php
$this->title = 'Home Page';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?= \hail812\adminlte\widgets\Alert::widget([
                'type' => 'warning',
                'body' => '<h4>Congratulations!</h4>',
            ]) ?>
        </div>
    </div>
</div>
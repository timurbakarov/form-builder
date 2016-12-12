<?php foreach($form->fields() as $field):?>

    <div class="form-group">

        <?php $renderer->renderField($form, $field)?>

    </div>

<?php endforeach?>
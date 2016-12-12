<?php foreach($form->fields() as $field):?>

    <div class="form-group">

        <?php $form->renderField($field)?>

    </div>

<?php endforeach?>
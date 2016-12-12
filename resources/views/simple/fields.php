<?php foreach($form->fields() as $field):?>

    <?php $renderer->renderField($form, $field)?>

<?php endforeach?>
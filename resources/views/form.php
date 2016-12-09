<form action="<?=$form->action()?>" method="POST">

    <?php foreach($form->fields() as $field):?>

        <?php $form->renderField($field)?>

    <?php endforeach?>

</form>
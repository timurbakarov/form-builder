<div>

    <?php foreach($form->buttons() as $button):?>

        <?php $renderer->renderButton($form, $button)?>

    <?php endforeach?>

</div>
<form action="<?=$form->action()?>" method="POST">

    <?php $renderer->renderFields($form)?>

    <?php $renderer->renderButtons($form)?>

</form>
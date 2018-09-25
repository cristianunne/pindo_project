<div class="alert alert-<?= (isset($alert)? $alert : 'info' ) ?>">
    <button type="button" class="close" data-dismiss="alert">×</button>
<center>    <?= (isset($message)? $message : 'Something went wrong' ) ?></center>
</div>
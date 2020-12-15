<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <p><?= session()->get('email') ?></p>
<?= $this->endSection() ?>
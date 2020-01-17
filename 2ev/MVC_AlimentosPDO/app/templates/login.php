<?php ob_start() ?>
<!-- 
<div class="row">
<h1>Login</h1>
<h3> Fecha: <?php echo $params['fecha'] ?> </h3>
 -->
<?php if (isset($params['mensajeError'])) : ?>
<div class="alert alert-danger">
    <h5><strong>Lo siento. </strong> <?php echo $params['mensajeError'] ?></h5>
</div>
<?php endif; ?>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>

<?php
$ciudades = json_decode(file_get_contents("ciudades.json"), true);
$ciudadSeleccionada = $_GET['ciudad'] ?? null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Descubre Cerdeña</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h1>🌄 Descubre Cerdeña</h1>
<p>Haz clic en una ciudad para saber más:</p>

<?php foreach ($ciudades as $nombre => $info): ?>
    <a href="?ciudad=<?php echo urlencode($nombre); ?>">
        <button><?php echo htmlspecialchars($nombre); ?></button>
    </a>
<?php endforeach; ?>

<?php if ($ciudadSeleccionada && isset($ciudades[$ciudadSeleccionada])): 
    $info = $ciudades[$ciudadSeleccionada];
?>
    <div class="card">
        <h2><?php echo htmlspecialchars($ciudadSeleccionada); ?></h2>
        <p><?php echo htmlspecialchars($info['descripcion']); ?></p>
        <img src="<?php echo htmlspecialchars($info['imagen']); ?>" alt="Imagen de <?php echo htmlspecialchars($ciudadSeleccionada); ?>">
    </div>
<?php endif; ?>

</body>
</html>

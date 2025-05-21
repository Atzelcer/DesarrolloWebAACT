<?php include("conexion.php"); 
$id = $_GET['id'];
$stmt = $con->prepare("SELECT id, nombres, apellidos, fecha_nacimiento, sexo, correo FROM personas WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$row = $resultado->fetch_assoc();
?>

<div class="modal-header bg-danger text-white">
  <h5 class="modal-title"><i class="bi bi-person-check me-2"></i>Editar Persona</h5>
  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body bg-dark text-white">
  <form id="form-editar" class="needs-validation" novalidate onsubmit="event.preventDefault(); editar();">
    
    <div class="mb-3">
      <label for="nombres" class="form-label">Nombres</label>
      <input type="text" class="form-control bg-dark text-white border-secondary" id="nombres" name="nombres" value="<?php echo htmlspecialchars($row['nombres']); ?>" required>
    </div>

    <div class="mb-3">
      <label for="apellidos" class="form-label">Apellidos</label>
      <input type="text" class="form-control bg-dark text-white border-secondary" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($row['apellidos']); ?>" required>
    </div>

    <div class="mb-3">
      <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
      <input type="date" class="form-control bg-dark text-white border-secondary" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo htmlspecialchars($row['fecha_nacimiento']); ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Sexo</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="sexo" id="masculino" value="Masculino" <?php echo $row['sexo'] == 'Masculino' ? 'checked' : ''; ?> required>
        <label class="form-check-label" for="masculino">Masculino</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="sexo" id="femenino" value="Femenino" <?php echo $row['sexo'] == 'Femenino' ? 'checked' : ''; ?>>
        <label class="form-check-label" for="femenino">Femenino</label>
      </div>
    </div>

    <div class="mb-3">
      <label for="correo" class="form-label">Correo Electrónico</label>
      <input type="email" class="form-control bg-dark text-white border-secondary" id="correo" name="correo" value="<?php echo htmlspecialchars($row['correo']); ?>" required>
    </div>

    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <div class="modal-footer bg-dark border-top border-secondary">
      <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancelar</button>
      <button type="submit" class="btn btn-danger">Guardar Cambios</button>
    </div>

  </form>
</div>

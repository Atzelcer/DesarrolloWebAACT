<?php include("conexion.php");

$sql = "SELECT id, nombres, apellidos, fecha_nacimiento, sexo, correo FROM personas";
$resultado = $con->query($sql);
?>

<div class="card bg-dark text-white border-secondary shadow-sm">
  <div class="card-header text-white d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #6f42c1, #d63384);">
    <h5 class="mb-0 w-100 text-center">
      <i class="bi bi-list-ul me-2"></i>Lista de Personas
    </h5>
    <button class="btn btn-light rounded-circle position-absolute end-0 me-3" title="Nuevo" onclick="mostrarFormularioCrear()">
      <i class="bi bi-plus-lg"></i>
    </button>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-dark table-hover align-middle text-white border border-secondary mb-0">
        <thead class="text-dark" style="background-color: #f8c6dc;">
          <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Fec. Nacimiento</th>
            <th>Sexo</th>
            <th>Correo</th>
            <th class="text-end">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_array($resultado)): ?>
          <tr>
            <td><?php echo $row['nombres']; ?></td>
            <td><?php echo $row['apellidos']; ?></td>
            <td><?php echo $row['fecha_nacimiento']; ?></td>
            <td>
              <span class="badge bg-<?php echo $row['sexo'] == 'Masculino' ? 'primary' : 'warning'; ?>">
                <?php echo $row['sexo']; ?>
              </span>
            </td>
            <td><?php echo $row['correo']; ?></td>
            <td class="text-end">
              <button class="btn btn-sm btn-outline-light me-1" onclick="formEditar(<?php echo $row['id']; ?>)">
                <i class="bi bi-pencil"></i> Editar
              </button>
              <button class="btn btn-sm btn-outline-danger" onclick="eliminar(<?php echo $row['id']; ?>)">
                <i class="bi bi-trash"></i> Eliminar
              </button>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

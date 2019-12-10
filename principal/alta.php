<?php include '../includes/header.php' ?>
<?php include '../includes/sesion.php' ?>
<div class="container center">

  <div class="row" style="margin:0,auto; width:80%;" >
    <div class="col s12 m12 l12">
      <div class="card">
        <div class="card-content">
          <span class="card-title">Postea tu codigo</span>
            <form id="altaPost" autocomplete="off" @submit.prevent="alta" >
                <input type="text" name="titulo" placeholder="Titulo" required >
                <textarea name="codigo" placeholder="Escribe tu codigo" class="materialize-textarea" cols="30" rows="10"></textarea>
                <textarea name="descripcion" placeholder="Escribe tu descripcion" class="materialize-textarea" cols="30" rows="10"></textarea>
                <select name="categoria" class="browser-default" required >
                    <option value="" disabled selected>Escoge una opcion</option>
                    <option value="php">PHP</option>
                    <option value="css">CSS</option>
                    <option value="html5">HTML5</option>
                    <option value="mysql">MYSQL</option>
                    <option value="vue">VUE</option>
                </select>
                <input type="submit" value="Guardar" class="btn blue" >
            </form>
        </div>
      </div>
    </div>
  </div>

</div>

<?php include '../includes/footer.php' ?>
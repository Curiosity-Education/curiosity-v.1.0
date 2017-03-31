@extends('templates.administer-menu')

@section('css-plus')
@stop

@section('title')
 Gestion avatar
@stop

@section('baner-tittle')
   Gestion Instituciones
@stop

@section('content-administer')

<div class="row" id="adIn-selection">
  <div class="col-md-12 card" id="adIn-card">
    <div class="col-md-4">
      <select class="mdb-select adIn-adjust" id="type">
        <option value="" disabled selected>Seleccione un Tipo de Institucion</option>
        <option value="Escuela Privada" id="ll">Escuela Privada</option>
        <option value="Escuela Publica">Escuela Publica</option>
        <option value="Empresa">Empresa</option>
        <option value="Casa Hogar">Casa Hogar</option>
      </select>
    </div>
    <div class="col-md-2 offset-md-6  col-xs-4 offset-xs-4 adIn-adjust" id="adAv-add-btn">
        <a class="btn-floating btn-large adIn-color" id="add-insti"  data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i>
        </a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table class="table" id="adIn-table">
    <thead class="thead-inverse">
      <tr>
        <th class="text-center adInHeader">Nombre</th>
        <th class="text-center adInHeader">Acciones</th>
      </tr>
    </thead>
      <tbody>

      </tbody>
    </table>
  </div>

  <div id="modals"></div>

  <div class='modal fade' id='updateModals' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>"
    <div class='modal-dialog' role='document'>

        <div class='modal-content'>

            <div class='modal-header adIn-color adIn-adjust'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                <h5 class='modal-title w-100 white-text text-center' id='myModalLabel'>Actializar Institucion</h5>
           </div>

            "<div class='modal-body'>

                  <div class='col-md-6'>
                    <div class='card adIn'>
                      <div class='card-block'>
                        <img id='pero' src='' alt=''>
                      </div>

                    </div>
                    <form  id='adAv-imgForm'>
                      <div class='md-form'>
                        <div class='file-field'>
                          <div class='btn btn-primary  btn-sm j adIn-color'>
                            <span>Escoge un Logo</span>
                            <input type='file' id='adIn-img' name='adAv-img'>
                          </div>
                          <div class='file-path-wrapper'>
                            <!-- / "<input class='file-path validate' type='text' placeholder='Upload your file'>"  -->
                          </div>
                        </div>
                      </div><br><br>
                    </form>
                </div>
                  <div class='col-md-6'>

                  <form class='' >
                    <div class='md-form'>
                      <input type='text' id='updAdIn-name' class='form-control' placeholder="">
                      <label for='form1' class="active">Nombre</label>
                    </div>

                    <div class='md-form'>
                      <input type='text' id='updAdIn-calle' class='form-control' placeholder="">
                      <label for='form1' class="active">Calle</label>
                    </div>

                    <div class='md-form'>
                      <input type='text' id='updAdIn-colonia' class='form-control' placeholder="">
                      <label for='form1' class="active">Colonia</label>
                    </div>

                    <div class='md-form'>
                      <input type'text' id='updAdIn-number' class='form-control' placeholder="">
                      <label for='form1' class="active">Numero</label>
                    </div>

                    <div class='md-form'>
                      <input type='text' id='updAdIn-Cp' class='form-control' placeholder="">
                      <label for='form1' class="">Codigo Postal</label>
                    </div>

                    <select class='updAdInselect' id='updAdIn-state'>

                    </select>

                    <div id='updAdInCities-cont'>
                    </div>

                  </div>

                </form>
            </div>

            <div class='modal-footer'>
                <button type='button' class='btn btn-outline-danger waves-effect' data-dismiss='modal'><i class='fa fa-reply' aria-hidden='true'></i>&nbsp;Cancelar</button>
                <button type='button' class='btn btn-primary adIn-color' id='updAdInfirst-register'><i class='fa fa-upload' aria-hidden='true'></i>&nbsp;Guardar</button>
            </div>
        </div>

    </div>
  </div>

</div>

@stop

@section('js')
<script type="text/javascript" src="/packages/assets/js/administer/models/Institution.js"></script>
<script type="text/javascript" src="/packages/assets/js/administer/controllers/ainstiController.js"></script>
<script type="text/javascript" src="/packages/assets/js/administer/dispatchers/dps-insti.js"></script>
@stop

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Emissão de Nota Fiscal</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">


  </head>
  <body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

      <!-- Cabeçalho da página -->
      <div class="page-header">
        <div class="container">
          <div class="row">
            <div class="col-md-offset-4">
              <h1>Emissão de Nota Fiscal</h1>
            </div>
          </div>
        </div>
      </div>  

    <!-- Página -->
    <div class="container">

      <!-- Formulário -->  
      <form>

        <div class="row">
          
          <div class="col-md-10 col-md-offset-1">
            <fieldset>
              <legend><h3><b>NF-e</b></h3></legend>

              <div class="row">
                <div class="form-group col-md-4">
                  <label>Tipo de operação</label>
                  <select name="idDest" class="form-control">
                    <option value="1">Interna</option>
                    <option value="2">Interestadual</option>
                    <option value="3">Exterior</option>
                  </select>
                </div>

                <div class="form-group col-md-4">
                  <label>Natureza da operação</label>
                  <select name="natOp" class="form-control">
                    <option value="Venda de produto">Venda mercadoria</option>
                    <option value="Remessa de mercadoria para brinde">Remessa brinde</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Forma de pagamento</label>
                  <select name="indPag" class="form-control">
                    <option value="0">À vista</option>
                    <option value="1">A prazo</option>
                  </select>
                </div>
              </div>
            </fieldset>
          </div>
        </div>

        <br/>
        <br/>

        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <fieldset>
              <legend><h3><b>Destinatário</b></h3></legend>
              <div class="row">
                <div class="col-md-6">
                  <fieldset>
                    <legend><h4>Identificação</h4></legend>
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label>Tipo de operação</label>
                          <select class="form-control">
                            <option>Interna</option>
                            <option>Interestadual</option>
                            <option>Exterior</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Nº Documento</label>
                          <input type="text" class="form-control" placeholder="Nº Documento">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label>Razão Social/Nome</label>
                          <input type="text" class="form-control" placeholder="Razão Social/Nome">
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="col-md-6">
                  <fieldset>
                    <legend><h4>Endereço</h4></legend>
                    <div class="row">
                      <div class="form-group col-md-9">
                        <label>Logradouro</label>
                        <input type="text" class="form-control" placeholder="Logradouro">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Nº</label>
                        <input type="text" class="form-control" placeholder="Nº">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-5">
                        <label>Bairro</label>
                        <input type="text" class="form-control" placeholder="Bairro">
                      </div>
                      <div class="form-group col-md-4">
                        <label>Cep</label>
                        <input type="text" class="form-control" placeholder="Cep">
                      </div>
                      <div class="form-group col-md-3">
<<<<<<< HEAD
=======


                        <label for="country">Country: </label>
                          <?php echo form_dropdown('country_id', $countries, '#', 'id="country"'); ?><br />
                          <?php $cities['#'] = 'Please Select'; ?>
                        <label for="city">City: </label>
                          <?php echo form_dropdown('city_id', $cities, '#', 'id="cities"'); ?><br />


>>>>>>> ca2d55bbe54b1d76a2e1d1612c5655bd9f8492da
                        <label for="uf">UF</label>
                          <select class="form-control" name="xml[uf]">
                            <?php foreach($ufList as $state): ?>
                              <option value="<?= $state['id_estado'] ?>"><?= $state['uf'] ?></option>
                            <?php endforeach;?>
<<<<<<< HEAD
                        <label for="UF">UF</label>
                          <select name="xml[UF]" id="UF" class="form-control">
                            
=======
>>>>>>> ca2d55bbe54b1d76a2e1d1612c5655bd9f8492da
                          </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Cidade</label>
                          <select class="form-control">
                            <option>Selecione sua cidade</option>
                            <!-- Aqui vai o foreach de estados puxados do banco
                              IMPORTANTE por o database no array de libraries do autoload-->
                            <option>Torres</option>
                          </select>
                      </div>
                    </div>
                  </fieldset>
                </div>
              </div>
            </fieldset>
          </div>
        </div>

        <br/>
        <br/>

        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <fieldset>
              <legend><h3><b>Dados do produto</b></h3></legend>
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label>Descrição</label>
                      <input type="text" class="form-control" placeholder="Descrição">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Código</label>
                      <input type="text" class="form-control" placeholder="Código">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Grupo Cfop</label>
                      <select class="form-control">
                        <option>Venda de mercadoria</option>
                        <option>Retorno de mercadoria</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label>NCM</label>
                      <input type="text" class="form-control" placeholder="Ncm">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Unidade comercial</label>
                      <input type="text" class="form-control" placeholder="Und">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Quantidade comercial</label>
                      <input type="text" class="form-control" placeholder="Qtd">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label>Valor unitario comercial</label>
                      <div class="input-group">
                        <span class="input-group-addon">R$</span>
                        <input type="text" class="form-control">
                        <span class="input-group-addon">.00</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label>Valor produto</label>
                      <div class="input-group">
                        <span class="input-group-addon">R$</span>
                        <input type="text" class="form-control">
                        <span class="input-group-addon">.00</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
          </div>
        </div>

        <br/>
        <div class="row">
          <div class="col-md-1 col-md-offset-5">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
          </div>
        </div>
        <br/>
      </form>  
    </div>
  </body>
</html>
<div class="checkout-form" id="pedido-form">
    <div class="card-wrapper">
    </div>
    <div class="s10"></div>
    <div class="form-container active">
        <h3>Quantidades</h3>
        <div id="product-list">
            <div class="row">
                <div class="col-xs-6 pt-2 text-center">
                    <label>teste</label>
                </div>
                <div class="col-xs-6">
                    <div class="input-group">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus"
                                  data-field="quant[1]">
                              <span class="glyphicon glyphicon-minus"></span>
                          </button>
                      </span>
                        <input type="hidden" name="product[1]" class="form-control input-number text-center" value="1">
                        <input type="text" name="quant[1]" class="form-control input-number text-center" value="1" min="1" max="10">
                        <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                          <span class="glyphicon glyphicon-plus"></span>
                      </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <h3>Informações</h3>
        <div class="row">
            <div class="col-xs-12">
                <input placeholder="Solicitante" type="text" name="name" class="form-control">
            </div>
        </div>
        <div class="s10"></div>
        <div class="row">
            <div class="col-xs-12">
                <input placeholder="Despachante" type="text" name="name" class="form-control">
            </div>
        </div>
        <div class="s10"></div>
        <h3>Endereço do Solicitante</h3>
        <div class="row">
            <div class="col-xs-6">
                <input placeholder="CEP" type="text" name="cep" class="form-control">
            </div>
            <div class="col-xs-6">
                <input placeholder="UF" type="text" name="uf" class="form-control" maxlength="2">
            </div>
            <div class="col-xs-6">
                <input placeholder="Município" type="text" name="uf" class="form-control">
            </div>
            <div class="col-xs-6">
                <input placeholder="Bairro" type="text" name="uf" class="form-control">
            </div>
            <div class="col-xs-8">
                <input placeholder="Rua" type="text" name="uf" class="form-control">
            </div>
            <div class="col-xs-4">
                <input placeholder="Número" type="text" name="uf" class="form-control">
            </div>
        </div>
        <div class="s10"></div>
        <div class="row">

            <div class="col-xs-12">
                <button type="button" value="Finalizar" class="btn btn-submit btn-block postfix">Finalizar Compra
                </button>
            </div>
        </div>
    </div>
</div>
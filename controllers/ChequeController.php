<?php
require_once '../models/Contracheque.php';

class ChequeController
{

    protected $cheque;

    public function __construct()
    {
        $this->cheque = new Contracheque();
    }

    public function listarContracheque($id)
    {
        $contracheques = $this->cheque->getContrachequeID($id);
        foreach ($contracheques as $cheque) {
            $date =  new DateTime($cheque['data_geracao']);
            $total_cred = $cheque['salario'] + $cheque['ferias'] + $cheque['outros'];
            $total_deb = $cheque['convenio_farmacia'] + $cheque['vales'] + $cheque['emprestimos'];

            $total = $total_cred - $total_deb;
            $total = number_format($total, 2, ',', '.');
            $total_deb = number_format($total_deb, 2, ',', '.');
            $total_cred = number_format($total_cred, 2, ',', '.');


            //    <button type="submit" data-bs-placement="top" title="Apagar Mensagem" class="btn">
            echo '
        <tr>
        <td><a href="pdfs/displayCheque.php?doc=' . $cheque['codigo'] . ' " target="_blank">' . $cheque['nome_documento'] . '</a></td>
        <td>' . $cheque['mes_competencia'] . '</td>
        <td>' . $date->format('d/m/Y') . '</td>
        <td class="d-flex flex-row">
        
        <button type="button"  data-bs-placement="top" title="Visualizar" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal' . $cheque['codigo'] . '">
            <i class="fa-regular fa-eye"></i>
        </button>
            <form action="" method="post" >
                     <input type="hidden" name="method" value=""/>
                     <input type="hidden" name="id" value="' . $cheque['codigo'] . '"/>
                  
                      <input type="hidden" name="id_funcionario" value="' . $cheque['codigo'] . '">
                   
                    </button>
           </form>
        </td>
        </tr>

        <div class="modal fade" id="exampleModal' . $cheque['codigo'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content modal-dialog-scrollable">
                    <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Resumo de Contracheque</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                 <div class="modal-body">

                 <h5>M??s</h5>

                 <div class="form-floating mb-3">
                 <input type="text" class="form-control" id="floatingInputDisabled" placeholder="M??s" disabled value=' . $cheque['mes_competencia'] . '>
                 <label for="floatingInputDisabled"><i class="fa-regular fa-calendar-days me-2"></i>M??s de Compet??ncia</label>
                  </div>
        <hr>

                 <h5>Cr??ditos</h5>
        <div class="row g-2">

        <div class="col-md"> 
            <div class="form-floating mb-3">
            <input type="text" class="form-control text-success" id="floatingInputDisabled" placeholder="S??lario" disabled value='  . number_format($cheque['salario'], 2, ',', '.') . '>
            <label for="floatingInputDisabled"><i class="fa-solid fa-dollar-sign me-2"></i>Sal??rio M??s</label>
             </div>
        </div>
       
        <div class="col-md"> 

        <div class="form-floating mb-3">
            <input type="text" class="form-control text-success" id="floatingInputDisabled" placeholder="F??rias" disabled value=' .  number_format($cheque['ferias'], 2, ',', '.')  . '>
            <label for="floatingInputDisabled"><i class="fa-solid fa-gift me-2"></i>F??rias</label>
        </div>
        </div>



        <div>

                   

                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-success" id="floatingInputDisabled" placeholder="Outros" disabled value=' .  number_format($cheque['outros'], 2, ',', '.')  . '>
                    <label for="floatingInputDisabled"><i class="fa-solid fa-receipt me-2"></i>Outros</label>
                </div>

            <hr>

            <h5>D??bitos</h5>

        <div class="row g-2"> 

            <div class="col-md"> 
                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-danger" id="floatingInputDisabled" placeholder="Conv??nio" disabled value=' . number_format($cheque['convenio_farmacia'], 2, ',', '.') . '>
                    <label for="floatingInputDisabled"><i class="fa-regular fa-credit-card me-2"></i>Conv??nio Farm??cia</label>
                </div>
            </div>
            
           
            <div class="col-md">
                <div class="form-floating mb-3">
                <input type="text" class="form-control text-danger id="floatingInputDisabled" placeholder="Vales" disabled value=' .  number_format($cheque['vales'], 2, ',', '.')  . '>
                <label for="floatingInputDisabled"><i class="fa-solid fa-file-invoice-dollar me-2"></i>Vales</label>
            </div>
        </div>
            
            
        
        
                <div class="form-floating mb-3">
                 <input type="text" class="form-control text-danger" id="floatingInputDisabled" placeholder="Empr??stimo" disabled value=' .  number_format($cheque['emprestimos'], 2, ',', '.') . '>
                 <label for="floatingInputDisabled"><i class="fa-solid fa-hand-holding-dollar me-2"></i>Empr??stimo</label>
               </div>


        <hr>
        <h5>Total</h5>

        <div class="row g-2"> 

        <div class="col-md">
        <div class="form-floating mb-3">
        <input type="text" class="form-control text-success" id="floatingInputDisabled" placeholder="Total de Cr??ditos" disabled value=' . $total_cred . '>
        <label for="floatingInputDisabled"><i class="fa-solid fa-sack-dollar me-2"></i>Total de Cr??ditos</label>
        </div>
        </div>    

        <div class="col-md">
        <div class="form-floating mb-3">
        <input type="text" class="form-control text-danger" id="floatingInputDisabled" placeholder="Total de D??bitos" disabled value=' . $total_deb . '>
        <label for="floatingInputDisabled"><i class="fa-solid fa-cash-register me-2"></i>Total de D??bitos</label>
        </div>
    
        </div>

        </hr>
        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInputDisabled" placeholder="Total a Receber" disabled value=' . $total . '>
            <label for="floatingInputDisabled"><i class="fa-solid fa-coins me-2"></i>Total a Receber</label>
            </div>


                 </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
    
                </div>
                </div>
          </div>
        </div> ';
        }
    }

    public function contracheque($id)
    {
        $dados = $this->cheque->getLastContraCheque($id);
        if (!empty($dados)) {
            $total_cred = $dados['salario'] + $dados['ferias'] + $dados['outros'];
            $total_deb = $dados['convenio_farmacia'] + $dados['vales'] + $dados['emprestimos'];
            $total = $total_cred - $total_deb;
            echo '
            <div class="row">
            <div class="col-md-6 nome">
                <p>Funcion??rio: Matheus Neugebauer Borges</p>
            </div>
            <div class="col-md-4 data ms-2">
                <p>M??s de Compet??ncia: ' . $dados['mes_competencia'] . '</p>
            </div>
        </div>
            <div class="row">
            <div class="col-md-6">
    
                <table class="table table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr class="table-dark">
                            <th class="text-white"><i class="fa-solid fa-sack-dollar me-2"></i>Cr??ditos</th>
                          
                            <th class="text-white"><i class="fa-solid fa-dollar-sign me-2"></i>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="table-success" scope="row"><i class="fa-solid fa-dollar-sign me-2"></i>Sal??rio M??s</th>
                            <td class="table-success" >R$ +' . number_format($dados['salario'], 2, ',', '.') . '</td>
                        </tr>
                        <tr>
                            <th scope="row" class="table-success" ><i class="fa-solid fa-gift me-2"></i>F??rias</th>
                            <td class="table-success" >R$ +' . number_format($dados['ferias'], 2, ',', '.') . '</td>
    
                        </tr>
                        <tr>
                            <th scope="row" class="table-success" ><i class="fa-solid fa-receipt me-2"></i>Outros</th>
                            <td class="table-success" >R$ +' . number_format($dados['outros'], 2, ',', '.') . '</td>
    
                        </tr>
                        <tr>
                            <th scope="row" class="table-success" >Total</th>
                            <td class="table-success" >R$ +' . number_format($total_cred, 2, ',', '.') . '</td>
    
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-hover " width="100%" cellspacing="0">
                    <thead>
                        <tr class="table-dark">
                            <th class="text-white"><i class="fa-solid fa-cash-register me-2"></i>D??bitos</th>
                            <th class="text-white"><i class="fa-solid fa-dollar-sign me-2"></i>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="table-danger" scope="row"><i class="fa-regular fa-credit-card me-2"></i>Conv??nio Farm??cia</th>
                            <td class="table-danger">R$ -' . number_format($dados['convenio_farmacia'], 2, ',', '.') . '</td>
    
                        </tr>
                        <tr>
                            <th class="table-danger" scope="row"><i class="fa-solid fa-file-invoice-dollar me-2"></i>Vales</th>
                            <td class="table-danger">R$ -' . number_format($dados['vales'], 2, ',', '.') . '</td>
    
                        </tr>
                        <tr>
                            <th class="table-danger" scope="row"><i class="fa-solid fa-hand-holding-dollar me-2"></i>Empr??stimos</th>
                            <td class="table-danger">R$ -' . number_format($dados['emprestimos'], 2, ',', '.') . '</td>
    
                        </tr>
                        <tr>
                            <th class="table-danger" scope="row">Total</th>
                            <td class="table-danger">R$ -' . number_format($total_deb, 2, ',', '.') . '</td>
    
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class=" mt-1 col-md-12">
                <div class="input-group input-group-lg">
                    <span class="valor-span col-md-2" id="">Total a Receber:</span>
                    <div class="col-md-10 valor">
                        <p>R$ ' . number_format($total, 2, ',', '.') . '</p>
                    </div>
                </div>
            </div>
        </div>
            
            
            ';
        } else {
            echo '<div class="col-md-12">
            <p>N??o h?? contracheques adicionados</p>
            </div>';
        }
    }


    public function downloadCheque($id)
    {
        $dados = $this->cheque->getLastContraCheque($id);
        return $dados;
    }

    public function excluirCheque($id)
    {
        $this->cheque->excluirCheque($id);
        echo '
        <div class="alert alert-success" role="alert" id="msg">
        <i class="fa-regular fa-circle-check me-2"></i> Contracheque apagado com Sucesso
    </div>
        ';
    }
}


$contracheque = new ChequeController();

if (isset($_POST['method']) && $_POST['method'] == "excluirCheque") {
    $id = $_POST['numero'];
    $contracheque->excluirCheque($id);
}

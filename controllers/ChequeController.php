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

                 <h5>Mês</h5>

                 <div class="form-floating mb-3">
                 <input type="text" class="form-control" id="floatingInputDisabled" placeholder="Mês" disabled value=' . $cheque['mes_competencia'] . '>
                 <label for="floatingInputDisabled"><i class="fa-regular fa-calendar-days me-2"></i>Mês de Competência</label>
                  </div>
        <hr>

                 <h5>Créditos</h5>
        <div class="row g-2">

        <div class="col-md"> 
            <div class="form-floating mb-3">
            <input type="text" class="form-control text-success" id="floatingInputDisabled" placeholder="Sálario" disabled value='  . number_format($cheque['salario'], 2, ',', '.') . '>
            <label for="floatingInputDisabled"><i class="fa-solid fa-dollar-sign me-2"></i>Salário Mês</label>
             </div>
        </div>
       
        <div class="col-md"> 

        <div class="form-floating mb-3">
            <input type="text" class="form-control text-success" id="floatingInputDisabled" placeholder="Férias" disabled value=' .  number_format($cheque['ferias'], 2, ',', '.')  . '>
            <label for="floatingInputDisabled"><i class="fa-solid fa-gift me-2"></i>Férias</label>
        </div>
        </div>



        <div>

                   

                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-success" id="floatingInputDisabled" placeholder="Outros" disabled value=' .  number_format($cheque['outros'], 2, ',', '.')  . '>
                    <label for="floatingInputDisabled"><i class="fa-solid fa-receipt me-2"></i>Outros</label>
                </div>

            <hr>

            <h5>Débitos</h5>

        <div class="row g-2"> 

            <div class="col-md"> 
                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-danger" id="floatingInputDisabled" placeholder="Convênio" disabled value=' . number_format($cheque['convenio_farmacia'], 2, ',', '.') . '>
                    <label for="floatingInputDisabled"><i class="fa-regular fa-credit-card me-2"></i>Convênio Farmácia</label>
                </div>
            </div>
            
           
            <div class="col-md">
                <div class="form-floating mb-3">
                <input type="text" class="form-control text-danger id="floatingInputDisabled" placeholder="Vales" disabled value=' .  number_format($cheque['vales'], 2, ',', '.')  . '>
                <label for="floatingInputDisabled"><i class="fa-solid fa-file-invoice-dollar me-2"></i>Vales</label>
            </div>
        </div>
            
            
        
        
                <div class="form-floating mb-3">
                 <input type="text" class="form-control text-danger" id="floatingInputDisabled" placeholder="Empréstimo" disabled value=' .  number_format($cheque['emprestimos'], 2, ',', '.') . '>
                 <label for="floatingInputDisabled"><i class="fa-solid fa-hand-holding-dollar me-2"></i>Empréstimo</label>
               </div>


        <hr>
        <h5>Total</h5>

        <div class="row g-2"> 

        <div class="col-md">
        <div class="form-floating mb-3">
        <input type="text" class="form-control text-success" id="floatingInputDisabled" placeholder="Total de Créditos" disabled value=' . $total_cred. '>
        <label for="floatingInputDisabled"><i class="fa-solid fa-sack-dollar me-2"></i>Total de Créditos</label>
        </div>
        </div>    

        <div class="col-md">
        <div class="form-floating mb-3">
        <input type="text" class="form-control text-danger" id="floatingInputDisabled" placeholder="Total de Débitos" disabled value=' . $total_deb . '>
        <label for="floatingInputDisabled"><i class="fa-solid fa-cash-register me-2"></i>Total de Débitos</label>
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
}

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
            $total = $cheque['total_credito'] - $cheque['total_debito'];
            $total = number_format($total, 2, ',', '.');
         
            echo '
        <tr>
        <td>' . $cheque['documento'] . '</td>
        <td>' . $cheque['mes_competencia'] . '</td>
        <td>' . $date->format('d/m/Y') . '</td>
        <td class="d-flex flex-row">
        
        <button type="button"  data-bs-placement="top" title="Visualizar" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal' . $cheque['codigo'] . '">
            <i class="fa-regular fa-eye"></i>
        </button>
      
        <form action="" method="post" >
              <input type="hidden" name="method" value=""/>
              <input type="hidden" name="id" value="' . $cheque['codigo'] . '"/>
        
                <button type="submit" data-bs-placement="top" title="Apagar Mensagem" class="btn">
                    <input type="hidden" name="id_funcionario" value="' . $cheque['codigo'] . '">
                    <i class="fa-solid fa-trash" style="color: red"></i>
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
                 <label for="floatingInputDisabled">Mês de Competência</label>
                  </div>
<hr>

                 <h5>Créditos</h5>
        <div class="row g-2">

        <div class="col-md"> 
            <div class="form-floating mb-3">
            <input type="number" class="form-control text-success" id="floatingInputDisabled" placeholder="Sálario" disabled value=' . $cheque['salario'] . '>
            <label for="floatingInputDisabled">Salário Mês</label>
             </div>
        </div>
       
        <div class="col-md"> 

        <div class="form-floating mb-3">
            <input type="number" class="form-control text-success" id="floatingInputDisabled" placeholder="Férias" disabled value=' . $cheque['ferias'] . '>
            <label for="floatingInputDisabled">Férias</label>
        </div>
        </div>



<div>

                   

                <div class="form-floating mb-3">
                    <input type="number" class="form-control text-success" id="floatingInputDisabled" placeholder="Outros" disabled value=' . $cheque['outros'] . '>
                    <label for="floatingInputDisabled">Outros</label>
                </div>

            <hr>

            <h5>Débitos</h5>

        <div class="row g-2"> 

            <div class="col-md"> 
                <div class="form-floating mb-3">
                    <input type="number" class="form-control text-danger" id="floatingInputDisabled" placeholder="Convênio" disabled value=' . $cheque['convenio_farmacia'] . '>
                    <label for="floatingInputDisabled">Convênio Farmácia</label>
                </div>
            </div>
            
           
            <div class="col-md">
                <div class="form-floating mb-3">
                <input type="number" class="form-control text-danger id="floatingInputDisabled" placeholder="Vales" disabled value=' . $cheque['vales'] . '>
                <label for="floatingInputDisabled">Vales</label>
            </div>
        </div>
            
            
        
        
                <div class="form-floating mb-3">
                 <input type="number" class="form-control text-danger" id="floatingInputDisabled" placeholder="Empréstimo" disabled value=' . $cheque['emprestimos'] . '>
                 <label for="floatingInputDisabled">Empréstimo</label>
               </div>
      
        
        

      

          

<hr>
<h5>Total</h5>

    <div class="row g-2"> 

    <div class="col-md">
        <div class="form-floating mb-3">
        <input type="number" class="form-control text-success" id="floatingInputDisabled" placeholder="Total de Créditos" disabled value=' . $cheque['total_credito'] . '>
        <label for="floatingInputDisabled">Total de Créditos</label>
        </div>
    </div>    

    <div class="col-md">
        <div class="form-floating mb-3">
        <input type="number" class="form-control text-danger" id="floatingInputDisabled" placeholder="Total de Débitos" disabled value=' . $cheque['total_debito'] . '>
        <label for="floatingInputDisabled">Total de Débitos</label>
    </div>
    
    </div>

</hr>
<div class="form-floating mb-3">
<input type="text" class="form-control" id="floatingInputDisabled" placeholder="Total a Receber" disabled value=' . $total . '>
<label for="floatingInputDisabled">Total a Receber</label>
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

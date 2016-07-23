var strEnderecoCarros = 'controladores/CarrosControlador.php';
var strCarregando          = 'Carregando...';
var strHtml                = '';

function mLibNovo(){  
  $('#divConsulta').hide();    
  $('#divFormulario').show();
  
  mLibLimparCarros();
}

function mLibLimparCarros(){
  $('#hddId').val();
  $('#CAR_Marca').val();
  $('#CAR_Modelo').val();
  $('#CAR_Ano').val();
}

function mLibSalvar(){

  $.post(strEnderecoCarros, { 
    strAcao: 'acaoSalvarCarros', 
    CAR_ID: $('#hddId').val(),
    CAR_Marca: $.trim($('#CAR_Marca').val()),
    CAR_Modelo: $.trim($('#CAR_Modelo').val()),
    CAR_Ano: $.trim($('#CAR_Ano').val())
  },
    function(data){
      //alert(data); return;
      if(data.sucesso == 'true'){
        mLibConsultarCarros();        
      }
    }, 'json'
  );
}

function mLibConsultarCarros(){
  $('#divFormulario').hide();

  $.post(strEnderecoCarros, { strAcao : 'acaoConsultarCarros' },
    function(data){
      //alert(data); return;
      //alert(data.sucesso);
      if(data.sucesso == 'true'){
        //alert(data.rows.length);
        if (data.rows.length > 0){
          strHtml = "<table class='table table-bordered table-hover table-striped'>";
            strHtml+= "<thead>";
                strHtml+= "<td align='left' colspan='2'>";
                  strHtml+= "<button id='btnNovo' name='btnNovo' class='btn btn-primary' onClick='mLibNovo();mLibLimparCarros();'>Novo</button>&nbsp;";                
                strHtml+= "</td>";
              strHtml+= "</tr>";
              strHtml+= "<tr>";
                strHtml+= "<th>C&oacute;digo</th>";
                strHtml+= "<th>Marca</th>";
                strHtml+= "<th>Modelo</th>";
                strHtml+= "<th>Ano</th>";
                strHtml+= "<th>A&ccedil;&otilde;es</th>";
              strHtml+= "</tr>";
           strHtml+= "</thead>";
           strHtml+= "<tbody>";

           for (var i=0; i<data.rows.length; i++){

             strHtml+= "<tr>";
               strHtml+= "<td>"+data.rows[i].CAR_ID+"</td>";
               strHtml+= "<td>"+data.rows[i].CAR_Marca+"</td>";
               strHtml+= "<td>"+data.rows[i].CAR_Modelo+"</td>";
               strHtml+= "<td>"+data.rows[i].CAR_Ano+"</td>";
               strHtml+= "<td align='center'>"; 
                 strHtml+= "<span onClick='fncAlterarCarros("+data.rows[i].CAR_ID+", \""+data.rows[i].CAR_Marca+"\", \""+data.rows[i].CAR_Modelo+"\", "+data.rows[i].CAR_Ano+");'>Editar</span>&nbsp;";
                 strHtml+= "<span onClick='fncExcluirrCarros("+data.rows[i].CAR_ID+");'>Excluir</span>";
               strHtml+= "</td>";
             strHtml+= "</tr>";
           }

           strHtml+= "</tbody>";
           strHtml+= "</table>";
        }else{            
          $('#divConsulta').hide();
          $('#divFormulario').show();
          return;    
        }
      }else{
        $('#divConsulta').hide();
        $('#divFormulario').show();
        return;
      }

      $('#consultar-carros').html(strHtml);
      $('#consultar-carros').DataTable({ responsive: true, destroy: true });
    }, 'json'
  );
}

function fncAlterarCarros(carroID, marcaID, modeloID, ano){
  mLibLimparCarros();
  
  $('#divConsulta').hide();  
  $('#hddId').val(carroID);
  $('#CAR_Marca').val(marcaID);
  $('#CAR_Modelo').val(modeloID);
  $('#CAR_Ano').val(ano);  
  $('#divFormulario').show();
}

function fncExcluirrCarros(carroID){

  $.post(strEnderecoCarros, { strAcao: 'acaoExcluirCarros', CAR_ID: carroID },
    function(data){
      //alert(data); return;
      if(data.sucesso == 'true'){
        mLibConsultarCarros()
      }else{
        mLibDialogAlert(data.titulo, data.mensagem, 6);
      }
    }, 'json'
  );    
}
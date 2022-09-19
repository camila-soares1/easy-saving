// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#movimentos').DataTable( {
    ajax: 'http://localhost/projetoptw/pro.php',
    columns: [
        { "data": "identificador", visible: false },
        { "data": "tipo" },
        { "data": "categoria" },
        { "data": "descricao" },
        { "data": "data_desp" },
        { "data": "valor"},
        { "data": "valor", visible: false}
    ],
    order: [[ 4, "desc" ]]
    
    
    } );



});

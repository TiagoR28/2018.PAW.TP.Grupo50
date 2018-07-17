var folder = '../Pesquisas/';

$(document).ready(esconder);
$(document).ready(eventos);

function eventos() {
    $('#FA').click(filtrarAluno);
    $('#CP').click(contagemProcesso); 
}

function contagemProcesso() {
    esconder();
    $('#formContagem').css('display', 'block');
    
    carregarProcesso();
}

function carregarProcesso() {
    $('#resulCP').css('display', 'block');
    $('#Filtar').click(function () {
       var dInicio =  $('#inicio').val();
       var dFim = $('#fim').val();
       var radio = $('#status').val();
       $.post(folder + 'ContagemProcesso.php', {
           dataInicio : dInicio,
           dataFim : dFim,
           estado : radio
       }, function (data, status) {
            console.log(status);
            $('#resulCP').html(data);
        });
    });
}

function filtrarAluno() {
    esconder();
    $('#aluno').css('display', 'block');   
    carregarAluno();
}

function carregarAluno() {
    $('#resulFA').css('display', 'block');
    $('#nome').keyup(function () {
       var name =  $('#nome').val();
       $.post(folder + 'listarAluno.php', {
           aluno : name
       }, function (data, status) {
            console.log(status);
            $('#resulFA').html(data);
        });
    });
}

function esconder() {
    $('#formContagem').css('display', 'none');
    $('#aluno').css('display', 'none');
    $('#resulMG').css('display', 'none');
    $('#resulFA').css('display', 'none');
    $('#resulCP').css('display', 'none');
}

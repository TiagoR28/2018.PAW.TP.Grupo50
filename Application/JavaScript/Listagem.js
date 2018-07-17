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
    $('#contagem').click(function () {
        console.log('ola');
    });
}

function filtrarAluno() {
    esconder();
    $('#aluno').css('display', 'block');
    
    carregarAluno();
}

function carregarAluno() {
    $('#resulCP').css('display', 'block');
    $('#nome').keyup(function () {
       var name =  $('#nome').val();
       $.post(folder + 'listarAluno.php', {
           aluno : name
       }, function (data, status) {
            console.log(status);
            $('#resulCP').html(data);
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

document.addEventListener("DOMContentLoaded", eventos, false);

function eventos() {
    document.getElementById('FA').addEventListener('click', filtrarAluno, false);
    document.getElementById('CP').addEventListener('click', contagemProcesso, false);    
}

function contagemProcesso() {
    esconder();
    var form = document.getElementById('formContagem').style.display = 'block';
}

function filtrarAluno() {
    esconder();
    var form = document.getElementById('aluno').style.display = 'block';
}

function esconder() {
    document.getElementById('formContagem').style.display = 'none';
    document.getElementById('aluno').style.display = 'none';
    document.getElementById('resulMG').style.display = 'none';
    document.getElementById('resulFA').style.display = 'none';
    document.getElementById('resulCP').style.display = 'none';
}
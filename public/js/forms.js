(function(){
    // máscaras para inputs
    $('.cel').mask('(00) 00000-0000');
    $('#cnpj').mask('99.999.999/9999-99');
    $('.money').mask('#.##0,00', { reverse: true });
    $('.dates').mask('00/00/00');

    //função para marcar e desmarcar todos os checkboxes
    $("#check-all").on('click', function(){
        $('.checks').not(this).prop('checked', this.checked);
    });

})();


(function(){
    console.log('sim');

    $('.cel').mask('(00) 00000-0000');
    $('#cnpj').mask('99.999.999/9999-99');
    $('.data').mask('99/99/9999');
    $('.money').mask('#.##0,00', { reverse: true });




})();


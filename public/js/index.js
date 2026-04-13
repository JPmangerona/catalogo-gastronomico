$(function() {
    $('#preco').maskMoney({
        prefix: '',
        allowNegative: false,
        thousands: '.',
        decimal: ',',
        affixesStay: false
    });
});

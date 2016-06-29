$(function () {

    $('[data-toggle="tooltip"]').tooltip();


    $('a[href="#add-to-contacts"]').on('click', function(event) {
        event.preventDefault();
        $('#add-to-contacts').modal('show');
    })

    $('[data-command="toggle-search"]').on('click', function(event) {
        event.preventDefault();
        $(this).toggleClass('hide-search');

        if ($(this).hasClass('hide-search')) {
            $('.c-search').closest('.row').slideUp(100);
        }else{
            $('.c-search').closest('.row').slideDown(100);
        }
    })

    $('#contact-list').searchable({
        searchField: '#contact-list-search',
        selector: 'li',
        childSelector: '.col-xs-12',
        show: function( elem ) {
            elem.slideDown(100);
        },
        hide: function( elem ) {
            elem.slideUp( 100 );
        }
    })
});


$('.person[data-chat=person1]').addClass('active');

$('.list-group-item').mousedown(function(){
    if ($(this).hasClass('.active')) {
        return false;
    } else {
        var personName = $(this).find('.name').text();
        $('.right .top .name').html(personName);
        $('.list-group-item').removeClass('active');
        $(this).addClass('active');
    }
});

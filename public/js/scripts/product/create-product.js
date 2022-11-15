$(function () {
    'use strict';
    
    $('.select2-data-ajax-categorie').on('change', function() {
        var categorie = this.value;
        if(categorie == 1){
            console.log(categorie);
            hideAll();
            $(".serie_peneu").removeClass("hidden");
            $(".marque_peneu").removeClass("hidden");

            $(".serie_peneu").show();
            $(".marque_peneu").show();
        }else if(categorie == 2){
            hideAll();
            $(".reference_filter").removeClass("hidden");
            $(".marque_filter").removeClass("hidden");

            $(".reference_filter").show();
            $(".marque_filter").show();
        }else if(categorie == 3){
            hideAll();
            $(".marque_baterie").removeClass("hidden");
            $(".num_voltage").removeClass("hidden");

            $(".marque_baterie").show();
            $(".num_voltage").show();
        }else if(categorie == 4){
            hideAll();
            $(".serie_chambrere").removeClass("hidden");
            $(".marque_chambrere").removeClass("hidden");

            $(".serie_chambrere").show();
            $(".marque_chambrere").show();
        }else if(categorie == 5){
            hideAll();
            $(".serie_huile").removeClass("hidden");
            $(".marque_huile").removeClass("hidden");
            $(".lettrage_huile").removeClass("hidden");

            $(".serie_huile").show();
            $(".marque_huile").show();
            $(".lettrage_huile").show();
        }
    });

    function hideAll() {
        $('.input_collection').each( (i,e) => {
            $(e).hide();
        })
    }


});
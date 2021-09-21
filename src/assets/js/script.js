console.log("JQUERY version "+jQuery().jquery)

jQuery(document).ready(function($) {

// Fixed on scroll > 10
// AnchorUP on scroll >10
    $(window).scroll(function() {
        if ($(document).scrollTop() < 10) {
            $(".change").removeClass("sticky")
            $("#ancre-wrapper").hide()
        } else {
            $(".change").addClass("sticky")
            $("#ancre-wrapper").show()
        }
    });

// BurgerNav on Click
    $("#burgerNav").on('click', function(){
            jQuery('nav').toggleClass('burgerMove')

        if($('nav').hasClass("burgerMove")) {
            $('nav').css('margin-right', '10px')
        }
        else {
            $('nav').css('margin-right', '-310px')
        }
   })

// Class active on Click ON WORK
 //   $("nav a").on('click', function(){
  //      $("nav a").removeClass('active')
    //    $(this).addClass('active')
    // })

    $(window).on('scroll', function(){
        let scroll_section = $(this).scrollTop();
// console.log(scroll_section)

if( scroll_section < $("#propos").offset().top){
    $('nav a').removeClass('active')
}
else if( scroll_section >= $("#propos").offset().top-20 && scroll_section < $('#projets').offset().top-20){
    $('nav a').removeClass('active')
    $('#nav1').addClass("active")
}
else if( scroll_section >= $('#projets').offset().top-20 && scroll_section < $('#parcours').offset().top-20){
    $('nav a').removeClass('active')
    $('#nav2').addClass("active")
}
else if( scroll_section >= $('#parcours').offset().top-20 && scroll_section < $('#contact').offset().top-20){
    $('nav a').removeClass('active')
    $('#nav3').addClass("active")
}
else if( scroll_section >= $('#contact').offset().top-20){
    $('nav a').removeClass('active')
    $('#nav4').addClass("active")
}

        // if( scroll_section < $("#formation").offset().top){
        //     $('nav a').removeClass('active')
        // }
        // else if( scroll_section >= $("#formation").offset().top-20 && scroll_section < $('#stages').offset().top-20){
        //     $('nav a').removeClass('active')
        //     $('#nav1').addClass("active")
        // }
        // else if( scroll_section >= $('#stages').offset().top-20 && scroll_section < $('#projets').offset().top-20){
        //     $('nav a').removeClass('active')
        //     $('#nav2').addClass("active")
        // }
        // else if( scroll_section >= $('#projets').offset().top-20 && scroll_section < $('#propos').offset().top-20){
        //     $('nav a').removeClass('active')
        //     $('#nav3').addClass("active")
        // }
        // else if( scroll_section >= $('#propos').offset().top-20 && scroll_section < $('#contact').offset().top-20) {
        //     $('nav a').removeClass('active')
        //     $('#nav4').addClass("active")
        // }
        // else if( scroll_section >= $('#contact').offset().top-20){
        //     $('nav a').removeClass('active')
        //     $('#nav5').addClass("active")
        // }
      })





/*
    console.log($("#formation").offset().top)
    console.log($("#formation").offset().top-80)
    console.log($("#stages").offset().top)
    console.log($("#projets").offset().top)
    console.log($("#propos").offset().top)
    console.log($("#contact").offset().top)
    console.log($("window").offset())
*/






    // Submit img button
    $("form").submit(function(){
        $("#loading").show();
    })

    // Gestion Goutte
    // Gestion Goutte
    $("div#goutteMain").on('click', function(){
        $("div.goutte ul").toggleClass("display")
    })

    // Origin
    $("#Goutte0").on('click', function(){
        $(':root').css({
            '--main-color': '#18232f',
            '--main-color-wrapper':'#c9d3c9',
            '--main-color-title':'#5271ff'
        })
    })
    // Black
    $("#Goutte1").on('click', function(){
        $(':root').css({
            '--main-color': 'black',
            '--main-color-wrapper':'gainsboro',
            '--main-color-title': 'black'
        })
    })
    // Red
    $("#Goutte2").on('click', function(){
        $(':root').css({
            '--main-color': '#8ac6d1',
            '--main-color-wrapper':'#fae3d9',
            '--main-color-title': '#ffb6b9'
        })
    })
    // Blue
    $("#Goutte3").on('click', function(){
        $(':root').css({
            '--main-color': '#44000d',
            '--main-color-wrapper':'#f9d276',
            '--main-color-title': '#ad1d45'
        })
    })
    // Purple
    $("#Goutte4").on('click', function(){
        $(':root').css({
            '--main-color': '#233714',
            '--main-color-wrapper':'#fdeced',
            '--main-color-title': '#6b591d'
        })
    })
    

})
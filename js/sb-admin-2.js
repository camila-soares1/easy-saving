(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
    
    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });


  var listA = [{name:'Alimentação', value:'Alimentação'}, {name:'Casa', value:'Casa'}, {name:'Educação', value:'Educação'}, {name:'Saúde', value:'Saúde'}, {name:'Transporte', value:'Transporte'}, {name:'Lazer', value:'Lazer'}, {name:'Outras despesas', value:'Outras despesas'}];
        
  var listB = [{name:'Salário', value:'Salário'}, {name:'Empréstimo', value:'Empréstimo'}, {name:'Outras receitas', value:'Outras receitas'}];

  var listC = [{name:'Depósitos a prazo', value:'Depósitos a prazo'}, {name:'Ações', value:'Ações'}, {name:'Cripto moedas', value:'Cripto moedas'}, {name:'PPR (Plano Poupança Reforma)', value:'PPR (Plano Poupança Reforma)'}, {name:'Certificados de aforro', value:'Certificados de aforro'}, {name:'Obrigações', value:'Obrigações'}, {name:'Outros investimentos', value:'Outros investimentos'}];
  
  $(document).ready( function() {
    $("input[name='chk']").on('change',function() {
  
        if($(this).is(':checked') && $(this).val() == 'despesa')
        {
          $('#describe').empty()
          $.each(listA, function(index, value) {
           $('#describe').append('<option value="'+value.value+'">'+value.name+'</option>');
          });                  
        }
        else if($(this).is(':checked') && $(this).val() == 'receita')
        {
          $('#describe').empty()
          $.each(listB, function(index, value) {
           $('#describe').append('<option value="'+value.value+'">'+value.name+'</option>');
          }); 
        }
        else if($(this).is(':checked') && $(this).val() == 'investimento')
        {
          $('#describe').empty()
          $.each(listC, function(index, value) {
           $('#describe').append('<option value="'+value.value+'">'+value.name+'</option>');
          }); 
        }
  
    });
  }); 


})(jQuery); // End of use strict

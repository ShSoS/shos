$(document).ready(function() {

$("#educationBody").slideToggle("fast"); // The Body of "Messages" is already opened in the design sample.

  $("#education").click(function(){
   /* $(".tab").removeClass("tabSelected");
    $(".tab").addClass("tabNoSelected");
    $(this).removeClass("tabNoSelected");
    $(this).addClass("tabSelected");*/
    $(".tabBody").slideUp("fast");
    $("#educationBody").slideToggle("fast");
  });
    $("#achivement").click(function(){
    /*$(".tab").removeClass("tabSelected");
    $(".tab").addClass("tabNoSelected");
    $(this).removeClass("tabNoSelected");
    $(this).addClass("tabSelected");*/
    $(".tabBody").slideUp("fast");
    $("#achivementBody").slideToggle("fast");
  });
  $("#courses").click(function(){
    /*$(".tab").removeClass("tabSelected");
    $(".tab").addClass("tabNoSelected");
    $(this).removeClass("tabNoSelected");
    $(this).addClass("tabSelected");*/
    $(".tabBody").slideUp("fast");
    $("#coursesBody").slideToggle("fast");
  });
  $("#work_experience").click(function(){
    /*$(".tab").removeClass("tabSelected");
    $(".tab").addClass("tabNoSelected");
    $(this).removeClass("tabNoSelected");
    $(this).addClass("tabSelected");*/
    $(".tabBody").slideUp("fast");
    $("#work_experienceBody").slideToggle("fast");
  });
  $("#language").click(function(){
    /*$(".tab").removeClass("tabSelected");
    $(".tab").addClass("tabNoSelected");
    $(this).removeClass("tabNoSelected");
    $(this).addClass("tabSelected");*/
    $(".tabBody").slideUp("fast");
    $("#languageBody").slideToggle("fast");
  });
});
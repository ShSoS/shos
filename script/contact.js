var letters = $('.letters'),
    firstLetter = letters.first(),
    lastLetter = letters.last();

$('#total_count').text(letters.length);

$('#prev_question, #next_question').click(function(){
  var untucked = $('.untucked');
  
  if($(this).attr('id') === 'prev_question'){
    
    if(untucked.index() !== firstLetter.index()){
      updateCounter(untucked.index(),2);
      untucked.removeClass('untucked')
        .prev().addClass('untucked');
    } else { // on the first index
      updateCounter(untucked.index(),4);
      untucked.removeClass('untucked');
      lastLetter.addClass('untucked');
    }
    
  } else if($(this).attr('id') == 'next_question'){
    
    if(untucked.index() !== lastLetter.index()){
      updateCounter(untucked.index(),1);
      untucked.removeClass('untucked')
        .next().addClass('untucked');
    } else { // on the last index
      updateCounter(untucked.index(),3);
      untucked.removeClass('untucked');
      firstLetter.addClass('untucked');
    }
    
  }
});

function updateCounter(curInx, command){
  var newInx = null;
  switch(command){
    case 1: // +1
      newInx = parseInt(curInx)+1;
      break;
    case 2: // -1
      newInx = parseInt(curInx)-1;
      break;
    case 3: // toFirst
      newInx = firstLetter.index();
      break;
    case 4: // toLast
      newInx = lastLetter.index();
      break;
    default:
      newInx = firstLetter.index();
  }
  $('#cur_count').text(newInx);
}
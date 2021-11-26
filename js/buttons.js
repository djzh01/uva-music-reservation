$(function (){
  var groups = Array.from(document.querySelectorAll('.btn-group'));
  groups.forEach(group => {
      var buttons = Array.from(group.getElementsByTagName('label'));
    //   console.log(buttons);
      buttons.forEach(button => {
          button.addEventListener('click', ()=>{
              
              console.log(button);
              buttons.forEach(sibling => {
                  console.log('sibling' + sibling);
                  sibling.classList.remove('active');
              });
              button.classList.add('active');
          });
      });
  });
  
  
});
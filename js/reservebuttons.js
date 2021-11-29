// var createactivation = function () {
//     var buttons = Array.from(document.querySelectorAll('.create-Res'));
//     console.log(buttons);
//     buttons.forEach(button => {
//         button.addEventListener('click', () => {
//             buttons.forEach(sibling => {
//                 sibling.classList.remove('active');
//             });
//             button.classList.add('active');
//         });
//     });
// }
var createactivation = function (){
    var groups = Array.from(document.querySelectorAll('.btn-group'));
    console.log(groups);
    groups.forEach(group => {
        var buttons = Array.from(group.getElementsByTagName('label'));
        console.log(buttons);
        buttons.forEach(button => {
            button.addEventListener('click', ()=>{
                buttons.forEach(sibling => {
                    sibling.classList.remove('active');
                });
                button.classList.add('active');
            });
        });
    });  
  };
$(document).ready(function(){


$('a[href=student]').click(function (e) {
  e.preventDefault();
});
$('a[href=professor]').click(function (e) {
  e.preventDefault();
});
$('a[href=staff]').click(function (e) {
  e.preventDefault();
});
$('a[href=special]').click(function (e) {
  e.preventDefault();
});

 $('[data-toggle="tooltip"]').tooltip();

var im = new Inputmask("");
im.mask('input[name="mac"]');

});



// function formatMAC(e) {
//     // var oLen = e.target.value.length;
//     //   if(oLen == 2){      e.target.value += "-"; }
//     //   if(oLen == 5){      e.target.value += "-"; }
//     //   if(oLen == 8){      e.target.value += "-"; }
//     //   if(oLen == 11){      e.target.value += "-"; }
//     //   if(oLen == 14){      e.target.value += "-"; }
//     // var r = /([a-f0-9]{2})([a-f0-9]{2})/i,
//     //     str = e.target.value.replace(/[^a-f0-9]/ig, "");

//     // while (r.test(str)) {
//     //     str = str.replace(r, '$1' + '-' + '$2');
//     // }

//     // e.target.value = str.slice(0, 17);
// };

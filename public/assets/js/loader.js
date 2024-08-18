 window.onload = function () {
     function showLoader() {
         document.querySelector('.loader').classList.remove('active');
     }

     function hideLoader() {
         document.querySelector('.loader').classList.add('active');
     }

     function startAfterPageLoad() {
         setTimeout(function () {
             hideLoader();
         }, 200);
     }

     startAfterPageLoad();
     showLoader();
 };
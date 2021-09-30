/*=========================================================================================
	File Name: auth-two-steps.js
	Description: Two Steps verification.
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: PIXINVENT
	Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

var inputContainer = document.querySelector('.auth-input-wrapper');

// Get focus on next element after max-length reach
inputContainer.onkeyup = function (e) {
  var target = e.srcElement;
  var maxLength = parseInt(target.attributes['maxlength'].value, 10);
  var currentLength = target.value.length;

  if (e.keyCode === 8) {
    if (currentLength === 0) {
      var next = target;
      while ((next = next.previousElementSibling)) {
        if (next == null) break;
        if (next.tagName.toLowerCase() == 'input') {
          next.focus();
          break;
        }
      }
    }
  } else {
    if (currentLength >= maxLength) {
      var next = target;
      while ((next = next.nextElementSibling)) {
        if (next == null) break;
        if (next.tagName.toLowerCase() == 'input') {
          next.focus();
          break;
        }
      }
    }
  }
  var code = $('#code');

  var values = $("input[id='codes']")
              .map(function(){
                return $(this).val();
              }).get();
  
  code.val(values[0] + values[1] + values[2] + values[3] + values[4] + values[5]);
};

//  Two Steps Verification
const numeralMask = document.querySelectorAll('.numeral-mask');

// Verification masking
if (numeralMask.length) {
  numeralMask.forEach(e => {
    new Cleave(e, {
      numeral: true
    });
  });

  console.log(numeralMask)
}

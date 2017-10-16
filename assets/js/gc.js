jQuery(document).ready(function($) {

  $('li.nav-item > a').addClass('nav-link');

  //$('.acf-field-true-false > div.acf-input input').addClass('form-check-input');

});


function gcDeleteBulStart(id) {

  jQuery('#delete-bulletin-' + id).removeClass('show');
  jQuery('#delete-bulletin-' + id).addClass('d-none');

  jQuery('#delete-bulletin-' + id + '-confirm').removeClass('d-none');
  jQuery('#delete-bulletin-' + id + '-confirm').addClass('show');

}

function gcDeleteShiftStart(sid) {

  jQuery('#delete-tue-shift-' + sid).removeClass('show');
  jQuery('#delete-tue-shift-' + sid).addClass('d-none');

  jQuery('#delete-tue-shift-' + sid + '-confirm').removeClass('d-none');
  jQuery('#delete-tue-shift-' + sid + '-confirm').addClass('show');

}

function gcEmpCollapse(eid) {

  jQuery('div.collapse.show').removeClass('show');

}

function gcDeleteEmpStart(deid) {
  jQuery('.gc-delete-emp-start-' + deid).addClass('d-none');
  jQuery('.gc-delete-emp-' + deid).removeClass('d-none');
  jQuery('.gc-delete-emp-' + deid).addClass('show');

}

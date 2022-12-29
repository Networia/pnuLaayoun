/*=========================================================================================
    File Name: app-user-list.js
    Description: User List page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent

==========================================================================================*/
$(function () {
  ;('use strict')

  var dtUserTable = $('.table')
  // ,
  //   newUserSidebar = $('.new-user-modal'),
  //   newUserForm = $('.add-new-user'),
  //   select = $('.select2'),
  //   dtContact = $('.dt-contact'),
  //   statusObj = {
  //     0: { title: 'Desactive', class: 'badge-light-danger' },
  //     1: { title: 'Active', class: 'badge-light-success' },
  //   }

  var assetPath = '../../../app-assets/',
    userView = 'app-user-view-account.html'

  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path')
    userView = assetPath + 'app/user/view/account'
  }

  // select.each(function () {
  //   var $this = $(this)
  //   $this.wrap('<div class="position-relative"></div>')
  //   $this.select2({
  //     // the following code is used to disable x-scrollbar when click in select input and
  //     // take 100% width in responsive also
  //     dropdownAutoWidth: true,
  //     width: '100%',
  //     dropdownParent: $this.parent()
  //   })
  // })

  // Users List datatable
  if (dtUserTable.length) {
    dtUserTable.DataTable({
      processing: true,
      serverSide: true,
      ajax: dtUserTable.data('api'), // JSON file to add data
      columns: [
        // columns according to JSON
        { data: '' },
        { data: 'id' ,defaultContent:'0' },
        { data: 'name' ,defaultContent:'0' },
        { data: 'users.name' ,defaultContent:'0' },
        { data: '' }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          orderable: false,
          searchable: false,
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return ''
          }
        },
        {
          targets: 3,
          
          render: function ( data, type, full, meta ,row ) {
            const users = full['users'];
            const names = users.map(user => user.name)
            console.log(names.join('-'));
            return names.join(' - ');
          }
        },
        {
          // Actions
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="btn-group">' +
              '<a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
              feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
              '</a>' +
              '<div class="dropdown-menu dropdown-menu-end">' +
              '<a href="'+ dtUserTable.data('edit') + '/' + full.id +'" class="dropdown-item">' +
              feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) +
              'Edit</a>' +
              '</div>' +
              '</div>'
            )
          }
        }
      ],
      order: [[1, 'desc']],
      dom:
        '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
        '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
        '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
        '>t' +
        '<"d-flex justify-content-between mx-2 row mb-1"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      language: {
        sLengthMenu: 'Show _MENU_',
        search: 'Search',
        searchPlaceholder: 'Search..'
      },
      // Buttons with Dropdown
      buttons: [
        {
          extend: 'collection',
          className: 'btn btn-outline-secondary dropdown-toggle me-2',
          text: feather.icons['external-link'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
          buttons: [
            {
              extend: 'print',
              text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
              className: 'dropdown-item',
              // exportOptions: { columns: [1, 2, 3, 4, 5] }
            },
            {
              extend: 'csv',
              text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
              className: 'dropdown-item',
              // exportOptions: { columns: [1, 2, 3, 4, 5] }
            },
            {
              extend: 'excel',
              text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
              className: 'dropdown-item',
              // exportOptions: { columns: [1, 2, 3, 4, 5] }
            },
            {
              extend: 'pdf',
              text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
              className: 'dropdown-item',
              // exportOptions: { columns: [1, 2, 3, 4, 5] }
            },
            {
              extend: 'copy',
              text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
              className: 'dropdown-item',
              // exportOptions: { columns: [1, 2, 3, 4, 5] }
            }
          ],
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary')
            $(node).parent().removeClass('btn-group')
            setTimeout(function () {
              $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex mt-50')
            }, 50)
          }
        },
        /*{
          text: 'Add New User',
          className: 'add-new btn btn-primary',
          attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#modals-slide-in'
          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary')
          }
        }*/
      ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data()
              return 'Details of ' + data['name'] ?? data['id']
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.columnIndex !== 6 // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIdx +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : ''
            }).join('')
            return data ? $('<table class="table"/>').append('<tbody>' + data + '</tbody>') : false
          }
        }
      },
      language: {
        paginate: {
          // remove previous & next text from pagination
          previous: '&nbsp;',
          next: '&nbsp;'
        }
      },
      initComplete: function (settings, json) {
        // Adding role filter once table initialized
        //! filere
        // this.api()
        //   .columns(3)
        //   .every(function () {
        //     var column = this
        //     var label = $('<label class="form-label" for="UserStatus">Status</label>').appendTo('.user_status')
        //     var select = $(
        //       '<select id="UserStatus" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Select Status </option></select>'
        //     )
        //       .appendTo('.user_status')
        //       .on('change', function () {
        //         var val = $.fn.dataTable.util.escapeRegex($(this).val())
        //         column.search(val ? '^' + val + '$' : '', true, false).draw()
        //       })

        //       json.filter_status.forEach(element => {
        //         select.append('<option value="' + element.value + '" class="text-capitalize">' + statusObj[element.value].title + '</option>');
        //       });
        //   })
      }
    })
  }

})

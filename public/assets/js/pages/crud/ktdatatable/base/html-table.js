'use strict';
// Class definition

var KTDatatableHtmlTableDemo = function() {
  // Private functions

  // demo initializer
  var demo = function() {

    var datatable = $('#kt_datatable').KTDatatable({
      sortable: false,
      data: {
        saveState: {cookie: false},
        pageSize: 5
      },
      search: {
        input: $('#kt_datatable_search_query'),
        key: 'generalSearch',
      },
      layout: {
        class: 'datatable-bordered',
      },
      columns: [
        {
          field: 'DepositPaid',
          type: 'number',
        },
        {
          field: 'OrderDate',
          type: 'date',
          format: 'YYYY-MM-DD',
        }, {
          field: 'Network',
          title: 'Network',
          autoHide: false,
          // callback function support for column rendering
          template: function(row) {
            var status = {
              1: {
                'title': 'Online',
                'class': ' label-light-success',
              },
              2: {
                'title': 'Disconnect',
                'class': ' label-light-danger',
              }
            };
            return '<span class="label font-weight-bold label-lg' + status[row.Network].class + ' label-inline">' + status[row.Network].title + '</span>';
          },
        },{
          field: 'Status',
          title: 'Status',
          autoHide: false,
          // callback function support for column rendering
          template: function(row) {
            var status = {
              1: {
                'title': 'Submit',
                'class': ' label-light-warning',
              }, 
              2: {
                'title': 'Apprrove',
                'class': ' label-light-success',
              },
              3: {
                'title': 'Reject',
                'class': ' label-light-danger',
              }
            };
            return '<span class="label font-weight-bold label-lg' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
          },
        },{
          field: 'Kondisi',
          title: 'Kondisi',
          autoHide: false,
          // callback function support for column rendering
          template: function(row) {
            var Kondisi = {
              'RUSAK RINGAN': {
                'title': 'RUSAK RINGAN',
                'class': ' label-light-success',
              }, 
              'RUSAK SEDANG': {
                'title': 'RUSAK SEDANG',
                'class': ' label-light-warning',
              },
              'RUSAK BERAT': {
                'title': 'RUSAK BERAT',
                'class': ' label-light-danger',
              }
            };
            return '<span class="label font-weight-bold label-lg' + Kondisi[row.Kondisi].class + ' label-inline">' + Kondisi[row.Kondisi].title + '</span>';
          },
        },{
          field: 'Banned',
          title: 'Banned',
          autoHide: false,
          // callback function support for column rendering
          template: function(row) {
            var banned = {
              1: {
                'title': 'Yes',
                'class': ' label-light-danger',
              }, 
              2: {
                'title': 'No',
                'class': ' label-light-success',
              }
            };
            return '<span class="label font-weight-bold label-lg' + banned[row.Banned].class + ' label-inline">' + banned[row.Banned].title + '</span>';
          },
        }, {
          field: 'Type',
          title: 'Type',
          autoHide: false,
          // callback function support for column rendering
          template: function(row) {
            var status = {
              1: {
                'title': 'Reguler',
                'state': 'warning',
              },
              2: {
                'title': 'Marketing',
                'state': 'info',
              },
              3: {
                'title': 'Party',
                'state': 'success',
              },
              4: {
                'title': 'Service',
                'state': 'danger',
              },
            };
            return '<span class="label label-' + status[row.Type].state + ' label-dot mr-2"></span><span class="font-weight-bold text-' + status[row.Type].state + '">' + status[row.Type].title + '</span>';
          },
        }, {
          field: 'LiftType',
          title: 'LiftType',
          autoHide: false,
          // callback function support for column rendering
          template: function(row) {
            var status = {
              1: {
                'title': 'Private Lift',
                'state': 'success',
              },
              2: {
                'title': 'Service Lift',
                'state': 'danger',
              }
            };
            return '<span class="label label-' + status[row.LiftType].state + ' label-dot mr-2"></span><span class="font-weight-bold text-' + status[row.LiftType].state + '">' + status[row.LiftType].title + '</span>';
          },
        },
        {
          field: 'Actions',
          title: 'Actions',
          sortable: false,
          width: 125,
          overflow: 'visible',
          autoHide: false,
          template: function() {
              return '\
                  <div class="dropdown dropdown-inline">\
                      <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">\
                          <span class="svg-icon svg-icon-md">\
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                      <rect x="0" y="0" width="24" height="24"/>\
                                      <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>\
                                  </g>\
                              </svg>\
                          </span>\
                      </a>\
                      <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                          <ul class="navi flex-column navi-hover py-2">\
                              <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">\
                                  Choose an action:\
                              </li>\
                              <li class="navi-item">\
                                  <a href="#" class="navi-link">\
                                      <span class="navi-icon"><i class="la la-envelope-open"></i></span>\
                                      <span class="navi-text">Message</span>\
                                  </a>\
                              </li>\
                              <li class="navi-item">\
                                  <a href="#" class="navi-link">\
                                      <span class="navi-icon"><i class="la la-copy"></i></span>\
                                      <span class="navi-text">View</span>\
                                  </a>\
                              </li>\
                              <li class="navi-item">\
                                  <a href="#" class="navi-link">\
                                      <span class="navi-icon"><i class="la la-file-text-o"></i></span>\
                                      <span class="navi-text">Edit</span>\
                                  </a>\
                              </li>\
                          </ul>\
                      </div>\
                  </div>\
                  <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon" title="Delete">\
                      <span class="svg-icon svg-icon-md">\
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                  <rect x="0" y="0" width="24" height="24"/>\
                                  <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
                                  <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
                              </g>\
                          </svg>\
                      </span>\
                  </a>\
              ';
          },
        },
      ],
    });

    $('#kt_datatable_search_status').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Status');
    });

    $('#kt_datatable_search_type').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Type');
    });

    $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();

  };

  return {
    // Public functions
    init: function() {
      // init dmeo
      demo();
    },
  };
}();

jQuery(document).ready(function() {
  KTDatatableHtmlTableDemo.init();
});

var rootPage = window.location.pathname.split('/')[1]

//== Class Initialization
jQuery(document).ready(function () {
	Table.Init();
});

var Table = {
	Init: function () {
		t = $("#divTransaksiList").mDatatable({
			data: {
				type: "remote",
				source: {
					read: {
						url: '/'+rootPage+'/transaksi/ListTransaksi', //butuh list transaksi
						method: "GET",
						map: function (r) {
							var e = r;
							return void 0 !== r.data && (e = r.data), e;
						}
					}
				},
				pageSize: 10,
				saveState: {
					cookie: true,
					webstorage: true
				},
				serverPaging: false,
				serverFiltering: false,
				serverSorting: false
			},
			layout: {
				scroll: false,
				footer: false
			},
			sortable: true,
			pagination: true,
			toolbar: {
				items: {
					pagination: {
						pageSizeSelect: [10, 20, 30, 50, 100]
					}
				}
			},
			search: {
				input: $("#tbxSearchTransaksi")
			},
			columns: [
				{
					field: "id", title: "Actions", sortable: false, textAlign: "center", template: function (t) {
						var strBuilder = '<a href="/'+rootPage+'/transaksi/editTransaksi/' + t.id + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Rekening"><i class="la la-edit"></i></a>\t\t\t\t\t\t';
						strBuilder += '<a href="/'+rootPage+'/transaksi/detailTransaksi/' + t.id + '" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="Detail Rekening"><i class="la la-book"></i></a>\t\t\t\t\t\t';
						strBuilder += '<a href="/'+rootPage+'/transaksi/hapusTransaksi/' + t.id + '" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Hapus Rekening"><i class="la la-trash"></i></a>';
						return strBuilder;
					}
				},
				{ field: "nama_transaksi", title: "Nama Transaksi", textAlign: "center" },
				{ field: "tgl_transaksi", title: "Tgl Transaksi", textAlign: "center" },
				{ field: "total_transaksi", title: "Total Transaksi", textAlign: "center" },

				// { field: "kd_debet", title: "Kode Debet", textAlign: "center" },
				// { field: "kd_kredit", title: "Kode Kredit", textAlign: "center" },
				// { field: "tgl_transaksi_debet", title: "Tgl Transaksi Debet", textAlign: "center" },
				// { field: "tgl_transaksi_kredit", title: "Tgl Transaksi Kredit", textAlign: "center" },
				// { field: "nominal_debet", title: "Nominal Debet", textAlign: "center" },
				// { field: "nominal_kredit", title: "Nominal Kredit", textAlign: "center" },
				// { field: "uraian_debet", title: "Keterangan Debet", textAlign: "center" },
				// { field: "uraian_kredit", title: "Keterangan Kredit", textAlign: "center" },
			]
		})
	}
}

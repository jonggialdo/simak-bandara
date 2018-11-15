//== Class Initialization
jQuery(document).ready(function () {
	Table.Init();
});

var Table = {
	Init: function () {
		t = $("#divRekeningList").mDatatable({
			data: {
				type: "remote",
				source: {
					read: {
						url: "#", //<?=site_url()?>/controller/fungsi/parameter
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
				input: $("#tbxSearchRekening")
			},
			columns: [
				{ field: "kode_rekening", title: "Kode Rekening", textAlign: "center" },
				{ field: "nama_kode", title: "Keterangan", textAlign: "center" },
				{ field: "status", title: "Status", textAlign: "center" },
			]
		})
	}
}
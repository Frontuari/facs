(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['es'] = {
		formatLoadingMessage: function () {
			return "Por favor espere...";
		},
		formatRecordsPerPage: function (pageNumber) {
			return "{0} resultados por página".replace('{0}', pageNumber);
		},
		formatShowingRows: function (pageFrom, pageTo, totalRows) {
			return "Mostrando desde {0} hasta {1} - En total {2} resultados".replace('{0}', pageFrom).replace('{1}', pageTo).replace('{2}', totalRows);
		},
		formatSearch: function () {
			return "Buscar";
		},
		formatNoMatches: function () {
			return "<?php echo ('No hay empleados que mostrar'); ?>";
		},
		formatPaginationSwitch: function () {
			return "Ocultar/Mostrar paginación";
		},
		formatRefresh: function () {
			return "Refrescar";
		},
		formatToggle: function () {
			return "Ocultar/Mostrar";
		},
		formatColumns: function () {
			return "Columnas";
		},
		formatAllRows: function () {
			return "Todos";
		},
		formatConfirmDelete : function() {
			return "<?php echo ('¿Estás seguro(a) de querer borrar los empleados seleccionados?'); ?>";
		}
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['es']);

})(jQuery);
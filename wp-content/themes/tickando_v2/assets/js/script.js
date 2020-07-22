window.addEventListener("DOMContentLoaded", (event) => {
	var app = new Vue({
		el: '#app',
		data: {
			dataForm: {
				nom_prenom: '',
				email: '',
				societe_association: '',
				activite_plus_2_ans: false,
				ca_sup_30k: false,
			},
			montant_previsionnel: 150000,
			array_pourcentages_avance_treso: [10,20,40],
			pourcentage_avance_treso: 10,
			selected_pourcentages_avance_treso: null,
			pourcentage_x: 0.85,
		},
		computed: {
			result_avance_treso: function () {
				let result = this.montant_previsionnel*this.pourcentage_avance_treso/100*this.pourcentage_x
				return result;
			},
			pourcentage_honoraire_tickando: function() {
				let honoraires_tickando_euros = this.montant_previsionnel*this.pourcentage_avance_treso/100*0.15;
				let honoraires_tickando_pourcentage = honoraires_tickando_euros*100/this.montant_previsionnel;
				return honoraires_tickando_pourcentage;
			}
		},
		watch: {
		    pourcentage_avance_treso: function() {
		        this.updateChart()
		    }
		},
		methods: {
			sendEmail(e) {
				/*let scope = this;
				// https://smtpjs.com/
				Email.send({
				    // Host : "smtp.yourisp.com",

				    // Host : "mail34.lwspanel.com",
				    // Username : "test@marksondev.fr",
				    // Password : "vY6-rm!tJj",

				    SecureToken : "558aad52-e4bf-4b04-9c77-90f039bdd943",
				    To : this.dataForm.email,
				    From : "test@marksondev.fr",
				    Subject : "Example subject",
				    Body : "<h1>Hello "+ this.dataForm.prenom+"</h1>",
				}).then(
					function(message) {
						alert(message);
						// scope.dataForm.formIsShow = false;
					}
				);*/
		    },
		    formatPrice(value) {
		        return (new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR', minimumFractionDigits: 0 }).format(value))
		    },
		    updateChart() {
		    	var data = [100-this.pourcentage_honoraire_tickando,this.pourcentage_honoraire_tickando];
			    chartPie.data.datasets.forEach((dataset) => {
			        dataset.data = data;
			    });
			    chartPie.update();
		    }
		}
	})

	let allRangesWrap = document.querySelectorAll('.range-wrap');
	allRangesWrap.forEach(function(el) {
		setValue = () => {
			let rangeValue = el.querySelector('.range-value');
			let range = el.querySelector('.range');
			const newValue = Number( (range.value - range.min) * 100 / (range.max - range.min) );
			const newPosition = 10 - (newValue * 0.2);
			rangeValue.style.left = `calc(${newValue}% + (${newPosition}px))`;
		};

		setValue();
		el.addEventListener('input', setValue);
	});

	var ctx = document.querySelector('#chartPie');
	var chartPie = new Chart(ctx, {
	    type: 'pie',
	    data: {
		    datasets: [{
		        data: [100, 0],
		        backgroundColor: ['#99c9f2','#2883d1']
		    }],
		    labels: [
		        'Prévisionnel de la billeterie',
		        'Honoraires'
		    ]
		},
		options: {
            legend: {
                onClick: (e) => e.stopPropagation(),
                labels: {
	                fontSize: 17,
	                generateLabels: function(chart) {
	                    var data = chart.data;
	                    if (data.labels.length && data.datasets.length) {
	                        return data.labels.map(function(label, i) {
	                            var meta = chart.getDatasetMeta(0);
	                            var ds = data.datasets[0];
	                            var arc = meta.data[i];
	                            var custom = arc && arc.custom || {};
	                            var getValueAtIndexOrDefault = Chart.helpers.getValueAtIndexOrDefault;
	                            var arcOpts = chart.options.elements.arc;
	                            var fill = custom.backgroundColor ? custom.backgroundColor : getValueAtIndexOrDefault(ds.backgroundColor, i, arcOpts.backgroundColor);
	                            var stroke = custom.borderColor ? custom.borderColor : getValueAtIndexOrDefault(ds.borderColor, i, arcOpts.borderColor);
	                            var bw = custom.borderWidth ? custom.borderWidth : getValueAtIndexOrDefault(ds.borderWidth, i, arcOpts.borderWidth);
								// We get the value of the current label
								var value = chart.config.data.datasets[arc._datasetIndex].data[arc._index];

	                            return {
	                                text: label + " : " + value + "%",
	                                fillStyle: fill,
	                                strokeStyle: stroke,
	                                lineWidth: bw,
	                                hidden: isNaN(ds.data[i]) || meta.data[i].hidden,
	                                index: i
	                            };
	                        });
	                    } else {
	                        return [];
	                    }
	                }
	            }
            },
            tooltips: {
			    callbacks: {
					label: (tooltipItems, data) => {
			        	return data.labels[tooltipItems.index] + ' ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
			    	}
				},
    			bodyFontSize: 16
			}
		}
	});
	let data = [100-app.pourcentage_honoraire_tickando,app.pourcentage_honoraire_tickando];
    chartPie.data.datasets.forEach((dataset) => {
        dataset.data = data;
    });
    chartPie.update();
});

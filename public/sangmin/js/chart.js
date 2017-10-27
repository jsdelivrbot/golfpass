var options = {
		'legend':{
			names: [
				'Perceivable',
				'Information Loss',
				'Understandable',
				'Enough Time',
				'Epilepsy Prevent',
				'Operable',
				'Navigation',
				'Error Prevent'
			],
			hrefs: [
				'http://nuli.navercorp.com//sharing/a11y#k1',
				'http://nuli.navercorp.com//sharing/a11y#k2',
				'http://nuli.navercorp.com//sharing/a11y#k3',
				'http://nuli.navercorp.com//sharing/a11y#k4',
				'http://nuli.navercorp.com//sharing/a11y#k5',
				'http://nuli.navercorp.com//sharing/a11y#k6',
				'http://nuli.navercorp.com//sharing/a11y#k7',
				'http://nuli.navercorp.com//sharing/a11y#k8'
			]
		},
		'dataset': {
			title: 'Web accessibility status',
			values: [[80,98,98,80,98,60,98,80]],
			bgColor: 'transparent',
			fgColor: '#587844',
		},
		'chartDiv': 'chart',
		'chartType': 'radar',
		'chartSize': { width: 400, height: 400 }
	};
	Nwagon.chart(options);
const route = {
	path: '/system',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'system-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'system-dashboard',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/dashboard/index.vue'),
		},

		{
			path: 'employee',
			name: 'system-employee',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/employee/index.vue'),
		},

		{
			path: 'report',
			name: 'system-report',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/report/index.vue'),
		},
	]
};

export default route;
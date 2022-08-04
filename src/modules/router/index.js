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
			path: 'schedule',
			name: 'system-schedule',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/schedule/index.vue'),
		},

		{
			path: 'schedule/create',
			name: 'system-schedule-create',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/schedule/create.vue'),
		},

		{
			path: 'schedule/:schedule/show',
			name: 'system-schedule-show',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/schedule/show.vue'),
		},

		{
			path: 'schedule/:schedule/edit',
			name: 'system-schedule-edit',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/schedule/edit.vue'),
		},

		{
			path: 'employee',
			name: 'system-employee',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/employee/index.vue'),
		},

		{
			path: 'employee/create',
			name: 'system-employee-create',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/employee/create.vue'),
		},

		{
			path: 'employee/:employee/show',
			name: 'system-employee-show',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/employee/show.vue'),
		},

		{
			path: 'employee/:employee/edit',
			name: 'system-employee-edit',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/employee/edit.vue'),
		},

		{
			path: 'section',
			name: 'system-section',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/section/index.vue'),
		},

		{
			path: 'section/create',
			name: 'system-section-create',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/section/create.vue'),
		},

		{
			path: 'section/:section/show',
			name: 'system-section-show',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/section/show.vue'),
		},

		{
			path: 'section/:section/edit',
			name: 'system-employee-edit',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/employee/edit.vue'),
		},

		{
			path: 'section/:section/subsection',
			name: 'system-subsection',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/subsection/index.vue'),
		},

		{
			path: 'section/:section/subsection/create',
			name: 'system-subsection-create',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/subsection/create.vue'),
		},

		{
			path: 'section/:section/subsection/:subsection/show',
			name: 'system-subsection-show',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/subsection/show.vue'),
		},

		{
			path: 'section/:section/subsection/:subsection/user',
			name: 'system-user',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/user/index.vue'),
		},

		{
			path: 'section/:section/subsection/:subsection/user/create',
			name: 'system-user-create',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/user/create.vue'),
		},

		{
			path: 'section/:section/subsection/:subsection/user/show',
			name: 'system-user-show',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/user/show.vue'),
		},

		{
			path: 'report',
			name: 'system-report',
			component: () => import(/* webpackChunkName: "backend" */ '@modules/pages/report/index.vue'),
		},
	]
};

export default route;
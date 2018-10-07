import Vue from 'vue'
import Router from 'vue-router'
import Registration from './views/Registration.vue'
import App from './App'

Vue.use(Router)
const router = new Router({
  routes: [
    { 
         path: '/',
         name: 'App',
         component: App,
         redirect: '/Registration',
         children: 
         [
          {
              path: 'Registration',
              name: 'Registration',
              component: Registration,
          }
         ] 
     }
  ]
})

/**
 * trigger upon entering routes
 */
router.beforeEach(function (to, from, next) {
  next();
})
/**
* trigger after entering routes
*/
router.afterEach(route => {})

export default router;

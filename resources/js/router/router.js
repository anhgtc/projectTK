import Vue from 'vue'
import VueRouter from 'vue-router'

//user
import Frontend from '../views/layouts/Frontend.vue'
import HomeIndex from '../views/frontend/home/HomeIndex.vue'
import PostsIndex from '../views/frontend/post/PostsIndex.vue'
import PostsDetail from '../views/frontend/post/PostsDetail.vue'

//admin
import Backend from '../views/layouts/Backend.vue'
import BackendCategoriesCreate from '../views/backend/category/BackendCategoriesCreate.vue'
import BackendCategoriesEdit from '../views/backend/category/BackendCategoriesEdit.vue'
import BackendCategoriesIndex from '../views/backend/category/BackendCategoriesIndex.vue'
import BackendCommentsIndex from '../views/backend/comment/BackendCommentsIndex.vue'
import BackendPostsCreate from '../views/backend/post/BackendPostsCreate.vue'
import BackendPostsIndex from '../views/backend/post/BackendPostsIndex.vue'
import BackendPostsEdit from '../views/backend/post/BackendPostsEdit.vue'
import BackendUsersIndex from '../views/backend/user/BackendUsersIndex.vue'
import BackendUsersEdit from '../views/backend/user/BackendUsersEdit.vue'
import BackendUsersCreate from '../views/backend/user/BackendUsersCreate.vue'
import BackendDashboard from '../views/backend/dashboard/BackendDashboard.vue'
import { component } from 'vue/types/umd'
Vue.use(VueRouter)

const routes = [{
        path: 'admin',
        component: Backend,
        children: [{
                path: 'Dashboard',
                name: 'BackendDashboard',
                component: BackendDashboard
            },
            {
                path: 'Posts',
                name: 'BackendPostsIndex',
                component: BackendPostsIndex
            },
            {
                path: 'Posts/:id',
                name: 'BackendPostsEdit',
                component: BackendPostsEdit
            },
            {
                path: 'Posts/Create',
                name: 'BackendPostsCreate',
                component: BackendPostsCreate
            },
            {
                path: 'Categories',
                name: 'BackendCategoriesIndex',
                component: BackendCategoriesIndex
            },
            {
                path: 'Categories/:id',
                name: 'BackendCategoriesEdit',
                component: BackendCategoriesEdit
            },
            {
                path: 'Categories/Create',
                name: 'BackendCategoriesCreate',
                component: BackendCategoriesCreate
            },
            {
                path: 'Users',
                name: 'BackendUsersIndex',
                component: BackendUsersIndex
            },
            {
                path: 'Users/:id',
                name: 'BackendUsersEdit',
                component: BackendUsersEdit
            },
            {
                path: 'Users/Create',
                name: 'BackendUsersCreate',
                component: BackendUsersCreate
            }
        ]
    }

];

const router = new VueRouter({
    mode: "history",
    routes
});


export default router;
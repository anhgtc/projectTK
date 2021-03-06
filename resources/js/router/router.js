import Vue from 'vue'
import VueRouter from 'vue-router'

//admin
import Backend from '../views/layouts/Backend.vue'
import BackendHome from '../views/backend/home/BackendHome.vue'
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
import BackendAdminRegister from '../views/backend/admin/BackendAdminRegister.vue'

//user
import Frontend from '../views/layouts/Frontend.vue'
import HomeIndex from '../views/frontend/home/HomeIndex.vue'
import PostsIndex from '../views/frontend/post/PostsIndex.vue'
import PostsDetail from '../views/frontend/post/PostsDetail.vue'
import UserRegister from '../views/frontend/user/UserRegister.vue'
Vue.use(VueRouter)

const routes = [
    {
        path: '/admin/Register',
        name: 'BackendAdminRegister',
        component: BackendAdminRegister
    },
    // {
    //     path: '/admin/Login',
    //     name: 'BackendAdminLogin',
    //     component: BackendAdminLogin
    // },
    {
        path: '/admin',
        component: Backend,
        children: [
            {
                path: '',
                name: 'BackendHome',
                component: BackendHome
            },
            {
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
                path: 'Posts/ViewCreate',
                name: 'BackendPostsViewCreate',
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
            },
            {
                path: 'Comments',
                name: 'BackendCommentsIndex',
                component: BackendCommentsIndex
            }
        ]
    },
    {
        path: '/user/Register',
        name: 'UserRegister',
        component: UserRegister
    },
    // {
    //     path: '/user/Login',
    //     name: 'UserLogin',
    //     component: UserLogin
    // },
    {
        path: '',
        component: Frontend,
        children: [
            {
                path: '',
                name: 'HomePage',
                component: HomeIndex
            },
            {
                path: '/Posts',
                name: 'PostsIndex',
                component: PostsIndex
            },
            {
                path: '/Posts/:id',
                name: 'PostsDetail',
                component: PostsDetail
            },
        ]
    }

];

const router = new VueRouter({
    mode: "history",
    routes
});


export default router;

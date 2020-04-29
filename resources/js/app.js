/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("Topnav", require("./components/Topnav.vue").default);
Vue.component("Authbox", require("./components/Authbox.vue").default);
Vue.component("Trends", require("./components/Trends.vue").default);
Vue.component(
    "registerInput",
    require("./components/partials/Registerinput.vue").default
);
Vue.component(
    "profileInput",
    require("./components/partials/ProfileInput.vue").default
);
Vue.component("dashboard", require("./components/Dashboard.vue").default);

// Sidebar Router-view Components
const Home = Vue.component(
    "Home",
    require("./components/sidebar/Home.vue").default
);
const Profile = Vue.component(
    "Profile",
    require("./components/sidebar/Profile.vue").default
);
const Explore = Vue.component(
    "Explore",
    require("./components/sidebar/Explore.vue").default
);
const Notification = Vue.component(
    "Notification",
    require("./components/sidebar/Notification.vue").default
);
const Messages = Vue.component(
    "Messages",
    require("./components/sidebar/Messages.vue").default
);
const Bookmark = Vue.component(
    "Bookmark",
    require("./components/sidebar/Bookmark.vue").default
);
const List = Vue.component(
    "List",
    require("./components/sidebar/List.vue").default
);
const More = Vue.component(
    "More",
    require("./components/sidebar/More.vue").default
);

//Profile Router-view Components
const Tweets = Vue.component(
    "Tweets",
    require("./components/profile/Tweets.vue").default
);
const Tweep = Vue.component(
    "Tweep",
    require("./components/profile/Tweep.vue").default
);
const Media = Vue.component(
    "Media",
    require("./components/profile/Media.vue").default
);
const Likes = Vue.component(
    "Likes",
    require("./components/profile/Likes.vue").default
);

import VueRouter from "vue-router";

Vue.use(VueRouter);
const routes = [
    //sidebar routes
    {
        path: "/home",
        component: Home,
        name: "home"
    },
    {
        path: "/explore",
        component: Explore,
        name: "explore"
    },
    {
        path: "/notification",
        component: Notification,
        name: "notification"
    },
    {
        path: "/messages",
        component: Messages,
        name: "messages"
    },
    {
        path: "/bookmark",
        component: Bookmark,
        name: "bookmark"
    },
    {
        path: "/list",
        component: List,
        name: "list"
    },
    {
        path: "/more",
        component: More,
        name: "more"
    },
    {
        path: "/profile/:userId",
        component: Profile,
        name: "profile",
        children: [
            {
                path: "",
                component: Tweets,
                name: "tweets"
            },
            {
                path: "tweep",
                component: Tweep,
                name: "t&p"
            },
            {
                path: "media",
                component: Media,
                name: "media"
            },
            {
                path: "likes",
                component: Likes,
                name: "likes"
            }
        ]
    },
    {
        path: "/dashboard",
        component: Home
        // name: "home"
    }
];
const router = new VueRouter({
    mode: "history",
    routes // short for `routes: routes`
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: "#app",
    router
});

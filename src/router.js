import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  scrollBehavior() {
    return { x: 0, y: 0 }
  },
  routes: [
    {
      path: "/",
      name: "home",
      component: require("@/views/Home.vue").default // load sync home
    },
    {
      path: "/projects",
      name: "projects",
      component: () => import("@/views/Projects.vue")
    },
    {
      path: "/project/:id/:urlSlug",
      name: "project",
      component: () => import("@/views/Project.vue")
    },
    {
      path: "/quotes",
      name: "quotes",
      component: () => import("@/views/Quotes.vue")
    },
    {
      path: "/quote/:id/:urlSlug",
      name: "quote",
      component: () => import("@/views/Quote.vue")
    },
    {
      path: "/poems",
      name: "poems",
      component: () => import("@/views/Poems.vue")
    },
    {
      path: "/poem/:id/:urlSlug",
      name: "poem",
      component: () => import("@/views/Poem.vue")
    },
    {
      path: "/gallery",
      name: "gallery",
      component: () => import("@/views/Gallery.vue")
    },
    {
      path: "/hire-Hasil",
      name: "hire-hasil",
      component: () => import("@/views/HireHasil.vue")
    },
    {
      path: "/performance-analysis",
      redirect: { name: 'project', params: { id: 11, urlSlug: 'electrical-device-performance-tracker-analyser-realtime' } }
    },
    {
      path: "*",
      name: "404*",
      redirect: { name: 'home' }
    }
  ]
})

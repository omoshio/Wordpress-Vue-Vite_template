import { createApp } from 'vue'
import Hello from '../js/hello.vue'

console.log('Vite + WordPress テーマ起動 🚀')

const el = document.getElementById('App')
if (el) {
  console.log('#vue-sample にマウントします')
  createApp(Hello).mount(el)
} else {
  console.warn('#vue-sample が見つかりません')
}
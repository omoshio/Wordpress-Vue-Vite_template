<template>
    <div class="slide-wrap">
      <vue3-marquee :pause-on-hover="false" :duration="20" :clone="true">
        <div class="slide-item" v-for="(img, index) in images" :key="index">
          <img :src="img" alt="" />
        </div>
      </vue3-marquee>
    </div>
  </template>
  
  <script setup>
import { Vue3Marquee } from 'vue3-marquee'

  const images = [
    '/wp-content/themes/WordPress -Vue -Vite_template/dist/images/img01.png',
    '/wp-content/themes/WordPress -Vue -Vite_template/dist//images/img02.png',
    '/wp-content/themes/WordPress -Vue -Vite_template/dist/images/img03.png'
  ]
  </script>
  
  <style scoped>
  .slide-wrap {
    overflow: hidden;
  }
  .slide-item {
    margin-right: 20px;
  }
  img {
    width: 200px;
    height: auto;
  }
  </style>
  
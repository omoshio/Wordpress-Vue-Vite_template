<template>
    <div class="tabs">
      <div class="tab-buttons">
        <button
          v-for="(tab, index) in tabs"
          :key="index"
          :class="{ active: activeIndex === index }"
          @click="activeIndex = index"
        >
          {{ tab.label }}
        </button>
      </div>
      <div class="tab-content">
        <div v-for="(tab, index) in tabs" :key="index" v-show="activeIndex === index">
          {{ tab.content }}
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  
  const tabs = [
    { label: 'Tab 1', content: 'タブ1の内容です' },
    { label: 'Tab 2', content: 'タブ2の内容です' },
    { label: 'Tab 3', content: 'タブ3の内容です' },
  ]
  
  const activeIndex = ref(0)
  </script>
  
  <style scoped>
  .tab-buttons button {
    padding: 0.5rem 1rem;
    margin-right: 0.5rem;
    cursor: pointer;
  }
  .tab-buttons button.active {
    background-color: #333;
    color: #fff;
  }
  .tab-content {
    margin-top: 1rem;
    border: 1px solid #ddd;
    padding: 1rem;
  }
  </style>
import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import path from 'path'

export default defineConfig({
  root: path.resolve(__dirname, 'frontend'),
  base: '', // ← ここを空にする
  plugins: [vue()],
  publicDir: path.resolve(__dirname, 'frontend/public'),
  build: {
    outDir: path.resolve(__dirname, 'dist'),
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: path.resolve(__dirname, 'frontend/main.js'),
    },
  },
})

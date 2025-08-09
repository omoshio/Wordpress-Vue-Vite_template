import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import path from 'path'

export default defineConfig({
  // 既存の設定はそのまま
  root: path.resolve(__dirname, 'frontend'),
  base: '/wp-content/themes/cototabi.com/dist/',
  plugins: [vue()],
  build: {
    outDir: path.resolve(__dirname, 'dist'),
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      // ここを絶対パスに修正
      input: path.resolve(__dirname, 'frontend/main.js'),
    },
  },
})

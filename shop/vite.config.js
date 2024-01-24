import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    outDir: 'public/js',
  },
  optimizeDeps: {
    include: [
        'vue/dist/vue.esm-bundler.js',
        'vue-router'
    ],
  },
  root: '.',
  base: '', 
  server: {
    port: 3002, 
  },
  
});

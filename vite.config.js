import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
  server: {
    cors: {
      origin: 'https://tienda.test', // Permite este dominio específico
      methods: ['GET', 'POST', 'PUT', 'DELETE'], // Métodos permitidos
      credentials: true // Si se necesitan cookies o autenticación
    }
  },
  plugins: [
      laravel({
          input: ['resources/css/app.css', 'resources/js/app.js'],
          refresh: true,
      }),
      vue(),
  ],
  resolve: {
    alias: {
      vue: 'vue/dist/vue.esm-bundler.js',
    },
  },
  build: {
    rollupOptions: {
      output: {
        manualChunks: undefined
      }
    }
  }
});




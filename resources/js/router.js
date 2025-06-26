import { createRouter, createWebHistory } from 'vue-router'
import dashboard from './components/admin/dashboard';
import nuevaVenta from './components/admin/nuevaVenta';
import ventaExistente from './components/admin/ventaExistente';
import clientes from './components/admin/clientes';
import miPerfil from './components/miPerfil';
import nuevaEmpresa from './components/cliente/nuevaEmpresa';
import areasEmpresa from './components/cliente/areasEmpresa';
import listaResponden from './components/cliente/listaResponden';
import respuesta from './components/cliente/respuesta';
import informeSocio from './components/cliente/informeSocio';
import informeGeneralDimensiones from './components/cliente/informeGeneralDimensiones';
import comparacionDImensiones from './components/cliente/comparacionDImensiones.vue';
import fortalezasDebilidadesFortalecer from './components/cliente/fortalezasDebilidadesFortalecer';
import Paquetes from './components/admin/paquetes.vue';

const routes = [
  {
    path: '/dashboard',
    name: 'dashboard',
    component: dashboard
  },
  {
    path: '/:catchAll(.*)',
    redirect: '/'
  },
  {
    path: '/nueva-venta',
    name: 'nuevaVenta',
    component: nuevaVenta
  },
  {
    path: '/venta-existente',
    name: 'ventaExistente',
    component: ventaExistente
  },
  {
    path: '/clientes',
    name: 'clientes',
    component: clientes
  },
  {
    path: '/mi-perfil',
    name: 'miPerfil',
    component: miPerfil
  },
  {
    path: '/nueva-empresa',
    name: 'nuevaEmpresa',
    component: nuevaEmpresa
  },
  {
    path: '/areas-empresa',
    name: 'areasEmpresa',
    component: areasEmpresa
  },
  {
    path: '/lista-responden/:id',
    name: 'listaResponden',
    component: listaResponden
  },
  {
    path: '/respuesta/:id',
    name: 'respuesta',
    component: respuesta
  },
  {
    path: '/informe-socio/:id',
    name: 'informeSocio',
    component: informeSocio
  },
  {
    path: '/informe-general-dimensiones/:id',
    name: 'informeGeneralDimensiones',
    component: informeGeneralDimensiones
  },
  {
    path: '/comparacion-dimensiones/:id',
    name: 'comparacionDImensiones',
    component: comparacionDImensiones
  },
  {
    path: '/fortalezas-debilidades-fortalecer/:id',
    name: 'fortalezasDebilidadesFortalecer',
    component: fortalezasDebilidadesFortalecer
  },
  {
    path: '/paquetes',
    name: 'paquetes',
    component: Paquetes
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
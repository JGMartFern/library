<script setup>
import PageTitle from '@/Components/PageTitle.vue';

setTimeout(function() {
  window.location.href = "/";
}, 4000);
</script>

<template>
    <Head title="Actualizando..." />
    <div class="main-container min-h-screen">
        <PageTitle />
        <div class="success-message">
            <p>¡El libro ha sido actualizado con éxito!</p>
        </div>
        <div class="secondary-message">
            <p>Espera unos segundos y volveremos a la página principal enseguida...</p>
        </div>
    </div>
</template>
<style>

.main-container {
    padding: 50px;
    background-color: pink;
}

.success-message, .secondary-message {
    text-align: center;
    font-family: 'Pacifico','Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

.success-message {
    letter-spacing: 6px;
    font-size: 30px;
    margin-bottom: 40px;
}

.secondary-message {
    font-size: 18px;
}
</style>
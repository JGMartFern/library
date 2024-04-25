<script setup>
import { ref, computed } from 'vue';
import { Head } from '@inertiajs/vue3';
import Book from '@/Components/Book.vue';
import PageTitle from '@/Components/PageTitle.vue';

const books = ref([]);
const searchQuery = ref('');
const available = ref(true);
const showButtons = true;

const availableBooks = computed(() => {
    return books.value.filter((book) => book.borrower == null);
});

const borrowedBooks = computed(() => {
    return books.value.filter((book) => book.borrower != null);
});

const filteredBooks = computed(() => {
    return availableBooks.value.filter((book) =>
        book.title.toLowerCase().indexOf(searchQuery.value.toLowerCase()) > -1 || 
        book.author.toLowerCase().indexOf(searchQuery.value.toLowerCase()) > -1
    )
})

fetchData();

async function fetchData() {

    const res = await fetch('/api/book/list');
    books.value = await res.json();
}

function showAvailableBooks() {
    available.value = true;
}

function showBorrowedBooks() {
    available.value = false;
}

</script>

<template>
    <Head title="Biblioteca" />
    <div class="main-container min-h-screen">
        <PageTitle/>
        <div class="info-box">
            <div v-if="available"><span class="description">Libros disponibles</span></div>
            <div v-else><span class="description">Libros prestados</span></div>
            <div>
                <span @click="showAvailableBooks" class="available">Biblioteca</span>
                <span class="middle-bar">|</span>
                <span @click="showBorrowedBooks" class="borrowed">Prestados</span>
            </div>
        </div>

        <div class="info-box search">
            <div v-if="available">{{ filteredBooks.length }} Libros disponibles</div>
            <div v-else>{{ borrowedBooks.length }} Libros prestados</div>
            <div v-if="available">
                <form id="search"><input name="query" v-model="searchQuery" placeholder="Búsqueda"></form>
            </div>
        </div>

        <div class="book-container">
            <template v-if="available">
                <Book v-for="book in filteredBooks" :key="book.id" :book="book" :available="available" :showButtons="showButtons" />
            </template>
            <template v-else>
                <Book v-for="book in borrowedBooks" :key="book.id" :book="book" :available="available" :showButtons="showButtons" />
            </template>
        </div>
    </div>

</template>
<style>
.main-container {
    padding: 50px;
    background-color: pink;
}

.info-box {
    margin-bottom: 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 18px;
    font-family: 'Pacifico','Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

.available:hover,
.borrowed:hover {
    color: blue;
    text-decoration: underline;
    cursor: pointer;
    transition: 0.3s;
}

.description {
    font-size: 24px;
}

.middle-bar {
    margin: 0px 20px;
}

</style>
<script setup>
import { ref, computed } from 'vue';
import axios from 'axios';

const props = defineProps({
    book: Object,
    available: Boolean,
    showButtons: Boolean
});

function borrowBook(bookId) {
    localStorage.setItem('id', bookId);
    window.location.href = '/api/loan';
}

async function returnBook(bookId) {
    const url = '/api/book/update/' + bookId;
    const res = await fetch(url, {method: "PUT"});
    console.log(res.json());
}
</script>

<template>
    <div class="book">
        <div class="book-details">
            <div class="book-title">{{ book.title }}</div>
            <div class="cursive author">por {{ book.author }}</div>
            <div>Formato: <span class="cursive">{{ book.format }}</span></div>
            <div v-if="book.borrower">Prestado a: <span class="cursive">{{ book.borrower }}</span></div>
            <div v-if="book.borrower">Prestado el: <span class="cursive">{{ book.start_date }}</span></div>
            <div v-if="book.borrower">Prestado hasta el: <span class="cursive">{{ book.limit_date }}</span></div>
        </div>
        <div v-if="showButtons" class="button-option">
            <button class="button" v-if="available" @click="borrowBook(book.id)">Préstamo</button>
            <button class="button" v-else @click="returnBook(book.id)">Devolver</button>
        </div>
    </div>
</template>

<style>
.book {
    display: flex;
    justify-content: space-between;
    margin: 10px 0px;
    padding: 10px;
    border: 1px solid;
    border-color: black;
    background-color: lightcyan;
}

.description {
    font-size: 24px;
}

.middle-bar {
    margin: 0px 20px;
}

.button-option {
    margin-right: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.button {
    font-family: 'Pacifico','Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    background-color: blue;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    letter-spacing: 2px;
    border-radius: 12px;
    transition: 0.3s;
}

.button:hover {
    background-color: green;
    color: white;
    box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
}

.book-title {
    font-weight: bold;
}

.cursive {
    font-style: italic;
}

.author {
    font-size: 14px;
    padding-bottom: 20px;
}
</style>
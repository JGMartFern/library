<script setup>
import { ref, computed } from 'vue';

const props = defineProps({
    book: Object,
    available: Boolean,
    showButtons: Boolean
});

function borrowBook(bookId) {
    localStorage.setItem('id', bookId);
    window.location.href = '/loan';
}

async function returnBook(bookId) {
    const url = '/api/book/update/' + bookId;
    const res = await fetch(url, { method: 'PUT' });
    window.location.href = '/success';
}

function isTimedOut(bookLimitDate) {
    let now = new Date();
    return bookLimitDate != null && new Date(bookLimitDate) < now;
}

function formatDate(date) {
    return date.split('-').reverse().join('/');
}
</script>

<template>
    <div class="book">
        <div class="book-details">
            <div class="book-title">{{ book.title }}</div>
            <div class="cursive author">por {{ book.author }}</div>
            <div>Formato: <span class="cursive">{{ book.format }}</span></div>
            <div v-if="!available">Prestado a: <span class="cursive">{{ book.borrower }}</span></div>
            <div v-if="!available">Prestado el: <span class="cursive">{{ formatDate(book.start_date) }}</span></div>
            <div v-if="!available">Prestado hasta el: <span class="cursive">{{ formatDate(book.limit_date) }}</span></div>
            <div v-if="showButtons" class="button-option">
                <button class="button" v-if="available" @click="borrowBook(book.id)">Préstamo</button>
                <button class="button" v-else @click="returnBook(book.id)">Devolver</button>
            </div>
        </div>
        <div class="book-image">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1665px-No-Image-Placeholder.svg.png">
        </div>
        <div class="timeout" v-if="isTimedOut(book.limit_date)">Caducado</div>

    </div>
</template>

<style>

.book {
    display: flex;
    justify-content: space-between;
    margin: 10px 0px;
    padding: 20px;
    border: 1px solid;
    border-color: black;
    background-color: lightcyan;
}

.book-details, .book-image {
    max-width: 45%;
}

.book-image {
    align-content: center;
}

.book-image img {
    max-width: 100%;
    max-height: 250px;
}

.description {
    font-size: 24px;
}

.middle-bar {
    margin: 0px 20px;
}

.button-option {
    display: flex;
    align-items: center;
    margin: 20px 0px 10px 0px;
}

.button {
    font-family: 'Pacifico', 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
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

.timeout {
    width: 100px;
    height: 50px;
    line-height: 50px;
    border-radius: 20px;
    font-size: 16px;
    color: #fff;
    text-align: center;
    background: #f08080;
    rotate: 30deg;
    position: absolute;
    margin-top: 1%;
    margin-left: 30%;
}
</style>
<script setup>
import { ref, computed } from 'vue';
import { Head } from '@inertiajs/vue3';
import Book from '@/Components/Book.vue';
import PageTitle from '@/Components/PageTitle.vue';

const book = ref({});
const startDate = ref(new Date());
const limitDate = computed(() => {
    var result = new Date(startDate.value);
    result.setDate(result.getDate() + 30);
    return result;
})
const borrower = ref('');

const minDate = computed(() => {
    const today = new Date();
    return formatDate(today);
})

fetchBook();

function onInputBorrower(name) {
    borrower.value = name.target.value;
    console.log(borrower.value);
}

function onInputStartDate(date) {
    startDate.value = date.target.value;
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [year, month, day].join('-');
}

function formatLimitDate(date) {
    let limitDate = formatDate(date);
    return limitDate.split('-').reverse().join('/');
}

function returnToHome() {
    window.location.href = '/';
}

async function fetchBook() {
    const res = await fetch('/book/' + localStorage.id);
    book.value = await res.json();
}

async function submitLoan() {
    const requestOptions = {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            borrower: borrower.value,
            start_date: formatDate(startDate.value),
            limit_date: formatDate(limitDate.value)
        })
    };
    const res = await fetch('/api/book/takeLoan/' + book.value.id, requestOptions);
    const data = await res.json();
    window.location.href = '/success'
}

</script>
<template>

    <Head title="Préstamo" />
    <div class="main-container min-h-screen">
        <PageTitle />
        <div class="info-box">
            <div><span class="description">Prestar libro</span></div>
            <div><span class="return" @click="returnToHome">Volver</span></div>
        </div>
        <div class="book-container">
            <Book :book="book" :available=true />
        </div>
        <form @submit.prevent="submitLoan">
            <div class="form-group">
                <p><label for="borrower">Nombre del prestatario</label></p>
                <p><input :value="borrower" type="text" id="borrower" placeholder="Introduce tu nombre"
                        @input="onInputBorrower" required></p>
            </div>
            <div class="form-group">
                <p><label for="start_date">Fecha de inicio del préstamo</label></p>
                <p><input type="date" id="start_date" v-model="startDate" :min="minDate" @input="onInputStartDate"
                        required>
                </p>
            </div>
            <div class="alert alert-info">
                <p>Tienes 30 días para devolver el préstamo. Fecha límite: <span class="date-warning">{{
                        formatLimitDate(limitDate) }}</span></p>
            </div>
            <div class="info-box warning">
                <p>Si los datos son correctos, pulsa en el botón <span class="cursive">Realizar préstamo</span>.</p>
            </div>
            <div class="button-option">
                <button type="submit" class="button">Realizar préstamo</button>
            </div>
        </form>
    </div>
</template>
<style>

.book-container {
    width: 70%;
    margin: auto;
}

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
    font-family: 'Pacifico', 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

.form-group,
.alert-info,
.warning {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

.warning {
    font-size: 16px;
    margin-top: 20px;
}

.alert-info {
    font-size: 12px;
}

.date-warning {
    color: red
}

.description {
    font-size: 24px;
}

.return {
    font-size: 16px;
}

.return:hover {
    color: blue;
    text-decoration: underline;
    cursor: pointer;
    transition: 0.3s;
}

.form-group {
    margin: 20px 0px;
}

.button-option {
    display: flex;
    justify-content: center;
    align-items: center;
}

.button {
    background-color: teal;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 12px;
    transition: 0.3s;
}

.button:hover {
    background-color: green;
    box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
}

.cursive {
    font-style: italic;
}
</style>